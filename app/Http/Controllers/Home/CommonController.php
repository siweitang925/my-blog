<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\Controller; //引入controller控制器

use Illuminate\Support\Facades\View;  //使用view门面

use  App\Http\Model\Navs;//使用Navs表构建器
use  App\Http\Model\Article;//使用Article表构建器

class CommonController extends Controller
{
    //将导航栏信息分配给所有页面
    public function __construct()
    {
    	//共享导航栏信息
    	 $navs=Navs::orderBy('nav_order')->get();

    	 //共享文章推荐

        $recommend=Article::where('art_recommend','1')->orderBy('art_time')->take(6)->get();

        //共享点击排行

        $click=Article::orderBy('art_view','desc')->take(5)->get();

   		 View::share('navs',$navs);
   		 View::share('recommend',$recommend);
   		 View::share('click',$click);
    }
   

}
