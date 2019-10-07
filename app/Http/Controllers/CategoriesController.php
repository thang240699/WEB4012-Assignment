<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoriesRequest;

class CategoriesController extends Controller
{
    public function view()
    {
        $categories = Category::all()->toArray();
        return view('admin.pages.categories.view', compact('categories'));
    }

    public function getAdd()
    {
        return view('admin.pages.categories.insert');
    }

    public function postAdd(CategoriesRequest $request)
    {
        $file = $request->image;
        $file->move('public\images\categories', $file->getClientOriginalName());
        $name_img = $file->getClientOriginalName();
        $category = new Category;
        $category->name = $request->name;
        $category->image = $name_img;
        $category->slug = str_slug($request->name);
        $category->save();

        return redirect()->route('categories.view');

    }

    public function getEdit($id)
    {
        $category = Category::find($id);

        return view('admin.pages.categories.update', compact('category'));
    }

    public function postEdit(CategoriesRequest $request, $id)
    {
        $file = $request->image;
        if($file != null){
            $file->move('public\images\categories', $file->getClientOriginalName());
        }
        $name_img = strlen($file)>0 ? $file->getClientOriginalName() : $request->images;
        $category =  Category::find($id);
        $category->name = $request->name;
        $category->image = $name_img;
        $category->slug = str_slug($request->name);
        $category->save();

        return redirect()->route('categories.view');

    }

    public function getDelete($id)
    {
        $categories = Category::find($id);
        if ($categories == null) {
            die(view('errors.404'));
        }
        $categories->delete($id);
        return redirect()->route('categories.view');
    }
}
