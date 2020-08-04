<?php

namespace App\Http\Controllers;
use App\Title;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ModuleOwnerController extends Controller
{
    //module owner home
    public function home()
    {
        return view('moduleOwner.home');
    }

    // Vetting (题目总列表）
    public function vettingList(Title $data, Request $request)
    {
        $title = $request->input('title');

        $list = $data->with('user')->when($title, function ($query) use($title) {
            $query->where('project_title', 'like', "%$title%");
        })->paginate(8);

        return view('moduleOwner.title.list',compact('list'));
    }

    //supervisor 审核行为
    public function vetting(Title $title)
    {
        $this->validate(request(),[
            'status'=>'required|in:-1,1',
        ]);

        $title->status = request('status');
        $title->save();

        return success();
    }

    //title wait for vetting (待审核题目列表）
    public function waitForVetting(Title $data, Request $request)
    {
        $title = $request->input('title');

        $list = $data->with('user')->when($title, function ($query) use($title) {
            $query->where('project_title', 'like', "%$title%");
        })->where('status',0)->paginate(8);

        return view('moduleOwner.title.wait',compact('list'));
    }
    public function passForVetting(Title $data, Request $request)
    {
        $title = $request->input('title');

        $list = $data->with('user')->when($title, function ($query) use($title) {
            $query->where('project_title', 'like', "%$title%");
        })->where('status',1)->paginate(8);

        return view('moduleOwner.title.pass',compact('list'));
    }
    public function refuseForVetting(Title $data, Request $request)
    {
        $title = $request->input('title');

        $list = $data->with('user')->when($title, function ($query) use($title) {
            $query->where('project_title', 'like', "%$title%");
        })->where('status',-1)->paginate(8);

        return view('moduleOwner.title.refuse',compact('list'));
    }

    public function applyStudentList()
    {
        $list = DB::table('application_student as a')->leftJoin('titles as b',function ($join) {
            $join->on('a.title_id','=','b.id');
        })->leftJoin('users as c', function ($join) {
            $join->on('a.user_id','=','c.id');
        })->select(['c.username','c.email','b.topic_id','b.project_title as title',
            'a.preferenceOrder as choice_order','a.id','a.student_number','a.allocation_status','a.supervisor_mark_student','b.suitable_for'])->paginate(4);

        return view('moduleOwner.apply.index', compact('list'));
    }

    public function waitAllocateStudent()
    {
        $students = DB::table('application_student')->where('allocation_status', 1)->get()->pluck('user_id')->flatten()->unique();

        $list = DB::table('application_student as a')->leftJoin('titles as b',function ($join) {
            $join->on('a.title_id','=','b.id');
        })->leftJoin('users as c', function ($join) {
            $join->on('a.user_id','=','c.id');
        })->select(['c.username','c.email','b.topic_id','b.project_title as title',
            'a.preferenceOrder as choice_order','a.id','a.student_number','a.allocation_status','a.supervisor_mark_student','b.suitable_for'])->when($students->count(), function ($query) use($students){
            $query->whereNotIn('a.user_id', $students);
        })->paginate(4);

        return view('moduleOwner.apply.wait', compact('list'));
    }
}
