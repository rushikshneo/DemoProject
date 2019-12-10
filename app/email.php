<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class email extends Model
{
    protected $fillable = ['email_name','email_header','email_main_content','email_footer'];
}
