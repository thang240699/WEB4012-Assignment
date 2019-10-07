<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $top_products = Product::orderBy('id', 'desc')->take(8)->get();
        $categories = Category::all()->toArray();
        return view('pages.home', compact('categories','top_products'));
    }

    public function shop()
    {
        $sub_categories = SubCategory::all()->toArray();
        $products = Product::paginate(8);

        return view('pages.shop', compact('sub_categories','products'));
    }
    public function admin(){
        if(Auth::user() == null){
            die(view('errors.403'));
        }elseif(Auth::user()->role == null){
            die(view('errors.403'));
        }
        else{
            return view('admin.index');
        }
    }
}
