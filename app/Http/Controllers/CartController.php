<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function addToCart(Product $product){
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = new Cart();
        }
        $cart->add($product);
        session()->put('cart' , $cart);
        return redirect()->route('home')->withSuccessMessage('Add to cart SuccessFully');
    }

    public function show(){

        if(session('success_message')){
            toast(session('success_message'),'success');
        }

        if(session()->has('cart')){
            $cart = new Cart( session()->get('cart') );
        }else{
            $cart = null;
        }
        return view('client.showCart',[
            'cart' => $cart
        ]);
    }

    public function update(Request $request , Product $product)
    {
        $request->validate([
            'qty'=>'required|numeric|min:1'
        ]);

        $cart = new Cart(session()->get('cart'));

        $cart->updateQty($product->id , $request->qty);

        session()->put('cart',$cart);

        return redirect()->route('cart.show')->withSuccessMessage('Product updated  to cart SuccessFully');
    }

    public function remove(Product $product)
    {
        $cart = new Cart(session()->get('cart'));
        $cart->remove($product->id);

        if($cart->totalQty <=0){
            session()->forget('cart');
        }else{
            session()->put('cart',$cart);
        }
        
        return redirect()->route('cart.show')->withSuccessMessage('Product deleted  to cart SuccessFully');
    }

    public function checkout()
    {
        if(session()->has('cart')){
            $cart = new Cart( session()->get('cart') );
        }else{
            $cart = null;
        }
        return view('client.checkout',[
            'cart'=>$cart
        ]);
    }
}
