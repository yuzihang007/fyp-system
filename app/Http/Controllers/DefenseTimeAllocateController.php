<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DefenseTimeAllocateController extends Controller
{
    public function studentIndex()
    {
        return view('timeAllocate.student');
    }

    public function teacherIndex()
    {
        return view('timeAllocate.teacher');
    }
    public function moduleOwnerIndex()
    {
        return view('timeAllocate.module_owner');
    }

    public function assessorIndex()
    {
        return view('timeAllocate.assessor');
    }

    public function setUseTime(Request $request)
    {
        try {
            $data = $request->all();

            if (empty($data['_token']))
                abort('非法请求！');

            if ($data['start_time'] == "") {
                $validatorError = ['name' => 'Start time cannot be empty'];
                $validatorError = json_encode($validatorError);
                throw new \Exception($validatorError, 4002);
            }
            if ($data['end_time'] == "") {
                $validatorError = ['name' => 'End time cannot be empty'];
                $validatorError = json_encode($validatorError);
                throw new \Exception($validatorError, 4002);
            }
            $is_false = DB::table('_log_time_allocate')->where('user_id', Auth::id())->where('start_time','<', $data['start_time'])
                ->where('end_time','>',$data['end_time'])->first();

            if ($is_false) {
                $validatorError = ['name' => 'The choice of time conflicts'];
                $validatorError = json_encode($validatorError);
                throw new \Exception($validatorError, 4002);
            }

            DB::table('_log_time_allocate')->insert(['start_time' => $data['start_time'], 'end_time' => $data['end_time'], 'user_id' => Auth::id(), 'type' => $data['type']]);

            return redirect()->back();

        }catch (\Exception $e) {
            $error = $e->getCode() == 4002 ? json_decode($e->getMessage()) : $e->getMessage();
            return redirect()->back()
                ->withErrors($error)
                ->withInput();
        }

    }
}
