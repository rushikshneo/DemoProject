<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_categories extends Model
{
 protected $fillable = ['category_id'];

 public function product_categories(){
    	return $this->belongsTo('App\Product');
    }   
     public function product_cat(){
        return $this->hasMany('App\Product','id');
     }
      public function product_image(){
        return $this->hasMany('App\product_image','product_id');
     }
}
