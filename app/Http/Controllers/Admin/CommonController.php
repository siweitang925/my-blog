<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Input;//使用Input服务

use App\Http\Controllers\Controller; 
class CommonController extends Controller
{
    //图片上传处理
    public function upload()
    {
    	$file=Input::file('Filedata');
    	if($file->isValid()){//判断文件是否有效
    	//获得原始文件名称
    	$originalName=$file->getClientOriginalName();
    	//获得文件后缀
    	$entension=$file->getClientOriginalExtension();
    	$newName=date('YmdHis').mt_rand(0,1000).'.'.$entension;
    	//重命名保存文件
    	$path=$file->move(base_path().'/uploads',$newName);
    	return '/uploads/'.$newName;
    	}

    }
}
