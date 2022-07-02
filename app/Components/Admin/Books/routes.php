<?php

use App\Components\Admin\Books\Controllers\CefrController;
use Inertia\Inertia;

Route::resource('books',CefrController::class);
Route::post('books2',[CefrController::class,'store']);

//dd(66);
