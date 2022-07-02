<?php

namespace App\Components\Admin\Categories\Controllers;

use App\Components\Admin\Categories\Requests\StoreAsRootRequest;
use App\Components\Admin\Categories\Requests\StoreRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoriesController extends Controller
{
    public function storeAsRoot(StoreAsRootRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $request->slug ? $data['slug'] = $request->slug : null;

        $category = (new Category)->fill($data);

        $category->makeRoot()->save();

        return response('done');
    }

    public function store(StoreRequest $request)
    {
        $data = [
            'name' => $request->name,
            'description' => $request->description,
        ];

        $request->slug ? $data['slug'] = $request->slug : null;

        $category = (new Category)->fill($data);

        if($request->parent_id){
            $parent = Category::findOrFail($request->parent_id);

            $parent->appendNode($category);
        }else{
            $category->makeRoot()->save();
        }

        return response('done');
    }
}
