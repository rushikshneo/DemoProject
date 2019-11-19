<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = ['name','short_description','long_description','price','special_price','special_price_from','special_price_to','quanity', 'meta_title','meta_description','status','modify_by'];

     public function attributes(){
    	return $this->hasMany('App\ProductsAttribute','product_id');
    }
	public function productasso(){
			return $this->hasMany('App\product_attributes_assoc','product_id');
	}
    public function images(){
    	return $this->hasMany('App\product_image','product_id');
    }  
     public function category(){
        return $this->hasMany('App\product_categories','product_id');
    }   
}
