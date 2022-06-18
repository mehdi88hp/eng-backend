<?php

use App\Components\Admin\Books\Controllers\BooksController;
use Inertia\Inertia;

Route::resource('books',BooksController::class);
Route::get('books2',[BooksController::class,'store']);

//dd(66);
