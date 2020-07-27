<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',  'password','firstname','lastname','middlename','expertise',
        'email','role', 'created_at','preferenceOrder','user_id','title_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //supervisor和title的关联
    public function titles()
    {
        return $this->hasMany(Title::class);
    }

    //学生申请和title的关联
    public function studentTitles()
    {
        return $this->belongsToMany(Title::class,
            'application_student',
            'user_id',
            'title_id')
            ->withPivot(['user_id','title_id','preferenceOrder'])
            ->withTimestamps();
    }



    // 学生和申请模型的关联
    public function applicationInstances()
    {
        return $this->hasMany(ApplicationStudent::class);
    }

    //关联，一个用户有一个学生profile
    public function studentProfile()
    {
        return $this->hasOne(Student::class);
    }

    //关联，一个用户有一个学生profile
    public function supervisorProfile()
    {
        return $this->hasOne(Supervisor::class);
    }


}
