<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Product;
use App\Category;

class TestController extends Controller
{
    //
    public function welcome(){

    	//solicitaremos los productos del fake
    	// mostrar solo categorias
    	$categories = Category::has('products')->get();
    	return view('welcome')->with(compact('categories'));
    	/*
    	para mostrar productos
    	$products = Product::paginate(9);
    	return view('welcome')->with(compact('products'));
    	*/
    	//compact nos ayuda a pasar los parametros q queramos 
    	//Orden la ruta se asocia con el controlador y el a la vez
    	//devuelve una vista
    }
}
