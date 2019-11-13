<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
   protected $fillable = ['product_id','image_name','image_url','status','modified_by','created_by'];

   public function images(){
    	return $this->belongsTo('App\Product');
    }    
}
