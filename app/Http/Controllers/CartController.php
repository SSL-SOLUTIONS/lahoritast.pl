<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addtocart(Request $request, $product)
    {
        $product = Product::find($product);
        if (!$product) {
            return redirect()->route('menus')->with('error', 'Item not found.');
        }
        $cart = $request->session()->get('cart', []);
        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
            $cart[$product->id]['price'] = $product->price * $cart[$product->id]['quantity'];
        } else {
            $cartItemData = [
                'id' => $product->id,
                'name' => $product->name,
                'image' => $product->image,
                'quantity' => 1,
                'price' => $product->price,
            ];
            $cart[$product->id] = $cartItemData;
        }
        $request->session()->put('cart', $cart);
        return redirect()->back()->with('message', 'Item added to cart Successfully.');
    }
    public function viewCart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        return view('website.cart', compact('cart',));
    }
    public function remove_cart(Request $request, $id)
    {
        $cart = $request->session()->get('cart', []);
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]);
            $request->session()->put('cart', $cart);
            return redirect()->route('cart')->with('success', 'Item removed from cart.');
        }
        return redirect()->route('cart')->with('error', 'Item not found in cart.');
    }

    public function cart_update_qty($productId = '', $type = '')
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            if ($type == 'plus') {
                $cart[$productId]['quantity'] += 1;
            } else if ($type == 'minus') {
                if ($cart[$productId]['quantity'] <= 1) {
                    unset($cart[$productId]);
                } else {
                    $cart[$productId]['quantity'] -= 1;
                }
            }
            $product = Product::find($productId);
            if (isset($cart[$productId])) {
                $cart[$productId]['price'] = $product->price * $cart[$productId]['quantity'];
            } else {
            }

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Cart updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Item not found.');
        }
    }
}
