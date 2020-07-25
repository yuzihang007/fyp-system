<?php

namespace App\Http\Controllers;
use App\Title;
use App\User;

use Illuminate\Http\Request;

class ModuleOwnerController extends Controller
{
    //module owner home
    public function home()
    {
        return view('moduleOwner.home');
    }

    // Vetting (题目总列表）
    public function vettingList(User $user, Title $title)
    {
        $titles= Title::paginate(4);
        return view('moduleOwner.titleList',compact('titles'));
    }

    //supervisor 审核行为
    public function vetting(Title $title)
    {

        $this->validate(request(),[
            'status'=>'required|in:-1,1',
        ]);

        $title->status = request('status');
        $title->save();

        return redirect('moduleOwner.titleList',compact('titles'));
    }

    //title wait for vetting (待审核题目列表）
    public function waitForVetting(Title $title)
    {
        $titles = Title::where('status',0)->paginate(8);
        return view('moduleOwner.titleList',compact('titles'));
    }
}
