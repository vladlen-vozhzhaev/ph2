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
    return view('pages.mainPage');
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
    $files = $request->file('images');
    foreach ($files as $file){
        $path = $file->store('public/product_image');
        $path = str_replace('public', '/storage', $path);
        $productImage = new \App\Models\ProductImage();
        $productImage->product_id = $product->id;
        $productImage->img = $path;
        $productImage->save();
    }
    return redirect()->intended('/shop/'.$product->id);
});
Route::get('/shop', function (){
    $products = Product::all(); // SELECT * FROM products
    foreach ($products as $product){
        $productImages = \App\Models\ProductImage::where('product_id', $product->id)->get();
        $product->images = $productImages;
    }
    return view('pages.shop', ['products'=>$products]);
});
Route::get('/shop/{id}', function (\Illuminate\Http\Request $request){
   $product = Product::where('id', $request->id)->first();
   $productImages = \App\Models\ProductImage::where('product_id', $request->id)->get();
   return view('pages.singleProduct', ['product'=>$product, 'productImages'=>$productImages]);
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
