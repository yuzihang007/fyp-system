<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Support\Facades\Auth;

class ApplicationStudent extends Pivot
{
    //
    protected $fillable = ['user_id','title_id','preferenceOrder'];



    //获取模型中的学生用户
    public function student()
    {
        return $this->hasOne(User::class);
    }

    //被选择的title
    public function title()
    {
        return $this->hasOne(Title::class);
    }

//    public function student()
//    {
//        return $this->belongsTo(User::class);
//    }
//
//    public function title()
//    {
//        return $this->belongsTo(Title::class);
//    }


}
