<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //
    protected $table = 'book';
   	public $timestamps = false;

   	public function book(){
   		return $this->belongsTo('App\Category', 'id_category', 'id');
   	}
}
