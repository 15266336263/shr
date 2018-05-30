<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//后台路由
Route::get('/admin','Admin\IndexController@index');

//后台公告管理路由
Route::resource('/admin/notice','Admin\NoticeController');

Route::get('/admin/notice/up/{id}','Admin\NoticeController@up');
Route::get('/admin/notice/down/{id}','Admin\NoticeController@down');