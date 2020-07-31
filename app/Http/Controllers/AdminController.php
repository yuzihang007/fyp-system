<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // admin home page
    public function home()
    {
        return view('admin.home');
    }

    // crete user page
    public function index()
    {
        return view('admin.index');
    }

    //create new user
    public function createUser(Request $request)
    {
        //验证
        $this->Validate($request,[
            'username'=>'required|min:5|unique:users,username',
            'password'=>'required|min:6,confirmed',
//            'password_confirmation' => 'required|same:password',
            'role'=>'required',
        ]);

        //业务逻辑
        $username= $request->input('username');
        $password=bcrypt($request->input('password'));
        $role=$request->input('role');
        $user=User::create(compact('username','password','role'));

        //渲染
        return redirect('admin/userList');
    }

    //user list
    public function userList()
    {
        $users = User::paginate(7);
        return view('admin.userList',compact('users'));
    }

    //password reset page
    public function editpage(User $user)
    {

        return view('admin.passwordReset',compact('user'));
    }

    //password reset
    public function passwordReset(User $user)
    {
        //验证
        $this->Validate(request(),[
//            'username'=>'required|min:5|unique:users,username',
            'password'=>'required|min:6,confirmed',
//            'password_confirmation' => 'required|same:password',
            'role'=>'required',
        ]);

        //业务逻辑
//        $user->username = request('username');
        $user->password =bcrypt(request('password'));
        $user->role=request('role');
        $user->save();

        //渲染
        return redirect('admin/userList');
    }

    //user delete （删除）
    public function userDelete(User $user)
    {

        // TODO:用户权限认证
        $user->delete();
        return redirect('admin/userList');
    }
}
