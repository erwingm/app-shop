<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Mail\NewOrder;
use Mail;

class CartController extends Controller
{
    //
    public function update(){

    	$client = auth()->user();
    	$cart = $client->cart;
    	$cart->status = 'Pending';
    	$cart->order_date = Carbon::now();
    	$cart->save(); //update
    	$admins = User::where('admin', true)->get(); //devuelve a todos los admin
    	
    	Mail::to($admins)->send(new NewOrder($client, $cart));
    	$notification = "Tu pedidop se ha registrado satisfactoriamemte. te contactaremos por email";
    	return back()->with(compact('notification'));
    }
}
