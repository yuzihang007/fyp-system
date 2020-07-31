<?php

use Illuminate\Support\Facades\Route;

// 欢迎回家
Route::get('/topic/students', 'HomeController@index')->name('home');
Route::get('/topic/teacher', 'HomeController@index')->name('home');