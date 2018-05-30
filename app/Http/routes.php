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
Route::resource('/admin/links', 'Admin\LinksController');
//取消友情链接显示
Route::get('/admin/links/display/{id}','Admin\LinksController@display');
//显示友情链接
Route::get('/admin/links/blank/{id}','Admin\LinksController@blank');
//审核友情链接
Route::get('/admin/links/check/{id}','Admin\LinksController@check');

