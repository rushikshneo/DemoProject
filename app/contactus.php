<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class contactus extends Model
{
   protected $fillable = ['id','name','email','message','admin_note','subject'];

  
}
