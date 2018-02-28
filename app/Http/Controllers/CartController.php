<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function update(){
    	$cart = auth()->user()->cart;
    	$cart->status = 'Pending';
    	$cart->save(); //update

    	$notification = "Tu pedidop se ha registrado satisfactoriamemte. te contactaremos por email";
    	return back()->with(compact('notification'));
    }
}
