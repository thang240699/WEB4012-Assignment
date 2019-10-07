<?php

namespace App\Http\Controllers;

use App\Http\Requests\RatingsRequest;
use App\Product;
use App\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RatingController extends Controller
{
    public function view()
    {
        $statistics = DB::table('ratings')
            ->join('products', 'ratings.product_id', '=', 'products.id')
            ->select('products.id', 'products.name', DB::raw('count(*) as mount'), DB::raw('min(ratings.created_at) as new'), DB::raw('max(ratings.created_at) as old'))
            ->groupBy('products.id', 'products.name')
            ->having('mount', '>', '0')
            ->get();
        $ratings = Rating::all()->toArray();
        return view('admin.pages.ratings.view', compact('statistics'));
    }

    public function postAdd(Request $request, $id)
    {
        $product_id = $id;
        $product = Product::find($id);
        $slug = $product['slug'];
        $ratings = new Rating;
        $ratings->product_id = $product_id;
        $ratings->user_id = Auth::user()->id;
        $ratings->status = $request->status;
        $ratings->save();

        return redirect("products/".$slug);

//        return redirect()->route('/');


    }

    public function viewDetails($id)
    {
        $product = Product::find($id);
        $details = DB::table('ratings')
            ->join('users', 'ratings.user_id', '=', 'users.id')
            ->select('ratings.id', 'ratings.status', 'ratings.created_at', 'users.name')
            ->where('ratings.product_id', '=', $id)
            ->get();

        return view('admin.pages.ratings.details', compact('details', 'product'));
    }

    public function getDelete($id)
    {
        $ratings = Rating::find($id);
        if ($ratings == null) {
            die(view('errors.404'));
        }
        $ratings->delete($id);
        return redirect()->route('ratings.view');
    }
}
