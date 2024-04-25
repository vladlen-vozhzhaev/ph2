<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showAdmin(Request $request){
        $carts = Cart::all();
        $products = [];
        foreach ($carts as $cart){
            $user = User::where('id', $cart->user_id)->first();
            $product = Product::where('id', $cart->product_id)->first();
            $productImage = \App\Models\ProductImage::where('product_id', $cart->product_id)->first(); // Получаем картинку товара
            $product->image = $productImage->img; // Сохраняем картинку товара в свойство image
            $product->cartId = $cart->id;
            $product->user = $user;
            $products[] = $product;
        }
        return view('pages.adminProfile', [
            'user' => $request->user(),
            'products'=>$products
        ]);
    }
}
