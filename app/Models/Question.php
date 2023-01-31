<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;

class Question extends Eloquent
{
    protected $table = 'question';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        'question' => 'required',
        'answer1' => 'required',
        'answer2' => 'required',
        'answer3' => 'required',
        'answer4' => 'required',
        'correct_answer' => 'required',
        'score' => 'required',
        // 'exam_file' => 'required',
    );
}
