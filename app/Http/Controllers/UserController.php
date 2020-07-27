<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    //学生profile页面
    public function studentProfile(User $user,$id)
    {
        $data = DB::table('users')->where('users.id','=',$id)
        ->leftJoin('students','users.id','=','students.user_id')
        ->get();

        return view('profile.studentProfile',compact('data'));
    }


    // 学生profile更新页面
    public function studentProfileEdit()
    {
        return view('profile.studentProfileEdit');
    }





    public function studentProfileUpdate()
    {

    }

    //教师profile页面
    public function SupervisorProfile(User $user,$id)
    {
        $data = DB::table('users')->where('users.id','=',$id)
            ->leftJoin('supervisors','users.id','=','supervisors.user_id')
            ->get();

        return view('profile.supervisorProfile',compact('data'));
    }





    public function profileUpdate()
    {
        //
    }
}
