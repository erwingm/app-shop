<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Category;


class ProductController extends Controller
{
    //

    public function index(){

        $products = Product::paginate(10);
    	return view('admin.products.index')->with(compact('products')); //listado

    }

     public function create(){
        $categories = Category::orderBy('name')->get();
    	return view('admin.products.create')->with(compact('categories')); //formulario de registro
    }

     public function store(Request $request){
    	  // registra el nuevo producto en la db
        //dd($request->all());
        $messages = [
            'name.required' => 'Ingrese el nombre',
            'name.min' => 'Nomber minimo 3 caracteres',
            'description.required' => 'Descripcion requerido',
            'description.max'=>'maximo 200 caracteres',
            'price.required'=>'Ingrese Precio',
            'price.numeric'=>'debe ser numerico',
            'price.min'=>'debe ser mayores q 0'
        ];
        $rules=[
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price'=>'required|numeric|min:0'
        ];

        $this->validate($request, $rules, $messages);

        $product = new Product();
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save(); // Inserta

        return redirect('/admin/products');
    }

      public function edit($id){

        $product = Product::find($id);
        $categories = Category::orderBy('name')->get();
        return view('admin.products.edit')->with(compact('product','categories')); //captura del producto a editar
    }

     public function update(Request $request, $id){
          // registra el nuevo producto en la db
        //dd($request->all());
         $messages = [
            'name.required' => 'Ingrese el nombre',
            'name.min' => 'Nomber minimo 3 caracteres',
            'description.required' => 'Descripcion requerido',
            'description.max'=>'maximo 200 caracteres',
            'price.required'=>'Ingrese Precio',
            'price.numeric'=>'debe ser numerico',
            'price.min'=>'debe ser mayores q 0'
        ];
        $rules=[
            'name' => 'required|min:3',
            'description' => 'required|max:200',
            'price'=>'required|numeric|min:0'
        ];

        $this->validate($request, $rules, $messages);
        
        $product = Product::find($id);
        $product->name = $request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->long_description = $request->input('long_description');
        $product->category_id = $request->category_id;
        $product->save(); // Inserta

        return redirect('/admin/products');
    }

      public function destroy($id){

        $product = Product::find($id);
        $product->delete(); 
        return back();
    }
}
