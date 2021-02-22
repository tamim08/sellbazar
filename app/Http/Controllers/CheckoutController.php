<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout1(){
        return view('front-end.customer.checkout1');
    }

    public function checkout2(){
        return view('front-end.customer.checkout2');
    }

    public function checkout3(){
        return view('front-end.customer.checkout3');
    }

    public function checkout4(){
        return view('front-end.customer.checkout4');
    }
}
