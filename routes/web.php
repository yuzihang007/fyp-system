<?php

use App\ApplicationStudent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', function () {
    return view('login.index');
});


//Route::get('/', function () {
//
//$data = DB::table('application_student')
//    ->join('titles','application_student.title_id','=','titles.id')
//    ->join('students','students.user_id','=','application_student.user_id')
//    ->get();
//////
//dd($data);
//
//
//});


//Route::get('/', function () {
//    $user=Auth::user();
//    $applications = DB::table('application_student')
//        ->where([
//            'preferenceOrder'=>1,
//            'user_id'=>Auth::id(),
//        ])->get();
//
//    if($applications->contains('preferenceOrder','<>',1)){
//        echo 'false';
//    }else{
//        echo 'true';
//    }
//
//});

////创建管理员账户
//Route::get('/register', function () {
//    \App\User::create([
//        'username' => 'admin',
//            'password'=> bcrypt('12345678'),
//            'role' => '1'
//        ]
//    );
//});

Route::group(['middleware' => ['web']], function () {


Route::group(['middleware'=>['admin']],function(){

    Route::get('admin/home','AdminController@home' );
    //注册页面
    Route::get('admin/createUser','AdminController@index' );
    //注册行为
    Route::post('admin/createUser','AdminController@createUser');
    //用户列表
    Route::get('admin/userList','AdminController@userList');
    //Todo:password reset
    Route::get('/admin/{user}/edit','AdminController@editpage');
    Route::put('/admin/{user}','AdminController@passwordReset');
    Route::get('/admin/{user}/delete','AdminController@userDelete');
});


Route::group(['middleware'=>['supervisor','auth']],function(){

    Route::get('supervisor/home','SupervisorController@home' );
    //title 创建页面
    Route::get('/title/create','SupervisorController@index');
    //title 创建行为
    Route::post('/title/create','SupervisorController@create');
    //specified supervisor's title list 列表页面
    Route::get('/title/index','SupervisorController@list' );
    //title 编辑页面
    Route::get('/title/{title}/edit','SupervisorController@edit');
    Route::put('/title/{title}','SupervisorController@update');

    //title 删除行为
    Route::get('/title/{title}/delete','SupervisorController@delete');

    //topic application by student
    Route::get('/application/index','SupervisorController@applicationIndex');


});


Route::group(['middleware'=>['student','auth']],function(){

    //homepage
    Route::get('student/home','StudentController@home' );
    //student route
    Route::get('/student/titleIndex','StudentController@titleIndex');
    //TODO:student route
    Route::post('/student/myApplication','StudentController@application');
    //topic select
    Route::post('/title/select','StudentController@titleSelect')->name('student.title.select');


});


Route::group(['middleware'=>['assessor','auth']],function(){
    //homepage
    Route::get('assessor/home','AssessorController@home' );
});


Route::group(['middleware'=>['moduleOwner','auth']],function(){

    //homepage
    Route::get('moduleOwner/home','ModuleOwnerController@home' );

    // supervisor title list
    Route::get('/moduleOwner/vettingList','ModuleOwnerController@vettingList')->name('module.adjust.list');

    // change the vetting status of title
    Route::post('/title/{title}/status','ModuleOwnerController@vetting');
    //
    Route::get('/title/waitForVetting','ModuleOwnerController@waitForVetting')->name('module.wait.vetting');
    Route::get('/title/passForVetting','ModuleOwnerController@passForVetting')->name('module.pass.vetting');
    Route::get('/title/refuseForVetting','ModuleOwnerController@refuseForVetting')->name('module.refuse.vetting');

    Route::get('/moduleOwner/student_apply','ModuleOwnerController@applyStudentList')->name('module.student.apply');
    Route::get('/moduleOwner/wait_allocate','ModuleOwnerController@waitAllocateStudent')->name('module.student.wait_allocate');
});

    Route::any('/application/{applicationStudent}/mark','SupervisorController@markStudent');
    Route::post('/application/{applicationStudent}/status','SupervisorController@hire');









    //title 详情页面
    Route::get('title/detail/{id}','TitleController@detail');



    //profile ：学生profile详情页面  personal information page of student
    Route::get('student/profile/{id}','UserController@studentProfile');

    //




//    //profile： 学生profile修改页面 TODO:
    Route::get('student/profile/edit','UserController@studentProfileEdit');





    //profile ：教师profile详情页面
    Route::get('supervisor/profile/{id}','UserController@supervisorProfile');
    Route::get('supervisor/profile/edit','UserController@supervisorProfileEdit');
//
////profile 创建页面 TODO:
//    Route::get('/user/create','UserController@list');
////profile 创建行为 TODO:
//    Route::post('/user/create','UserController@list');
////profile 修改页面 TODO:
//    Route::post('/profile/update','UserController@profileUpdate');
////profile 修改行为 TODO:
//    Route::post('/user/update','UserController@list');












//用户模块

//登陆页面
    Route::get('/login','LoginController@index');
//登陆行为
    Route::post('/login','LoginController@login');
//登出行为
    Route::post('/logout','LoginController@logout');
//个人设置页面 TODO：
    Route::get('/user/me/setting','UserController@setting');
//个人设置操作 TODO：
    Route::post('/user/me/setting','UserController@settingStore');


});







