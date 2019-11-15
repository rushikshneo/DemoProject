<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_addresses extends Model
{
     protected $fillable = [
        'user_id','address1', 'address2', 'zip_code','city','state','country'
    ];


  public function user() {
        return $this->belongsTo(User::class);
    }
}
