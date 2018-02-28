<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //una categoria tiene muchos propduyctos

    public function products(){
    	
    	return $this->hasMany(Product::class);
    }
}
