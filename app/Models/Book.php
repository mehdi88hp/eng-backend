<?php

namespace App\Models;


use App\Models\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;

class Book extends BaseModel
{
    use Categorizable;

    protected $fillable=[
        'title_fa',
        'title_en',
        'description_fa',
        'description_en',
        'author',
        'categories',
        'publisher',
        'cefr_id',
        'pages',
        'duration',
        'release_date',
        'image_path',
        'image_name',
    ];
}
