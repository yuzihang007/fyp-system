<?php

namespace App\Http\Controllers;

use App\ApplicationStudent;
use App\Student;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use const http\Client\Curl\AUTH_DIGEST;

class SupervisorController extends Controller
{
    //supervisor homepage
    public function home()
    {
        return view('supervisor.home');
    }

    //title supervisor list （列表）
    public function list(Request $request)
    {
//        $user = $request->user();
//        $titles = $user->titles;
//        $titles= Title::find(Auth::user()->titles);
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('supervisor.titleList')->with('titles', $user->titles);
//        return view('supervisor.titleList', compact('user', 'titles'));
    }

    //title supervisor create page （创建topic页面）
    public function index()
    {
        return view('supervisor.titleCreate');
    }


    //title create behaviour （title 创建）
    public function create(Request $request)
    {
        //validate
        $this->validate($request,[
            'topic_id'=>'required',
            'project_title'=>'required',
            'suitable_for'=>'required',
            'keywords'=>'required',
            'description'=>'required',
        ],
            [
                'required'=>':attribute is required',
            ],
            [
                'topic_id'=>'Topic ID',
                'project_title'=>'Project Title',
                'keywords'=>'Keywords',
                'suitable_for'=>'Suitable For',
                'description'=>'Description',
            ]);


        //logic behaviour
        $user_id=Auth::id();
        $params=array_merge(\request(['topic_id','project_title'
            ,'keywords','suitable_for','description']),compact('user_id'));
        $title=Title::create($params);
        //渲染
        return redirect('/title/index');
    }

    //title detail (详情页）
    public function detail($id)
    {
        $title = Title::findOrFail($id);
        return view('supervisor.titleDetail',compact('title'));
    }

    // title edit （编辑视图）
    public function edit(Title $title)
    {
        return view('supervisor.titleEdit',compact('title'));
    }

    // title update（更新行为）
    public function update(Title $title)
    {
        $this->validate(request(),[
            'topic_id'=>'required',
            'project_title'=>'required',
            'suitable_for'=>'required',
            'keywords'=>'required',
            'description'=>'required',
        ],
            [
                'required'=>':attribute is required',
            ],
            [
                'topic_id'=>'Topic ID',
                'project_title'=>'Project Title',
                'keywords'=>'Keywords',
                'suitable_for'=>'Suitable For',
                'description'=>'Description',
            ]);


        $title->topic_id = request('topic_id');
        $title->project_title = request('project_title');
        $title->keywords =request('keywords');
        $title->suitable_for= request('suitable_for');
        $title->description =request('description');
        $title->save();

        return redirect('title/index');
    }

    //title delete （删除）
    public function delete(Title $title)
    {
        // TODO:用户权限认证
        $title->delete();
        return redirect('title/index');
    }



    //学生申请列表
    public function applicationIndex()
    {
        $list = DB::table('application_student as a')->leftJoin('titles as b',function ($join) {
            $join->on('a.title_id','=','b.id');
        })->leftJoin('users as c', function ($join) {
            $join->on('a.user_id','=','c.id');
        })->where('b.user_id',Auth::id())->select(['c.username','c.email','b.topic_id','b.project_title as title',
            'a.preferenceOrder as choice_order','a.id','a.student_number','a.allocation_status','a.supervisor_mark_student','b.suitable_for'])->paginate(4);

        return view('supervisor.applicationList',compact('list'));
    }


    //给学生申请评分
    public function  markStudent(ApplicationStudent $applicationStudent)
    {

        $this->validate(request(),[

            'supervisorMarkStudent'=>'required|in:-2,-1,0,1,2',
        ]);
        $applicationStudent->supervisor_mark_student = request('supervisorMarkStudent');
        $applicationStudent->save();

        return redirect()->back();
    }

    //supervisor hire
    public function hire(ApplicationStudent $applicationStudent)
    {

        $this->validate(request(),[
            'allocationStatus'=>'required|in:0,1',
        ]);

        $applicationStudent->allocationStatus = request('allocationStatus');
        $applicationStudent->save();

        return redirect('moduleOwner.titleList',compact('titles'));
    }



}
