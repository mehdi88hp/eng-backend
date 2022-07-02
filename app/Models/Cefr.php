<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Cefr extends BaseModel
{
    protected $table = 'cefr';

    protected $fillable=[
        'title_fa',
        'title_en',
        'description_fa',
        'description_en',
        'level',
    ];
}
