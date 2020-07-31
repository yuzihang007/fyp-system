<?php

namespace App\Http\Controllers;
use App\Title;
use App\User;

use http\Message;
use Illuminate\Http\Request;

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
}
