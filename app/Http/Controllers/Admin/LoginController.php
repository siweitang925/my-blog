<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

require_once '/resources/org/code/Code.class.php';//引入验证码类

use Illuminate\Support\Facades\Input;//加载input服务

use Illuminate\Support\Facades\Crypt;//使用crypt加密服务

use  App\Http\Model\User;//使用user表构建器

class LoginController extends CommonController
{
    //显示登录界面及验证登录信息
    function login(){

        if($input = Input::all())//判断是否有提交信息
        {
            //验证码验证
            $code=new \Code;
             $get=$code->get();//使用get方法获得验证码

            if(strtoupper($input['code'])!=$get)//验证其输入验证是否正确
            {
                return back()->with('login_error','验证码错误');
            }
            //验证用户名和密码
          
            if($user=User::where('user_name',$input['user_name'])->first())
            {

                if(Crypt::decrypt($user->user_pass)==$input['user_pass'])
                {
                    // echo '登陆成功';
                    session(['login_yes'=>'ok']);
                    return redirect('admin');
                }
                 return back()->with('login_error','用户名或密码错误');
             }
             return back()->with('login_error','用户名或密码错误');
           

        }
        else{
            return view('admin.login');//显示登录界面
        }

    	
    }

    //调用验证码类,生成验证码
    function code(){

    	$code=new \Code;
    	$code->make();//通过make函数，生成验证码

    }
    //退出登录
    function quit()
    {
        session(['login_yes'=>null]);
        return redirect('admin/login');
    }
    //获取验证码的值
    // function getCode(){
    // 	$code=new \Code;
    // 	$get=$code->get();//使用get方法获得验证码
    // 	// echo $get;

    // }
    // function crypt()
    // {
        
    //     return Crypt::encrypt('goodmorningazm');

    // }
   


}
