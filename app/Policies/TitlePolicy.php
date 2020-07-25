<?php

namespace App\Policies;

use App\ApplicationStudent;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Title;
use Illuminate\Support\Facades\Auth;

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



}
