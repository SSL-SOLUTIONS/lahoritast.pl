<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Prompts\Prompt;

class WebsiteController extends Controller

{
    public function website(Request $request)

    {
        $categoryId = $request->input('category');
        $categories = Category::paginate(4);
        if ($categoryId) {
            $products = Product::where('category_id', $categoryId)->get();
        } else {
            $products = Product::all();
        }
        $cart = (array)$request->session()->get('cart', []);
        return view('website', compact('products', 'categories','cart'));
    }

    public function main(Request $request)
    {

        $categoryId = $request->input('category');
        $categories = Category::paginate(4);
        if ($categoryId) {
            $products = Product::where('category_id', $categoryId)->get();
        } else {
            $products = Product::all();
        }
        $cart = (array)$request->session()->get('cart', []);
        return view('website', compact('products', 'categories','cart'));
    }

    public function menus(Request $request)
{
    {

        $categoryId = $request->input('category');
        $categories = Category::all();
        if ($categoryId) {
            $products = Product::where('category_id', $categoryId)->get();
        } else {
            $products = Product::all();
        }
        $cart = (array)$request->session()->get('cart', []);
        return view('website.menu', compact('products', 'categories','cart'));
    }
}

    

    public function services()
    {
        return view('website.services');
    }
    public function about(Request $request)
    {
        $cart = (array)$request->session()->get('cart', []);
        return view('website.about', compact('cart'));
    }
    public function contact()
    {
        return view('website.contact');
    }
    public function cart(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $orders = session()->get('orders', []);
        $products = Product::all();
        return view('website.cart', compact('cart', 'products', 'orders'));
    }

    public function orders(Request $request)
    {
        
        $orders = Order::whereUserId(auth()->id())->get();
        $cart = (array)$request->session()->get('cart', []);
        return view('website.orders.index', get_defined_vars());
        
    }
    public function orderDetails( Request $request,$id){
        $order = Order::whereUserId(auth()->id())->findorfail($id);
        $cart = (array)$request->session()->get('cart', []);
        return view('website.orders.show', compact('order','cart'));
    }

}
