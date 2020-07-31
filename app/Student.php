<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','email','program'];
    //关联：一个学生profile属于一个用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
