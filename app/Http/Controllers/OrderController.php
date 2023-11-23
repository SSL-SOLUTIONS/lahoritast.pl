<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Illuminate\Http\Request;



class OrderController extends Controller
{

    public function processToCheckout()
    {
        return view('orders.checkout');
    }

    public function order()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('orders.index', compact('orders'));
    }

    public function orderdetails($id)
    {
        $orderdetails = OrderDetail::where('order_id', $id)->get();
        if (!$orderdetails) {
            return abort(404);
        }
        return view('orders.show', compact('orderdetails'));
    }

    public function delivered($id)
    {
        $order = Order::find($id);
        $order->order_status= "delivered";
        $order->save();
        return redirect()->back();
    }
}
