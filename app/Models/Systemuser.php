<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Systemuser extends Eloquent
{
    protected $table = 'user_role';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public static $rules = array(
        'user_name' => 'required',
        'province' => 'required',
        'surname' => 'required',
        'lastname' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'active_status' => 'required',
    );
}