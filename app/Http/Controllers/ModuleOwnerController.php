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
    public function vettingList(Title $title)
    {
        $titles= $title->with('user')->paginate(4);
        return view('moduleOwner.title.list',compact('titles'));
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
    public function waitForVetting(Title $title)
    {
        $titles = $title->with('user')->where('status',0)->paginate(8);
        return view('moduleOwner.title.wait',compact('titles'));
    }
    public function passForVetting(Title $title)
    {
        $titles = $title->with('user')->where('status',1)->paginate(8);
        return view('moduleOwner.title.pass',compact('titles'));
    }
    public function refuseForVetting(Title $title)
    {
        $titles = $title->with('user')->where('status',-1)->paginate(8);
        return view('moduleOwner.title.refuse',compact('titles'));
    }
}
