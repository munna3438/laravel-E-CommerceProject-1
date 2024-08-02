<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\catagoryController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/about', [homeController::class, 'about'])->name('about');
Route::get('/testimonial', [homeController::class, 'testimonial'])->name('testimonial');
Route::get('/products', [homeController::class, 'products'])->name('products');
Route::get('/blog', [homeController::class, 'blog'])->name('blog');
Route::get('/contact', [homeController::class, 'contact'])->name('contact');
Route::get('/product/details/{id}', [homeController::class, 'product_details'])->name('product.details');
Route::get('/checkout', [homeController::class, 'checkout'])->name('checkout');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [authController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/dashboard', [authController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/user/dashboard', [authController::class, 'userDashboard'])->name('user.dashboard');
});

Route::prefix('catagory')->group(function () {
    Route::get('/add', [catagoryController::class, 'add_catagory'])->middleware(['auth', 'admin'])->name('add.catagory');
    Route::post('/store', [catagoryController::class, 'store_catagory'])->middleware(['auth', 'admin'])->name('store.catagory');
    Route::get('/list', [catagoryController::class, 'list_catagory'])->middleware(['auth', 'admin'])->name('list.catagory');
    Route::get('/edit/{id}', [catagoryController::class, 'edit_catagory'])->middleware(['auth', 'admin'])->name('edit.catagory');
    Route::post('/update/{id}', [catagoryController::class, 'update_catagory'])->middleware(['auth', 'admin'])->name('update.catagory');
    Route::get('/delete/{id}', [catagoryController::class, 'delete_catagory'])->middleware(['auth', 'admin'])->name('delete.catagory');
});
Route::prefix('product')->group(function () {
    Route::get('/add', [productController::class, 'add_product'])->middleware(['auth', 'admin'])->name('add.product');
    Route::post('/store', [productController::class, 'store_product'])->middleware(['auth', 'admin'])->name('store.product');
    Route::get('/list', [productController::class, 'list_product'])->middleware(['auth', 'admin'])->name('list.product');
    Route::get('/edit/{id}', [productController::class, 'edit_product'])->middleware(['auth', 'admin'])->name('edit.product');
    Route::post('/update/{id}', [productController::class, 'update_product'])->middleware(['auth', 'admin'])->name('update.product');
    Route::get('/delete/{id}', [productController::class, 'delete_product'])->middleware(['auth', 'admin'])->name('delete.product');
});

Route::prefix('cart')->group(function () {
    Route::get('/', [homeController::class, 'cart'])->name('cart');
    Route::get('store/{id}', [homeController::class, 'cart_store'])->name('cart.store');
    Route::get('update/{pId}/{uId}', [homeController::class, 'cart_update'])->name('cart.update');
    Route::get('delete/{uId}/{pId}',[homeController::class,'delete_cart'])->name('delete.cart');
});