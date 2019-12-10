<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
// use Laravel\Passport\HasApiTokens;
class User extends Authenticatable
{
    use  Notifiable;
    use HasRoles;

  
    protected $fillable = [
        'firstname','lastname', 'email', 'password','password_confirmation','role','status'
    ];

  
    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

  public function is_admin(){
     if($this->role != "Customer"){
        return true;
    }else{
      return false;
    }
  }

public function is_active(){
     if($this->status!= 0){
        return true;
    }else{
      return false;
    }
  }

   public function user_addresses(){
        return $this->hasMany(user_addresses::class);
    }
}
