<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';

    public static $rules = array(
        'username' => 'required',
        // 'email' => 'required',  
        // 'register' => 'required',
        // 'lastname' => 'required',
        // 'firstname' => 'required',
        // 'phone' => 'required',
        // 'password' => 'required',
        // 'role_id' => 'required',
    );
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\UserRole', 'role_id');
    }

    public function examQuestions()
    {
        return $this->belongsToMany('App\Models\Question', 'exam_results', 'user_id', 'question_id');
    }

    public function exams()
    {
        return $this->belongsToMany('App\Models\Exam', 'exam_student', 'user_id', 'exam_id')->withPivot(['score', 'is_passed', 'exam_date']);
    }

    public function passedExams()
    {
        return $this->belongsToMany('App\Models\Exam', 'exam_student', 'user_id', 'exam_id')->withPivot(['score', 'is_passed', 'exam_date'])->wherePivot('is_passed', true);
    }

    public function certificate()
    {
        return $this->belongsTo('App\Models\Certificate', 'id', 'user_id');
    }

    public static function boot()
    {
        parent::boot();
    
        // cause a delete of a product to cascade to children so they are also deleted
        static::creating(function($user)
        {
            $user->created_by = Auth::user()->id;
        });

        static::updating(function($user)
        {
            $user->updated_by = Auth::user()->id;
        });
    }

    public function userToLesson()
    {
        return $this->belongsToMany('App\Models\Online', 'online_course_view', 'lesson_id', 'user_id');
    }
}
