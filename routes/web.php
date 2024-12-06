<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/redirect', [HomeController::Class, 'redirect']);


//admin routes
Route::get('/view_product', [AdminController::class, 'view_product']);
//add product in admin
Route::post('/add_product', [AdminController::class, 'add_product'])->name('add_product');

//show product in admin
Route::get('/show_product', [AdminController::class, 'show_product'])->name('show_product');



///Userpage
// Route to show all products

Route::get('/userpage', [HomeController::class, 'viewshoes']);

Route::get('/product_details/{id}', [HomeController::class, 'showProductDetails']);


//add to cart

Route::post('/add_cart/{id}', [HomeController::class, 'add_cart']);

//showcart
Route::get('/show_cart', [HomeController::class, 'show_cart']);

//remove cart

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove_cart');

//add checkout

Route::post('/checkout', [HomeController::class, 'add_checkout']);

//view checkout

Route::get('/checkout', [HomeController::class, 'viewcheckout'])->name('checkout.view');

// Change GET to DELETE or POST for removing orders
Route::get('/remove_checkout/{id}', [HomeController::class, 'remove_checkout'])->name('remove_checkout');

