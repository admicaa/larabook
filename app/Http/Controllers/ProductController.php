<?php

namespace App\Http\Controllers;
use App\Product;
use App\Cart;
use Illuminate\Http\Request;
use Session;
use Stripe\Stripe;
use Stripe\Charge;
class ProductController extends Controller
{
    
    public function index(){
    
        $products = Product::latest()->get();
    
        return view('welcome',
            compact('products')
        );



    
    }

    public function getCart(){
        if (session()->has('cart')){
            $cart =session()->get('cart');
            return view('cart.cart'
                ,['products'=>$cart->items,'totalprice'=>$cart->totalPrice]
            );    
        }
        else{
            return view('cart.cart');
        }
    }

    public function getAddCart($id){
        $product = Product::find($id);

        $oldcart = Session::has('cart') ? Session::get('cart') : null;
        $oldcart = new Cart($oldcart);
        $oldcart->add($product,$id);
        session(['cart'=>$oldcart]);
        session()->save();
        return redirect()->home();
    }

    public function getcheckOut(){
        if (!session()->has('cart')){
            return redirect('cart');
        }
        $cart = new Cart(session()->get('cart'));
        $total = $cart->totalPrice;
        return view('cart.checkout',compact('total'));
    }    

    public function postcheckOut(){
        if (!session()->has('cart')){
            return redirect('/cart');
        }
        $cart = new Cart(session()->get('cart'));
        Stripe::setApiKey('sk_test_L90mWjTIgqIfDR7u4MrDqRzG');
        try{
            Charge::create(array(
                "amount" => $cart->totalPrice * 100,
                "currency" => "usd",
                "source" => request()->stripeToken, // obtained with Stripe.js
                "description" => "buying hagat"
            ));
        }
        catch(\Exception $e){
            return redirect('/cart');
        }
        session()->forget('cart');
        return redirect('/');
    }

}



