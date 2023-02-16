<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Certificate extends Eloquent
{
    protected $table = 'certificate';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        // 'user_name' => 'required',
        // 'certificate_id' => 'required',
        // 'register' => 'required',
        // 'registered_date' => 'required',
        // 'registered_user' => 'required',
        // 'lastname' => 'required',
        // 'surname' => 'required',
        // 'valid_for' => 'required',
        // 'signature' => 'required',
    );

    public function twoId(){
        return $this->belongsTo('App\Models\Certif_User_id', 'id', 'certificate_id');
    }
}
