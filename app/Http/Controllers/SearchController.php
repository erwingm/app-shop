<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SearchController extends Controller
{
    //
    public function show(Request $request){

    	// % re´resenta cada palabra de un producto
    	$query = $request->input('query');

    	//dd($query); // para ve q se revise q envia 
    	$products = Product::where('name','like',"%$query%")->paginate(10);
    	
    	if($products->count()== 1){
    		$id = $products->first()->id;
    		return redirect("products/$id"); // = 'products/'.$id
    	}
    	return view('search.show')->with(compact('products','query'));
    }

    public function data()
    {
    	// pluck devulve un arreglo la tabla product o otra
    	$products = Product::pluck('name');
    	return $products;

    }
}
