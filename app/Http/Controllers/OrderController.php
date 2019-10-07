<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function view()
    {
        $orders = Order::all()->toArray();

        return view('admin.pages.orders.view', compact('orders'));
    }

    public function viewDetails($id)
    {
        $details = DB::table('order_details')
            ->join('products', 'order_details.product_id', '=', 'products.id')
            ->select('order_details.id', 'order_details.price', 'order_details.quantity', 'products.name')
            ->where('order_details.order_id', '=', $id)
            ->get();

        return view('admin.pages.orders.details', compact('details'));
    }

    public function deleteDetail($id)
    {
        $order_detail = OrderDetail::find($id);
        $order_detail->delete();

        return redirect()->back();
    }

    public function getDelete($id)
    {
        $order = Order::find($id);

        $order->delete();

        return redirect()->back();
    }

    public function editOrder(Request $request,$id)
    {
        $order = Order::find($id);
        $order_details = OrderDetail::where('order_id', '=', $order['id'])->get()->toArray();
        foreach ($order_details as $value){
            $product = Product::find($value['product_id']);
            $product->quantity = $product['quantity'] - $value['quantity'];
            $product->save();
        }

        $order->status = 1;
        $order->save();
        return redirect()->back();

    }
}
