<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $fillable = [
        'name', 'email', 'level', 'password',
    ];


    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pesanan(){

        return $this->hasMany('App\Pesanan'. 'user_id', 'id');
    }

    public function isAdmin(){
        if($this->level == 'admin'){
            return true;
        }else{
            return false;
        }
    }
     public function isUser(){
        if($this->level == 'user'){
            return true;
        }else{
            return false;
        }
    }
}
