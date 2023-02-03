<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Online extends Eloquent
{
    protected $table = 'online_course';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        'lesson_name' => 'required',
        'lesson_summary' => 'required',
        'lesson_type' => 'required',
    );
}
