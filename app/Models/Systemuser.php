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
    protected $table = 'systemuser';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        'user_name' => 'required',
        'citizenship' => 'required',
        'family_name' => 'required',
        'surname' => 'required',
        'lastname' => 'required',
        'register' => 'required',
        'age' => 'required',
        'gender' => 'required',
        // 'work_status' => 'required', 
        'email' => 'required',
        'phone' => 'required',
        'in-case-name' => 'required',
        'in-case-number' => 'required',
        'province-capital' => 'required',
        'district' => 'required',
        'education-degree' => 'required',
        'home_address' => 'required',
    );
}
