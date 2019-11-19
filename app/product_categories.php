<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_categories extends Model
{
 protected $fillable = ['category_id'];

 public function product_categories(){
    	return $this->belongsTo('App\Product');
    }   
}
