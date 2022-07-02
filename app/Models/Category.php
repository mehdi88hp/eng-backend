<?php

namespace App\Models;

//class Category
//{
//
//}

use App\Models\Traits\ValidatingTrait;
use Kalnoy\Nestedset\NestedSet;
use Kalnoy\Nestedset\NodeTrait;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
//use Rinvex\Support\Traits\HasSlug;
use Illuminate\Database\Eloquent\Model;
//use Rinvex\Support\Traits\ValidatingTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Spatie\Translatable\HasTranslations;

/**
 * Rinvex\Categories\Models\Category.
 *
 * @property int $id
 * @property string $slug
 * @property array $name
 * @property array $description
 * @property int $_lft
 * @property int $_rgt
 * @property int $parent_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property \Carbon\Carbon|null $deleted_at
 * @property-read \Kalnoy\Nestedset\Collection|\Rinvex\Categories\Models\Category[] $children
 * @property-read \Rinvex\Categories\Models\Category|null $parent
 *
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereLft($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereRgt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\Rinvex\Categories\Models\Category whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Category extends Model
{
    use HasSlug;
    use NodeTrait;
    use HasFactory;
    use SoftDeletes;
    use HasTranslations;
    use ValidatingTrait;

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'slug',
        'name',
        'description',
        NestedSet::LFT,
        NestedSet::RGT,
        NestedSet::PARENT_ID,
    ];

    /**
     * {@inheritdoc}
     */
    protected $casts = [
        'slug' => 'string',
        NestedSet::LFT => 'integer',
        NestedSet::RGT => 'integer',
        NestedSet::PARENT_ID => 'integer',
        'deleted_at' => 'datetime',
    ];

    /**
     * {@inheritdoc}
     */
    protected $observables = [
        'validating',
        'validated',
    ];

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatable = [
        'name',
        'description',
    ];

    /**
     * The default rules that the model will validate against.
     *
     * @var array
     */
    protected ?array $rules = [];

    /**
     * Whether the model should throw a
     * ValidationException if it fails validation.
     *
     * @var bool
     */
    protected bool $throwValidationExceptions = true;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $this->setTable('categories');
        $this->mergeRules([
            'name' => 'required|string|max:150',
//            'name' => 'required|string|strip_tags|max:150',
            'description' => 'nullable|string|max:32768',
//            'slug' => 'required|alpha_dash|max:150|unique:categories,slug',
//            NestedSet::LFT => 'sometimes|required|integer',
//            NestedSet::RGT => 'sometimes|required|integer',
//            NestedSet::PARENT_ID => 'nullable|integer',
        ]);

        parent::__construct($attributes);
    }

    /**
     * Get all attached models of the given class to the category.
     *
     * @param string $class
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function entries(string $class): MorphToMany
    {
        return $this->morphedByMany($class, 'categorizable', 'categorizables', 'category_id', 'categorizable_id', 'id', 'id');
    }

    /**
     * Get the options for generating the slug.
     *
     * @return \Spatie\Sluggable\SlugOptions
     */
    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->doNotGenerateSlugsOnUpdate()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }
}
