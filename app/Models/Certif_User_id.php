<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Certif_User_id extends Eloquent
{
    protected $table = 'base.certificate_users_id';
    // protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(

    );

    public function users(){
        return $this->belongsTo('App\Models\Users', 'user_id', 'id');
    }
}