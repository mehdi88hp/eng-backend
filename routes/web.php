<?php

use App\Models\Author;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    // Get instance of your model

    $category = (new \App\Models\Category)->fill([
        'name'=>'test3',
        'description'=>'test3desc',
        'slug'=>'CCC'
    ]);
    $parent =\App\Models\Category::find(2);

    $parent->appendNode($category);
//    $parent->children()->create($category);
//    $category->makeRoot()->save();
    $category = \App\Models\Category::find(2);

    $author = Author::find(1);

    $author->attachCategories($category);

    dd($author->hasCategories(1));

//    $author->
    dd($author);
    return 435;
    dd(234);

    $author = Author::find(1);
// Get attached categories collection
    $author->categories;

// Get attached categories query builder
    dd($author->categories());

    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    require base_path('app/Components/Admin/Books/routes.php');

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
});
