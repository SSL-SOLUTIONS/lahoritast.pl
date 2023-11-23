<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebsiteController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Annotation\Route as AnnotationRoute;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [WebsiteController::class, 'website'])->name('website');
Route::get('/main', [WebsiteController::class, 'main'])->name('main');
Route::get('/menus/{category?}', [WebsiteController::class, 'menus'])->name('menus');
Route::get('/services', [WebsiteController::class, 'services'])->name('services');
Route::get('/about', [WebsiteController::class, 'about'])->name('about');
Route::get('/contact', [WebsiteController::class, 'contact'])->name('contact');

//  Admin Panel Routes
Route::middleware(["auth", "isAdmin" ,"verified"])->group(function () {
    Route::get('/panel', [AdminController::class, 'panel'])->name('panel');
    Route::resource('/users', UserController::class);
    Route::get('/order', [OrderController::class, 'order'])->name('order');
    Route::get('/orderdetails/{id}', [OrderController::class, 'orderdetails'])->name('orderdetails');
    Route::get('/delivered/{id}', [OrderController::class, 'delivered']);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
// Cart related routes
Route::middleware(['auth','verified'])->group(function () {
    Route::get('/cart', [WebsiteController::class, 'cart'])->name('cart');
    Route::get('cart/add/{product}', [CartController::class, 'addtocart'])->name('cart.add');
    Route::get('/remove_cart/{id}', [CartController::class, 'remove_cart'])->name('remove_cart');
    Route::get('/cart-update-qty/{id?}/{type?}', [CartController::class, 'cart_update_qty'])->name('cart_update_qty');
    Route::resource('profile', ProfileController::class);
    // Route for viewing order history on web page ans stripe system
          Route::get('/process-to-checkout', [OrderController::class, 'processToCheckout'])->name('processToCheckout');
        Route::controller(StripePaymentController::class)->group(function () {
        Route::post('stripe-view', 'stripe')->name('stripe.view');
        Route::post('stripe-store', 'stripePost')->name('stripe.post');
        Route::get('/thankyou','thankyou')->name('thankyou');
    });
    // user routes 
    Route::get('/orders', [WebsiteController::class, 'orders'])->name('orders');
    Route::get('/order-details/{id?}', [WebsiteController::class, 'orderDetails'])->name('orders.details');
});
Auth::routes(['verify' => true]);;
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
