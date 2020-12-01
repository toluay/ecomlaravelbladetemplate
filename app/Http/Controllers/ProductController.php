<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;

class ProductController extends Controller
{
public function index(){
    $products = Product::all();

    return view('allproduct', compact('product'));
}


public function addProductToCart(Request $request , $id){
  $prevCart = $request->session()->get('cart');
  $cart = new Cart($prevCart);
  $request->session()->put('cart' , $cart);
  return redirect()->route('allProduct');
}

public function showCart (){
    $cart = Session::get('cart');
    if ($cart) {
        return view('cartProducts',['cartitems'=>$cart]);
    }
    else {
        return redirect()->route('allProduct');
    }
}public function deleteItemFromCart(Request $request , $id){
 $cart = $request->session()->get('cart');

 if (array_key_exists($id,$cart->items)) {
     unset($cart->items[$id]);
 }
 $prevCart = $request->session()->get('cart');
 $updatedCart = new Cart($prevCart);
 $updatedCart->updatePriceAndQuantity();
 $request->session()->put('cart', $updatedCart);
 return  redirect()->route('cartProduct');
}
}
