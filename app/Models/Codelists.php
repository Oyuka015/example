<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Codelists extends Eloquent
{
    protected $table = 'reference.cl_codelists';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        
    );

    public function user(){
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

}
