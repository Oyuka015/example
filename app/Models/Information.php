<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Information extends Eloquent
{
    protected $table = 'information_register';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        'title' => 'required',
        'information' => 'required',
    );
}
