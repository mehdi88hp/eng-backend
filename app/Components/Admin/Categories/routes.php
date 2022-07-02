<?php

use App\Components\Admin\Books\Controllers\CefrController;
use App\Components\Admin\Categories\Controllers\CategoriesController;
use Inertia\Inertia;

Route::post('root-category',[CategoriesController::class,'storeAsRoot']);
Route::post('category',[CategoriesController::class,'store']);

//dd(66);
