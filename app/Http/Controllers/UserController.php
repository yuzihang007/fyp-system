<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //个人设置页面
    public function setting()
    {
        return view('user.setting');
    }
    //个人设置行为
    public function settingStore()
    {

    }

    //profile 页面
    public function profileDetail($id)
    {
        $user= User::findOrFail($id);
        return view('profile.show',compact('user'));
    }

    public function profileUpdate()
    {
        //
    }
}
