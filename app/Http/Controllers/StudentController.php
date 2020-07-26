<?php

namespace App\Http\Controllers;

use App\ApplicationStudent;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    //student home page
    public function home(User $user)
    {
        $user= auth()->user();
        return view('student.home',compact('user'));
    }


    // topic list
    public function titleIndex(Title $title, User $user)
    {
        $titles = Title::where('status',1)->orderBy('created_at','desc')->withCount('titleSelections')->paginate(3);
        $user = User::where(['application_student.user_id','==','users.id']);
        return view('student.titleList',compact('titles','user'));
    }


    //title application
    public function titleSelect(Title $title, Request $request)
    {
        ApplicationStudent::firstOrcreate([
            'user_id'=>Auth::id(),
            'title_id'=>$title->id,
            'preferenceOrder' => \request('preferenceOrder')
        ]);
        return redirect('student/titleIndex');
    }
}
