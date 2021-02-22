<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function customer_login(){
        return view('front-end.customer.login');
    }

    public function customer_registration(){
        return view('front-end.customer.registration'); 
    }

    public function customer_account(){
        return view('front-end.customer.account');
    }

    public function customer_order(){
        return view('front-end.customer.order');
    }

    public function customer_wishlist(){
        return view('front-end.customer.wishlist');
    }

    public function basket(){
        return view('front-end.customer.basket');
    }

}
