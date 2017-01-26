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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['namespace'=>'Home'],function(){
		Route::get('/','IndexController@index');
		Route::get('/cate/{cate_id}','IndexController@cate');
		Route::get('/art/{art_id}','IndexController@art');
		Route::get('/about','IndexController@about');
		Route::get('/message','IndexController@message');
});


//显示后台登录界面及验证登录信息
Route::any('admin/login', 'Admin\LoginController@login');
//移动项目时刷新密码
Route::any('admin/crypt', 'Admin\LoginController@crypt');

//显示验证码
Route::get('admin/code', 'Admin\LoginController@code');


Route::group(['middleware'=>['AdminLogin'],'prefix'=>'admin','namespace'=>'Admin'],function(){

	//显示后台首页
	Route::get('/', 'IndexController@index');

	//显示主体内容
	Route::get('info', 'IndexController@info');

	//退出登录
	Route::get('quit', 'LoginController@quit');

	//修改密码
	Route::any('pass', 'IndexController@pass');

	//文章分类
	Route::resource('category','CategoryController');

	//文章排序更新
	Route::post('category/changeorder', 'CategoryController@changeOrder');
	//检查该分类下是否还有子分类
	Route::post('category/catechild/{id}', 'CategoryController@cateChild');

	//文章管理
	Route::resource('article','ArticleController');

	//文章图片上传
	Route::any('upload', 'CommonController@upload');

	//友情链接
	Route::resource('links','LinksController');

	//友情链接排序更新
	Route::post('links/changeorder', 'LinksController@changeOrder');

	//导航栏
	Route::resource('navs','NavsController');

	//导航栏排序更新
	Route::post('navs/changeorder', 'NavsController@changeOrder');

	//配置项内容改变时-----在config资源路由前定义，否则容易被覆盖
	Route::get('config/putfile', 'ConfigController@putFile');

	//配置项
	Route::resource('config','ConfigController');

	//配置项排序更新
	Route::post('config/changeorder', 'ConfigController@changeOrder');

	//配置项内容改变时
	Route::post('config/changecontent', 'ConfigController@changeContent');

	//个人信息
	Route::any('about','AboutController@about');

	
});







