<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssessorController extends Controller
{
    // assessor home page
    public function home()
    {
        return view('assessor.home');
    }
}
