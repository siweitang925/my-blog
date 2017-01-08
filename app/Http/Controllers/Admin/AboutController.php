<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Http\Model\About;//使用About表构建器

use Illuminate\Support\Facades\Input;//加载input服务

class AboutController extends CommonController
{
    public function about(){
        $data='';
        // dd(Input::except('_token'));
        if($input=Input::except('_token')){
            
            if($re=About::where('about_id',1)->update($input)){
                $data='修改成功！';
            }
            else{ $data='修改失败！';}
        }
        $profile=About::first();
        return view('admin/about',compact('profile'))->with('msg',$data);
    }



}
