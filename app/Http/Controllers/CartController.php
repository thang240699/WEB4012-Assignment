<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addItem(Request $request)
    {
        $id = $request->id;
        $qty = $request->qty;
        $cart = session()->get('cart');
        $item = Product::findOrfail($id);
        if (!isset($cart)) {
            $cart = [
                $id => [
                    "id" => $item->id,
                    "name" => $item->name,
                    "qty" => $qty,
                    "price" => $item->price,
                    "sale" => $item->sale,
                    "image" => $item->image
                ]
            ];
            session()->put('cart', $cart);
            return json_encode($cart);
        } elseif (isset($cart[$id])) {
            $cart[$id]['qty'] += $qty;
            session()->put('cart', $cart);
            return response()->json($cart);
        } else {
            $cart[$id] = [
                "id" => $item->id,
                "name" => $item->name,
                "qty" => $qty,
                "price" => $item->price,
                "sale" => $item->sale,
                "image" => $item->image
            ];
            session()->put('cart', $cart);
            return response()->json($cart);
        }
    }

    public function viewCart()
    {
        $cart_list = session()->get('cart');
        $tongtien = $this->getTotal($cart_list);
        return view('pages.cart', compact('cart_list', 'tongtien'));
    }

    public function updateCart(Request $request)
    {
        $tongtien = 0;
        $id = $request->id;
        $qty = $request->qty;
        $cart = session()->get('cart');
        if ($cart != null) {
            if ($qty == 0) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            } else {
                $cart[$id]['qty'] = $qty;
                session()->put('cart', $cart);
            }
            foreach ($cart as $value) {
                $tongtien += ($value['price'] - $value['price'] * $value['sale'] % 100) * $value['qty'];
            }
            if ($tongtien == 0) {
                $html = '<p> Giỏ hàng trống </p>';
                return response()->json($html);
            } else {
                return response()->json($tongtien);
            }
        }
    }

    public function deleteItem($id)
    {
        if ($id) {
            $cart = session()->get('cart');
            if (isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
        }
        $cart = session()->get('cart');
        return redirect()->back();
    }

    public function clearCart()
    {
        if (session()->has('cart')) {
            session()->forget('cart');
        }
        return redirect()->back();
    }

    public function checkOut(Request $request)
    {
        $cart = session()->get('cart');
        $tongtien = $this->getTotal($cart);
        $order = new Order();
        $order->name = $request->name;
        $order->user_id = Auth::user()->id;
        $order->telephone = $request->telephone;
        $order->address = $request->address;
        $order->total = $tongtien;
        $order->status = 0;
        $order->save();
        $order_id = Order::all()->last()->pluck('id');
        foreach ($order_id as $val)
        foreach ($cart as $value) {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $val;
            $order_detail->product_id = $value['id'];
            $order_detail->price = ($value['price'] - $value['price'] * $value['sale'] % 100);
            $order_detail->quantity = $value['qty'];
            $order_detail->save();
        }
        session()->forget('cart');
        return redirect()->back()->with(['status'=>'success','message'=>'Tạo đơn hàng thành công']);
    }
}
