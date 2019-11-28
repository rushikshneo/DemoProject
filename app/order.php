<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
   protected $fillable = ['user_id','product_id','transaction_id','payment_method','status','total','billing_address1','billing_address2','billing_city', 'billing_state','billing_country','billing_zip'];

   public function order(){
    	return $this->belongsTo('App\Product');
    }   
}
