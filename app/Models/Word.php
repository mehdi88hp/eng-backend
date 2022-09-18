<?php

namespace App\Models;


class Word extends BaseModel
{
    protected $fillable = [
        'title',
        'eng_meaning',
        'fa_meaning',
        'examples',
    ];
}
