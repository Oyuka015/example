<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;
use Alfa6661\AutoNumber\AutoNumberTrait;
use \Carbon\Carbon;

class Certificate extends Eloquent
{
    use AutoNumberTrait;
    
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

    public function getAutoNumberOptions()
    {
        return [
            'certificate_id' => [
                'format' => Carbon::now()->year.'-3(?)', // autonumber format. '?' will be replaced with the generated number.
                'length' => 3 // The number of digits in an autonumber
            ]
        ];
    }

    public function twoId(){
        return $this->belongsTo('App\Models\Certif_User_id', 'id', 'certificate_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
