<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function (){
    return "HELLO WORLD";
});
Route::get('/addItem', function (){
    return view('pages.addItem');
});
Route::post('/addItem', function (\Illuminate\Http\Request $request){
    $product = new Product();
    $product->name = $request->name;
    $product->description = $request->description;
    $product->cost = $request->cost;
    $product->save();
    return "Товар успешно добавлен!";
});
Route::get('/shop', function (){
    $products = Product::all(); // SELECT * FROM products
    return view('pages.shop', ['products'=>$products]);
});
Route::get('/shop/{id}', function (\Illuminate\Http\Request $request){
   $product = Product::where('id', $request->id)->first();
   return view('pages.singleProduct', ['product'=>$product]);
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
