<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ProductsRequest;
use App\Product;
use App\Rating;
use App\SubCategory;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function view()
    {
        $products = Product::paginate(5);

        return view('admin.pages.products.view', compact('products'));
    }

    public function getAdd()
    {
        $categories = Category::all()->toArray();
        $sub_categories = SubCategory::all()->toArray();

        return view('admin.pages.products.insert', compact('categories', 'sub_categories'));
    }

    public function postAdd(ProductsRequest $request)
    {
        $file = $request->image;
        $file->move('public\images\products', $file->getClientOriginalName());
        $name_img = $file->getClientOriginalName();
        $products = new Product();
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->image = $name_img;
        $products->description = $request->description;
        $products->quantity = $request->quantity;
        $products->sale = $request->sale;
        $products->slug = str_slug($request->name);
        $products->save();

        return redirect()->route('products.insert');
    }

    public function getEdit($id)
    {
        $product = Product::find($id);
        $category_id = Category::find($product['category_id']);
        $sub_category_id = SubCategory::find($product['sub_category_id']);
        $categories = Category::all()->toArray();
        $sub_categories = SubCategory::all()->toArray();

        return view('admin.pages.products.update', compact('product', 'categories', 'sub_categories', 'category_id', 'sub_category_id'));
    }

    public function postEdit(ProductsRequest $request, $id)
    {
        $file = $request->image;
        if ($file != null) {
            $file->move('public\images\products', $file->getClientOriginalName());
        }
        $name_img = strlen($file) > 0 ? $file->getClientOriginalName() : $request->name_img;
        $products = Product::find($id);
        $products->category_id = $request->category_id;
        $products->sub_category_id = $request->sub_category_id;
        $products->name = $request->name;
        $products->price = $request->price;
        $products->image = $name_img;
        $products->description = $request->description;
        $products->quantity = $request->quantity;
        $products->sale = $request->sale;
        $products->slug = str_slug($request->name);
        $products->save();

        return redirect()->route('products.view');
    }

    public function getDelete($id)
    {
        $product = Product::find($id);
        if ($product == null) {
            die(view('errors.404'));
        }
        $product->delete($id);
        return redirect()->route('products.view');
    }

    //site
    public function viewBySlug($slug)
    {

        $products = Product::where('slug', '=', $slug)->get()->toArray();
//        $product = Product::find($id);
        foreach ($products as $product)
            $ratings = DB::table('ratings')
                ->join('users', 'ratings.user_id', '=', 'users.id')
                ->select('ratings.id', 'ratings.status', 'ratings.created_at', 'users.name', 'ratings.created_at')
                ->where('ratings.product_id', '=', $product['id'])
                ->get()->toArray();
        $id_cate = $product['category_id'];
        $categories = Category::where('id', '=', $id_cate)->get()->toArray();
        $sub_categories = SubCategory::where('id', '=', $product['sub_category_id'])->get()->toArray();
//        print_r($sub_categories);

        return view('pages.product', compact('products', 'categories', 'sub_categories', 'ratings'));
    }
}
