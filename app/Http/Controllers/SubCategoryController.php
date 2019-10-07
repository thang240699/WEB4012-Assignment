<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\SubCategoryRequest;
use App\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function view()
    {
        $sub_categories = SubCategory::all()->toArray();

        return view('admin.pages.subcategories.view', compact('sub_categories'));
    }

    public function getAdd()
    {
        $categories = Category::all()->toArray();

        return view('admin.pages.subcategories.insert', compact('categories'));
    }

    public function postAdd(SubCategoryRequest $request)
    {
        $sub_categories = new SubCategory();
        $sub_categories->category_id = $request->category_id;
        $sub_categories->sub_name = $request->sub_name;
        $sub_categories->slug = str_slug($request->sub_name);
        $sub_categories->save();

        return redirect()->route('sub-categories.view');
    }

    public function getEdit($id)
    {
        $sub_category = SubCategory::find($id);
        $categories = Category::all()->toArray();
        $category_id = $sub_category['category_id'];
        $name_cate = Category::find($category_id);

        return view('admin.pages.subcategories.update', compact('sub_category', 'categories', 'name_cate'));
    }
    public function postEdit(SubCategoryRequest $request, $id)
    {
        $sub_categories = SubCategory::find($id);
        $sub_categories->category_id = $request->category_id;
        $sub_categories->sub_name = $request->sub_name;
        $sub_categories->slug = str_slug($request->sub_name);
        $sub_categories->save();

        return redirect()->route('sub-categories.view');
    }

    public function getDelete($id)
    {
        $categories = SubCategory::find($id);
        if ($categories == null) {
            die(view('errors.404'));
        }
        $categories->delete($id);
        return redirect()->route('sub-categories.view');
    }
}
