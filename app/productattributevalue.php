<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productattributevalue extends Model
{
   
   protected $fillable = ['attribute_value','created_by','modify_by'];
   
    public function productattribute(){
    	return $this->belongsTo('App/productattribute');
    }
}
