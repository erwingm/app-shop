<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //una categoria tiene muchos propduyctos

	   public static  $messages = [
            'name.required' => 'Ingrese el nombre',
            'name.min' => 'Nomber minimo 3 caracteres',
            'description.max'=>'maximo 200 caracteres'
        ];
       public static $rules=[
            'name' => 'required|min:3',
            'description' => 'max:200'
        ];

	protected $fillable = ['name', 'description'];

    public function products(){
    	
    	return $this->hasMany(Product::class);
    }

    public function getFeaturedImageUrlAttribute(){
        
        if($this->image)
            return '/images/categories/'.$this->image;
        //else
        $featuredProduct = $this->products()->first();

        if($featuredProduct)
        return $featuredProduct->featured_image_url;

        return '/images/default.png';
    }


}
