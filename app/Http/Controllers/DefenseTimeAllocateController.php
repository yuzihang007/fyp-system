<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefenseTimeAllocateController extends Controller
{
    public function studentIndex()
    {
        return view('timeAllocate.student');
    }

    public function teacherIndex()
    {
        return view('timeAllocate.teacher');
    }
    public function moduleOwnerIndex()
    {
        return view('timeAllocate.module_owner');
    }

}
