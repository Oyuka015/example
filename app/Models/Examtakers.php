<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Examtakers extends Eloquent
{
    protected $table = 'user_role';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public static $rules = array(
        'user_name' => 'required',
        'family_name' => 'required',
        'surname' => 'required',
        'lastname' => 'required',
        'register' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'citizenship' => 'required',
        'active_status' => 'required',
    );
}
