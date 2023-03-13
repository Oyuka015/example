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
    protected $table = 'practice_exam_list';
    protected $primaryKey = 'id';
    public $timestamps = false;
    
    public static $rules = array(
        'user_id' => 'required',
        'begin_date' => 'required',
        'end_date' => 'required',
        'zoom_link' => 'required',
    );

    public function user(){
        return $this->belongsTo('App\Models\User', 'id');
    }
}
