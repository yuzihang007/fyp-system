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
    public function titleIndex(Title $title)
    {
        $titles = Title::where('status',1)->orderBy('created_at','desc')->withCount('titleSelections')->paginate(3);
        return view('student.titleList',compact('titles'));
    }


    //title select
    public function titleSelect(Title $title, Request $request)
    {

        ApplicationStudent::firstOrcreate([
            'user_id'=>Auth::id(),
            'title_id'=>$title->id,
            'preferenceOrder' => \request('preferenceOrder')
        ]);
        return redirect('student/titleIndex');
    }

    //cancel selection

//    public function unSelect(Title $title)
//    {
//        $title->titleSelection(Auth::id())->delete();
//        return back();
//    }
}
