<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    //注册页面 Login view
    public function index()
    {
        return view('register.index');
    }
    //注册行为
    /*Register Method
     * 1.validate the input username and password
     *   - username is required. Then,it must be unique one and the length is at least 5 characters
     *   - password is required. length is at least 6 characters.
     *   - password confirmation is required.
     * 2.after validation, create user and return the login page*/
//    public function register(Request $request)
//    {
//
//        //验证
//        $this->Validate($request,[
//            'username'=>'required|min:5|unique:users,username',
//            'password'=>'required|min:6,confirmed',
//            'password_confirmation' => 'required|same:password',
//            'role'=>'required',
//            ]);
//
//        //业务逻辑
//        $username= $request->input('username');
//        $password=bcrypt($request->input('password'));
//        $role=$request->input('role');
//        $user=User::create(compact('username','password','role'));
//
//        //渲染
//        return redirect('/login');
//    }
}
