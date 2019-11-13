<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $fillable = ['code','percent_off','no_of_uses','created_by','modified_by'];

}
