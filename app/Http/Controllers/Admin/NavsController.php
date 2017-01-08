<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Http\Model\Navs;//使用Navs表构建器

use Illuminate\Support\Facades\Input;//加载input服务

class NavsController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     //get - admin/navs  //显示全部导航
    public function index()
    {
        //获取数据库的导航信息
        $navs =Navs::orderBy('nav_order')->get();

        //将获得的数据传给前端模板
        return view('admin.navs.index')->with('data',$navs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //get-  admin/navs/create  //显示添加导航页面
    public function create()
    {
        
        return view('admin.navs.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //post - admin/navs   //执行添加导航
    public function store(Request $request)
    {
        //获得添加的数据,使用
        $data=Input::except('_token');
        $re=navs::create($data);
        if($re)
        {
            return redirect('admin/navs')->with('msg','导航添加成功！');
        }
        else{
            return redirect('admin/navs/create')->with('msg','未知错误，导航添加失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //get - admin/navs/{navs}  //显示单个文章
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

    //get - admin/navs/{navs}/edit  //编辑导航
    public function edit($id)
    {
        //获得需要修改导航的信息
        $field=Navs::find($id);
        return view('admin.navs.edit',compact('field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //put -  admin/navs/{navs}   //更新导航
    public function update($nav_id)
    {
        //更新修改好的导航信息
        $input=Input::except('_token','_method');
        $re=navs::where('nav_id',$nav_id)->update($input);
        if($re){
            return redirect('admin/navs')->with('msg','修改导航信息成功！');
        }else{
            return redirect('admin/navs/'.$nav_id.'/edit')->with('msg','信息未发生变化，修改导航信息失败！');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //delete - admin/navs/{navs}   //删除导航
    public function destroy($id)
    {
        //删除传递过来的导航
        $re=Navs::where('nav_id',$id)->delete();
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

    //更新导航排序
    public function changeOrder(){

        $input=Input::all();

        $nav=Navs::find($input['nav_id']);
        $nav->nav_order=$input['nav_order'];
        $re=$nav->update();

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
