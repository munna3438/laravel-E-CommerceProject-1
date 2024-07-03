<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [authController::class, 'dashboard'])->name('dashboard');
    Route::get('/admin/dashboard', [authController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/user/dashboard', [authController::class, 'userDashboard'])->name('user.dashboard');
});
Route::get('/catagory', [authController::class, 'catagory'])->middleware(['auth', 'admin'])->name('dashboard');