<?php

namespace App\Policies;

use App\ApplicationStudent;
use App\Http\Controllers\StudentController;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Title;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TitlePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // 修改权限
    public function update(User $user,Title $title)
    {
        return $title->status !==1 && $user->id == $title->user_id || $user->role==3;

    }
    // 删除权限
    public function delete(User $user,Title $title){

        return $title->status !==1 && $user->id == $title->user_id;
    }

    //学生查看title权限
    public function index(User $user,Title $title){

        return $title->status ==1;
    }

    // 点击第一选择权限
    public function firstPrefer(User $user)
    {
        $user_id=Auth::id();
        $applications = DB::table('application_student')
            ->where([
                'preferenceOrder'=>1,
                'user_id'=>$user_id,
            ])->get();

        if ( $applications->contains('preferenceOrder','=',1)){
            return false;
        }else{
            return true;
        }


    }





}
