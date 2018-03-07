<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;

class CategoryController extends Controller
{
    //
    public function index(){

        $categories = Category::orderBy('name')->paginate(10);
    	return view('admin.categories.index')->with(compact('categories')); //listado

    }

     public function create(){

    	return view('admin.categories.create'); //formulario de registro
    }

     public function store(Request $request){
    	  // registra el nuevo producto en la db
        //dd($request->all());

      $this->validate($request, Category::$rules, Category::$messages);

	  Category::create($request->all()); // trae datos o mass assignment

        // $categories->save(); // ya no requiere este metodo cuando usamos el mass assignment

        return redirect('/admin/categories');
    }

      public function edit(Category $category){


      return view('admin.categories.edit')->with(compact('category')); //captura del producto a editar
      /*  $category = Category::find($id);
        return view('admin.categories.edit')->with(compact('category')); //captura del producto a editar*/
    }

     public function update(Request $request, Category $category){
          // registra el nuevo producto en la db
        //dd($request->all());
    
        $this->validate($request, Category::$rules, Category::$messages);
   		$category->update($request->all());

        return redirect('/admin/categories');
    }

      public function destroy(Category $category){

        $category->delete(); 
        return back();
    }
}
