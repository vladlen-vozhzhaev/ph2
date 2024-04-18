<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addItem(Request $request){
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
    }
    public function showShop(){
        $products = Product::all(); // SELECT * FROM products
        foreach ($products as $product){
            $productImages = \App\Models\ProductImage::where('product_id', $product->id)->get();
            $product->images = $productImages;
        }
        return view('pages.shop', ['products'=>$products]);
    }
    public function showSingleProduct(Request $request){
        $product = Product::where('id', $request->id)->first();
        $productImages = \App\Models\ProductImage::where('product_id', $request->id)->get();
        return view('pages.singleProduct', ['product'=>$product, 'productImages'=>$productImages]);
    }
}
