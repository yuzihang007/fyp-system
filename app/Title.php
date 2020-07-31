<?php

namespace App;



use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Title extends Model
{
    protected $fillable = ['topic_id','description','user_id','project_title',
        'keywords','suitable_for','status','id','title_id','student_id'];

    //supervisor和title的关联
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //学生申请和title的关联
    public function students()
    {
        return $this->belongsToMany(User::class,
            'application_student',
            'title_id',
            'user_id')
            ->withPivot(['preferenceOrder','user_id','title_id','allocationStatus','supervisorMarkStudent'])
            ->withTimestamps();
    }

    public function applicationInstances()
    {
        return $this->hasMany(ApplicationStudent::class);
    }






//
    //关联
    public function titleSelection($user_id)
    {
        return $this->hasOne(ApplicationStudent::class)->where('user_id',$user_id);
    }

    //first choice
    public function firstPrefer($user_id)
    {
        return $this->hasMany(ApplicationStudent::class)
            ->where([
                ['preferenceOrder','=',1],
                ['user_id','=',$user_id]
            ]);
    }




    //second choice
    public function secondPrefer()
    {
        return $this->hasOne(ApplicationStudent::class)->where('preferenceOrder',2);
    }


    //third choice
    public function thirdPrefer()
    {
        return $this->hasOne(ApplicationStudent::class)->where('preferenceOrder',3);
    }



    public function titleSelections()
    {
        return $this -> hasMany(ApplicationStudent::class);
    }


    protected $casts=[
        'suitable_for'=>'array'
    ];

    public function getFullNameAttribute()
    {
        return $this->user->firstname ? $this->user->firstname . ',' . $this->user->lastname: $this->user->username;
    }
    public function getAuditStatusAttribute()
    {
        return ['-1' => 'Fail', '0' => 'Wait', '1' => 'Pass'][$this->status] ?? 'Error';
    }
}
