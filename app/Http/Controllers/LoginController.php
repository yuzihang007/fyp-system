<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //登陆页面
    public function index()
    {
        return view('login.index');
    }

    //登陆行为
    public function login(Request $request)
    {

        //验证

        $this->Validate($request,[
            'username'=>'required',
            'password'=>'required|min:8',
        ]);
        //逻辑
        $user = array(
            'username'=>$request->username,
            'password'=>$request->password,
        );
        if(Auth::attempt($user,true)){

            switch (auth()->user()->role){
                case 1:
                    return redirect('admin/home');
                case 4:
                    return redirect('student/home');
                case 2:
                    return redirect('assessor/home');
                case 3:
                    return redirect('moduleOwner/home');
                case 5:
                    return redirect('supervisor/home');

                default:
                    break;}

            return redirect('/');
        }
        //渲染
        return redirect()->back()->withErrors("username and password are not match");
    }

        //logout
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
