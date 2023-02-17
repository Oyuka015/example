<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Eloquent;
use Illuminate\Support\Facades\Auth;

class Exam extends Eloquent
{
    protected $table = 'exam';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    
    public static $rules = array(
        'exam_name' => 'required',
        'lower_percent' => 'required',
    );

    public function questions()
    {
        return $this->belongsToMany('App\Models\Question', 'exam_question', 'exam_id', 'question_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\User', 'exam_student', 'exam_id', 'user_id');
    }

    public function requiredExam()
    {
        return $this->belongsTo('App\Models\Exam', 'required_exam_id');
    }

    public function examToMap(){
        return $this->hasMany('App\Models\ExamQuestion', 'exam_id', 'id');
    }

    public static function boot()
    {
        parent::boot();
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::creating(function($exam)
        {
            $exam->created_by = Auth::user()->id;
        });

        static::updating(function($exam)
        {
            $exam->updated_by = Auth::user()->id;
        });

        static::deleting(function($exam)
        {
            $exam->questions()->detach();
        });
    }
}
