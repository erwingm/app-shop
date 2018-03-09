<?php

namespace App\Http\Controllers\admin;
//ok
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use File;

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

	   $category = Category::create($request->only('name', 'description')); // trae datos o mass assignment
     if($request->hasFile('image')){

        $file = $request->file('image');
        $path = public_path().'/images/categories';
        $fileName = uniqid(). '-' .$file->getClientOriginalName();
        $moved = $file->move($path, $fileName);
        // actualiza la categoria y guarda
        if($moved){
          $category->image = $fileName;
          $category->save();
        }
        
     }

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
   		$category->update($request->only('name','description'));

      if($request->hasFile('image')){

        $file = $request->file('image');
        $path = public_path().'/images/categories';
        $fileName = uniqid(). '-' .$file->getClientOriginalName();
        $moved = $file->move($path, $fileName);

        // actualiza la categoria y guarda
        if($moved){
          $previousPath = $path.'/'. $category->image;
          $category->image = $fileName;
          $saved = $category->save();

          //Elimina la imagen anterioir
          if($saved)

          File::delete($previousPath);
        }
        
     }

        return redirect('/admin/categories');
    }

      public function destroy(Category $category){

        $category->delete(); 
        return back();
    }
}
