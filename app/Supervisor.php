<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    //关联：一个profile只属于一个用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
