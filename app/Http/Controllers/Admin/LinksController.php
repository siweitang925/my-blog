<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Http\Model\Links;//使用Links表构建器

use Illuminate\Support\Facades\Input;//加载input服务

class LinksController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //get - admin/links  //显示全部友情链接
    public function index()
    {
        //获取数据库的友情链接信息
        $links =Links::orderBy('link_order')->get();

        //将获得的数据传给前端模板
        return view('admin.links.index')->with('data',$links);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //get-  admin/links/create  //显示添加友情链接页面
    public function create()
    {
        
        return view('admin.links.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //post - admin/links   //执行添加友情链接
    public function store(Request $request)
    {
        //获得添加的数据,使用
        $data=Input::except('_token');
        $re=links::create($data);
        if($re)
        {
            return redirect('admin/links')->with('msg','友情链接添加成功！');
        }
        else{
            return redirect('admin/links/create')->with('msg','未知错误，友情链接添加失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //get - admin/links/{links}  //显示单个文章
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //get - admin/links/{links}/edit  //编辑友情链接
    public function edit($id)
    {
        //获得需要修改友情链接的信息
        $field=Links::find($id);
        return view('admin.links.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //put -  admin/links/{links}   //更新友情链接
    public function update($link_id)
    {
        //更新修改好的友情链接信息
        $input=Input::except('_token','_method');
        $re=links::where('link_id',$link_id)->update($input);
        if($re){
            return redirect('admin/links')->with('msg','修改友情链接信息成功！');
        }else{
            return redirect('admin/links/'.$link_id.'/edit')->with('msg','信息未发生变化，修改友情链接信息失败！');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //delete - admin/links/{links}   //删除友情链接
    public function destroy($id)
    {
        //删除传递过来的友情链接
        $re=Links::where('link_id',$id)->delete();
        if($re){
            $data = [
                'status'=>0,
                'msg'=>'删除成功!'
            ];
        }else{
             $data = [
                'status'=>1,
                'msg'=>'删除失败!'
            ];
        }
        return $data;
    }

    //更新友情链接排序
    public function changeOrder(){

        $input=Input::all();

        $link=Links::find($input['link_id']);
        $link->link_order=$input['link_order'];
        $re=$link->update();

        if($re)
        {
            $data=[
                'status'=>0,
                'msg'=>'更新成功'
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'更新失败'
            ];
        }
        return $data;
    }
}
