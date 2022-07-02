<?php

namespace App\Components\Admin\Cefr\Controllers;

use App\Components\Admin\Cefr\Requests\StoreRequests;
use App\Http\Controllers\Controller;
use App\Models\Cefr;
use Illuminate\Http\Request;

class CefrController extends Controller
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
        Cefr::create($request->all());
        return 84848484;
        return ($requests->all());
    }

    public function show()
    {

}
}
