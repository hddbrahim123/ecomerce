<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
    

//Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {

    Route::get('dashboard',[DashboardController::class , 'index'])->name('dashboard');

    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'banners' => BannerController::class,
        'reviews' => ReviewController::class,
        'users' => UserController::class,
    ]);
});



//Route home
Route::get('/',[HomeController::class , 'index'] )->name('home');

//Add To Cart
Route::get('/addToCart/{product}',[CartController::class , 'addToCart'] )->name('cart.add');
Route::get('/showCart' , [CartController::class , 'show'] )->name('cart.show');
Route::delete('/products/{product}' , [CartController::class , 'remove'] )->name('cart.remove');
Route::put('/products/{product}' , [CartController::class , 'update'] )->name('cart.update');
//checkout
Route::get('/cart/checkout' , [CartController::class , 'checkout'] )->name('checkout');

//Order Route
Route::resource('orders' , OrderController::class )->only('store');

