<?php
//ashhh

// el orden de las rutas cuenta ya que se ejecuta dependiendo al orden
Route::get('/','TestController@welcome');

Auth::routes();

Route::get('/search','SearchController@show'); // para buscvar products
//auth valida la session
Route::get('/products/json','SearchController@data'); // para json de bsqueda

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/products/{id}','ProductController@show');// formulario Edicion
Route::get('/categories/{category}','CategoryController@show');// ver productos por categoria

//registra nuevos detalles al carrtio
Route::post('/cart','CartDetailController@store');
Route::delete('/cart','CartDetailController@destroy');

Route::post('/order','CartController@update');

Route::middleware(['auth','admin'])->prefix('admin')->namespace('Admin')->group(function () {
	Route::get('/products','ProductController@index'); //listado
	Route::get('/products/create','ProductController@create'); //formulario nuevo producto
	Route::post('/products','ProductController@store');// crear producto
	Route::get('/products/{id}/edit','ProductController@edit');// formulario Edicion
	Route::post('/products/{id}/edit','ProductController@update');// Actualizar ´producto
	Route::post('/products/{id}/delete','ProductController@destroy');// Actualizar ´producto
	Route::get('/products/{id}/images','ImageController@index');// Listado Image
	Route::post('/products/{id}/images','ImageController@store');// Registrar Image
	Route::delete('/products/{id}/images','ImageController@destroy');// Registrar Image
	Route::get('/products/{id}/images/select/{image}','ImageController@select');
	// par aponer como destacada

	Route::get('/categories','CategoryController@index'); //listado
	Route::get('/categories/create','CategoryController@create'); //formulario nuevo producto
	Route::post('/categories','CategoryController@store');// crear producto
	Route::get('/categories/{category}/edit','CategoryController@edit');// formulario Edicion
	Route::post('/categories/{category}/edit','CategoryController@update');// Actualizar ´producto
	Route::delete('/categories/{category}','CategoryController@destroy');// Actualizar ´producto

});



