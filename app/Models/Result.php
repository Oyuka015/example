<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Result extends Eloquent
{
    protected $table = 'examtakers';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        'user_id' => 'required',
        'exam_1' => 'required',
        'exam_2' => 'required',
    );
}
