<?php

namespace App\Components\Admin\Authors\Controllers;

use App\Components\Admin\Authors\Requests\StoreRequests;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorsController extends Controller
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
        Author::create($request->all());
        return 84848484;
        return ($requests->all());
    }

    public function show()
    {

}
}
