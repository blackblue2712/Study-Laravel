<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
   	protected $table = 'category';
   	public $timestamps = false;

   	public function category(){
   		return $this->hasMany('App\Book', 'id_category', 'id');
   	}
}
