<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_attributes_assoc extends Model
{
 protected $fillable = ['product_attribute_id','product_attribute_value_id'];

   public function assoc(){
    	return $this->belongsTo('App/Product');
     }
}
