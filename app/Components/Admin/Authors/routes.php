<?php

use App\Components\Admin\Authors\Controllers\AuthorsController;
use Inertia\Inertia;

Route::resource('authors',AuthorsController::class);
