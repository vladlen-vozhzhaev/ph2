<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function showCart(){
        $carts = \App\Models\Cart::where('user_id', auth()->user()->getAuthIdentifier())->get(); // Получаем список товаров в корзине
        $products = []; // Массив с товарами
        foreach ($carts as $cart){ // Перебираем элементы корзины
            $product = Product::where('id', $cart->product_id)->first(); // Получаем информацию о товаре находящемся в корзине
            $productImage = \App\Models\ProductImage::where('product_id', $cart->product_id)->first(); // Получаем картинку товара
            $product->image = $productImage->img; // Сохраняем картинку товара в свойство image
            $product->quantity = $cart->quantity;
            $product->cart_id = $cart->id;
            $products[] = $product; // Добавляем товар в массив
        }
        return view('pages.cart', ['products'=>$products]); // Передаём список товаров на View
    }
    public function changeQuantity(Request $request){
        $quantity = $request->quantity;
        $cartId = $request->cart_id;
        $cart = \App\Models\Cart::where('id', $cartId)->first();
        $cart->quantity = $quantity;
        $cart->save();
        return json_encode(['result'=>'success']);
    }
    public function deleteCart(Request $request){
        $cartId = $request->cart_id;
        \App\Models\Cart::where('id', $cartId)->delete();
        return json_encode(['result'=>'success']);
    }
    public function addCart(Request $request){
        $productId = $request->product_id;
        $userId = auth()->user()->getAuthIdentifier();
        $cart = Cart::where(['user_id'=>$userId, 'product_id'=>$productId])->first();
        if(empty($cart)){
            $cart = new \App\Models\Cart();
            $cart->product_id = $productId;
            $cart->user_id = $userId;
            $cart->save();
        }else{
            $cart->quantity = $cart->quantity + 1;
            $cart->save();
        }
        return json_encode(['result'=>'success']);
    }
    public function getCart(){
        $userId = auth()->user()->getAuthIdentifier();
        $carts = Cart::where('user_id', $userId)->get();
        $products = [];
        foreach ($carts as $cart){
            $product = Product::where('id', $cart->product_id)->first();
            $productImage = \App\Models\ProductImage::where('product_id', $cart->product_id)->first(); // Получаем картинку товара
            $product->image = $productImage->img; // Сохраняем картинку товара в свойство image
            $product->cartId = $cart->id;
            $products[] = $product;
        }
        return json_encode($products);
    }
}
