<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Contracts\Session\Session as SessionSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Stripe;

class StripePaymentController extends Controller
{
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripe(Request $request)
    {
        // dd($request->all());
        session(['name' => $request->name]);
        session(['email' => $request->email]);
        session(['phone' => $request->phone]);
        session(['address' => $request->address]);
        $totalPrice = $this->total();
        return view('stripe', get_defined_vars());
    }
 /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {

        $order = Order::create([
            'user_id' => auth()->id(),
            'phone' => session('phone') ?? '',
            'email' => session('email') ?? '',
            'address' => session('address') ?? '',
            'order_status' => 'pending',
            'total' => $this->total(),
            'discount' => session('discount') ?? '',
            'delivery_charges' => session('delivery_charges') ?? '',
        ]);
        $cart = session()->get('cart', []);
        foreach ($cart as $item) {
            // Calculate the subtotal for each item (quantity * price) and add it to the total
            $subtotal = $item['quantity'] * $item['price'];
            OrderDetail::create([
                'price' => $item['price'],
                'qty' => $item['quantity'],
                'subtotal' => $item['quantity'] * $item['price'],
                'product_id' => $item['id'],
                'order_id' => $order->id
            ]);
        }
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        Stripe\Charge::create ([
                "amount" => $this->total()*100,
                "currency" => "GBP",
                "source" => $request->stripeToken,
                "description" => "Thanks For Payment." 
        ]);

        Session::forget('cart');
        Session::flash('success', 'Payment successful!');
        return redirect()->route('thankyou');
    }
    private function total()
    {
        $cart = session()->get('cart',[]);
        $total = 0; 
        foreach ($cart as $item) {
            $subtotal = $item['quantity'] * $item['price'];
            $total += $subtotal;
        }
        return $total;
    }
    public function thankyou(){
        return view('thanks');
    }
}
