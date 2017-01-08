<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;//加载input门面类

use Illuminate\Support\Facades\Crypt;//使用crypt加密服务

use  App\Http\Model\User;//使用user表构建器

class IndexController extends CommonController
{
    //显示后台首页
    function index(){

    	return view('admin/index');
    }
    //显示后台首页主体内容
    function info(){

    	return view('admin/info');
    }
    //修改管理员密码
    function pass()
    {
    	if($input = Input::all())
    	{
    		$user=User::first();
    		if(Crypt::decrypt($user->user_pass)==$input['password_o'])
    		{
    			$user->user_pass=Crypt::encrypt($input['password']);
    			$user->update();
    			return redirect('admin/info')->with('msg','修改密码成功！');
    		}
    		return back()->with('msg','原密码错误！');
    	}
    	else{
			return view('admin/pass');
    	}
    }

}
