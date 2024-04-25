<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Models\Product;
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

Route::get('/', [ProductController::class, 'showShop']);
Route::post('/addItem', [ProductController::class, 'addItem']);
Route::get('/shop', [ProductController::class, 'showShop']);
Route::get('/shop/{id}', [ProductController::class, 'showSingleProduct']);
Route::get('/cart', [CartController::class, 'showCart'])->middleware('auth');
Route::post('/changeQuantity', [CartController::class, 'changeQuantity']);
Route::post('/deleteCart', [CartController::class, 'deleteCart']);
Route::post('/addCart', [CartController::class, 'addCart'])->middleware('auth');
Route::view('/addItem', 'pages.addItem')->middleware('admin');
Route::get('/getCart', [CartController::class, 'getCart'])->middleware('auth');
Route::get('/admin', [AdminController::class, 'showAdmin'])->middleware('admin');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
