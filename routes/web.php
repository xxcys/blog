<?php

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
//前台
Route::get('/', 'Index\IndexController@index');
Route::get('/list', 'Index\IndexController@list');
Route::get('/cate/{cate_id}', 'Index\IndexController@cate');
Route::get('/post/{art_id}', 'Index\IndexController@post');
//后台登录
Route::any('admin/login', 'Admin\LoginController@login');
Route::any('admin/crypt', 'Admin\LoginController@crypt');
Route::any('admin/quit', 'Admin\LoginController@quit');
//后台路由
Route::group(['prefix' => 'admin', 'middleware' => 'admin.login'], function () {
    //首页以及管理员
    Route::get('index', 'Admin\IndexController@index');
    Route::get('welcome', 'Admin\IndexController@welcome');
    Route::any('pass', 'Admin\IndexController@pass');
    //分类
    Route::resource('category', 'Admin\CategoryController');
    //文章
    Route::resource('article', 'Admin\ArticleController');
    Route::any('upload', 'Admin\CommController@upload');
    //友情链接
    Route::resource('link', 'Admin\LinkController');
});

//前台路由
Route::prefix('index')->group(function () {
    Route::get('test', 'index\TestController@index');

});