<?php
namespace Domain\Shared\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class AuthModel extends Authenticable{
    use SoftDeletes,HasApiTokens,Notifiable;
    protected $guarded=['id','created_at','updated_at'];
    protected $hidden=['password','remember_token'];
    
}

