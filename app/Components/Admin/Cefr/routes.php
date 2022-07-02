<?php

use App\Components\Admin\Cefr\Controllers\CefrController;
use Inertia\Inertia;

Route::resource('cefr',CefrController::class);
//Route::post('cefr',[CefrController::class,'store']);

//dd(66);
