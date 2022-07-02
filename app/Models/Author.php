<?php

namespace App\Models;


use App\Models\Traits\Categorizable;
use Illuminate\Database\Eloquent\Model;

class Author extends BaseModel
{
    use Categorizable;

    protected $fillable=[
        'title_fa',
        'title_en',
        'description_fa',
        'description_en',
    ];
}
