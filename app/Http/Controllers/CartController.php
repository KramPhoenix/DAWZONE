<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Session;

class CartController extends Controller
{
    public function index(){
        if (!Session::has('cart')){
            return view('cart');
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('cart', [
            'products' => $cart->products,
            'total_price' => $cart->total_price,
            'total_quantity' => $cart->total_quantity
        ]);
    }

    public function addToCart(Request $request, $id){

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        return redirect()->back();
    }

    public function reduceOneFromCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceOne($id);

        if (count($cart->products) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }

        return redirect()->route('cart');
    }

    public function removeFromCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeProduct($id);

        if (count($cart->products) > 0){
            Session::put('cart', $cart);
        } else {
            Session::forget('cart');
        }


        return redirect()->route('cart');
    }


}
