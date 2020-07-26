<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Melihovv\ShoppingCart\Facades\ShoppingCart as Cart;

class CartController extends Controller
{
    public function cartContent(){
        return view('cart.cart');
    }
    public function addToCart(){
        // $cartItem = Cart::add("2", "T-shirt", "200", 2, [
        //     'color' => 'white',
        // ]);
        // $cartItem = Cart::add("2", "T-shirt", "200", 2, [
        //     'color' => 'white',
        // ]);
        
        // if($cartItem){
            print_r(Cart::content());
        // }else{
        //     echo "failed to add in cart";
        // }
        
    }
    
    public function showCart(){
        print_r(Cart::get("ac36059efa3b4d05ae3035731acf14ea"));
    }
}
