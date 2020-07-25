<?php

namespace App\Http\Controllers;

use App\Title;
use App\TitleApply;
use App\User;
use Illuminate\Container\RewindableGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TitleController extends Controller
{

//    //title supervisor list （列表）
//    public function list(Request $request)
//    {
//        $user = $request->user();
//        $titles = $user->titles;
//
//
//        $titles= Title::find(Auth::user()->titles);
////        $user_id = auth()->user()->id;
////        $user = User::find($user_id);
////        return view('supervisor.titleList')->with('titles', $user->titles);
//        return view('supervisor.titleList', compact('user', 'titles'));
//    }
//
//
//    }

//    //title supervisor create page （创建页面试图）
//    public function index()
//    {
//        return view('supervisor.titleCreate');
//    }

//    //title create behaviour （title 创建）
//    public function create(Request $request)
//    {
//        //验证
//        $this->validate($request,[
//            'topic_id'=>'required',
//            'project_title'=>'required',
//            'suitable_for'=>'required',
//            'keywords'=>'required',
//            'description'=>'required',
//        ],
//        [
//            'required'=>':attribute is required',
//        ],
//        [
//            'topic_id'=>'Topic ID',
//            'project_title'=>'Project Title',
//            'keywords'=>'Keywords',
//            'suitable_for'=>'Suitable For',
//            'description'=>'Description',
//        ]);
//
//
//        //业务逻辑
//        $user_id=Auth::id();
//        $params=array_merge(\request(['topic_id','project_title'
//        ,'keywords','suitable_for','description']),compact('user_id'));
//        $title=Title::create($params);
//
////        $topic_id= $request->input('topic_id');
////        $project_title=$request->input('project_title');
////        $keywords = $request->input('keywords');
////        $suitable_for =$request->input('suitable_for');
////        $description = $request->input('description');
////        $user=$request->user();
////        $user->titles()->create(compact('topic_id','project_title',
////            'keywords','suitable_for','description'));
//
//
//        //渲染
//        return redirect('/title/index');
//    }
//

    //title detail (详情页）
    public function detail($id)
    {
       $title = Title::findOrFail($id);
        return view('supervisor.titleDetail',compact('title'));
    }
//
//
//    // title edit （编辑视图）
//    public function edit(Title $title)
//    {
////        $title = Title::findOrFail($id);
//        return view('supervisor.titleEdit',compact('title'));
//    }
//
//    // title update（更新行为）
//    public function update(Title $title)
//    {
//        $this->validate(request(),[
//            'topic_id'=>'required',
//            'project_title'=>'required',
//            'suitable_for'=>'required',
//            'keywords'=>'required',
//            'description'=>'required',
//        ],
//            [
//                'required'=>':attribute is required',
//            ],
//            [
//                'topic_id'=>'Topic ID',
//                'project_title'=>'Project Title',
//                'keywords'=>'Keywords',
//                'suitable_for'=>'Suitable For',
//                'description'=>'Description',
//            ]);
//
//
//       $title->topic_id = request('topic_id');
//       $title->project_title = request('project_title');
//       $title->keywords =request('keywords');
//       $title->suitable_for= request('suitable_for');
//       $title->description =request('description');
//       $title->save();
//
//        return redirect('title/index');
//    }
//
//
//
//    //title delete （删除）
//    public function delete(Title $title)
//    {
//
//       // TODO用户权限认证
//
//        $title->delete();
//        return redirect('title/index');
//    }


//    //supervisor title Vetting (tile列表）
//    public function vettingList(User $user, Title $title)
//    {
//        $titles= Title::paginate(1);
//        return view('moduleOwner.titleList',compact('titles'));
//    }
//
//    //supervisor 审核行为
//    public function vetting(Title $title)
//    {
//
//        $this->validate(request(),[
//           'status'=>'required|in:-1,1',
//        ]);
//
//        $title->status = request('status');
//        $title->save();
//
//        return redirect('moduleOwner.titleList',compact('titles'));
//    }
//
//    public function waitForVetting(Title $title)
//    {
//        $titles = Title::where('status',0)->paginate(8);
//        return view('moduleOwner.titleList',compact('titles'));
//    }


}
