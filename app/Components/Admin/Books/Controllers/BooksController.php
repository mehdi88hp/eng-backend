<?php

namespace App\Components\Admin\Books\Controllers;

use App\Components\Admin\Books\Requests\StoreRequests;
use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        dd(123123);
    }

    public function test(Request $request)
    {
        dd($request->all());
    }

    public function store(StoreRequests $request)
    {
        //first needs to store cefr and other models
        Book::create($request->all());
        return 84848484;
        return ($requests->all());
    }

    public function show()
    {

}
}
