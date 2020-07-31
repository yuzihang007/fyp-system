<?php

namespace App\Http\Controllers;

use App\ApplicationStudent;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    //student home page
    public function home(User $user)
    {
        $user= auth()->user();
        return view('student.home',compact('user'));
    }


    // topic list
    public function titleIndex(Title $title,ApplicationStudent $applicationStudent)
    {
        $list = $title->query()->where('status',1)->orderBy('created_at','desc')->with(['titleSelections' => function($query) {
            $query->where('user_id', Auth::id());
        }])->paginate(3);

        $apply = $applicationStudent->query()->where('user_id', Auth::id())->get()->pluck('preferenceOrder')->flip();

        return view('student.titleList',compact('list', 'apply'));
    }


    //title select
    public function titleSelect(Request $request)
    {
        $title_id = $request->input('title_id');
        $preferenceOrder = $request->input('preferenceOrder');

        ApplicationStudent::firstOrcreate([
            'user_id'=>Auth::id(),
            'title_id'=>$title_id,
            'preferenceOrder' => $preferenceOrder
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
