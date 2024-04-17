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
Route::middleware('admin')->group(function (){
    Route::get('/secret', function (){
        return "Hello secret!";
    });
    Route::get('/addItem', function (){
        return view('pages.addItem');
    });
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

Route::get('/cart', function (){
    $carts = \App\Models\Cart::where('user_id', auth()->user()->getAuthIdentifier())->get();
    $products = [];
    foreach ($carts as $cart){
        $product = Product::where('id', $cart->product_id)->first();
        $products[] = $product;
    }
    return view('pages.cart', ['products'=>$products]);
})->middleware('auth');



Route::post('/addCart', function (\Illuminate\Http\Request $request){
   $productId = $request->product_id;
   $userId = auth()->user()->getAuthIdentifier();
   $cart = new \App\Models\Cart();
   $cart->product_id = $productId;
   $cart->user_id = $userId;
   $cart->save();
   return json_encode(['result'=>'success']);
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
