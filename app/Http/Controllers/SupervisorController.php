<?php

namespace App\Http\Controllers;

use App\ApplicationStudent;
use App\Title;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // TODO用户权限认证

        $title->delete();
        return redirect('title/index');
    }


//    student application list
//    public function applicationIndex(Title $title)
//    {
//        $user_id = auth()->user()->id;
//        $user = User::find($user_id);
//        return view('supervisor.applicationList')->with('titles', $user->titles);
//    }

    public function applicationIndex(ApplicationStudent $applicationStudent,Title $title)

    {

        $records=ApplicationStudent::all();
        $titles=Title::all();
//        where([
//            'titles.user_id'=>'application_student.title_id'
//        ]);
        return view('supervisor.applicationList',compact('records'));
    }


}
