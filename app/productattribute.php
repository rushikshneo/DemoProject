<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productattribute extends Model
{

	protected $fillable = ['name','created_by','modify_by'];

    public function attribute(){
    	return $this->hasMany('App\productattributevalue','product_attribute_id');
    }    
}
