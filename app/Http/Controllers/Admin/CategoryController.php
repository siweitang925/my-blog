<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Http\Model\Category;//使用Category表构建器

use Illuminate\Support\Facades\Input;//加载input服务

class CategoryController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //get - admin/category  //显示全部文章分类
    public function index()
    {
        //获取数据库的文章分类信息
        $category = (new Category)->tree();

        //将获得的数据传给前端模板
        return view('admin.category.index')->with('data',$category);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    //get-  admin/category/create  //显示添加文章分类页面
    public function create()
    {
        $data=Category::where('cate_pid',0)->get();
        return view('admin.category.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    //post - admin/category   //添加文章分类->填充数据，批量赋值
    public function store(Request $request)
    {
        //获得添加的数据,使用
        $data=Input::except('_token');
        $re=Category::create($data);
        if($re)
        {
            return redirect('admin/category')->with('msg','文章分类添加成功！');
        }
        else{
            return redirect('admin/category/create')->with('msg','未知错误，文章分类添加失败！');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //get - admin/category/{category}  //显示单个文章
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

    //get - admin/category/{category}/edit  //编辑文章分类
    public function edit($id)
    {
        //获得需要修改的分类的信息
        $field=Category::find($id);
        $data=Category::where('cate_pid',0)->get();
        return view('admin.category.edit',compact('data','field'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //put -  admin/category/{category}   //更新文章分类
    public function update($cate_id)
    {
        //更新修改好的分类信息
        $input=Input::except('_token','_method');
        $re=Category::where('cate_id',$cate_id)->update($input);
        if($re){
            return redirect('admin/category')->with('msg','修改分类信息成功！');
        }else{
            return redirect('admin/category/'.$cate_id.'/edit')->with('msg','信息未发生变化，修改分类信息失败！');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //delete - admin/category/{category}   //删除文章分类
    public function destroy($id)
    {
        //删除传递过来的分类
        $re=Category::where('cate_id',$id)->delete();
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
    //检查该分类下是否还有子分类。
    public function cateChild($id)
    {
        $re=Category::where('cate_pid',$id)->first();
        return $re;

    }

    //更新分类排序
    public function changeOrder(){

        $input=Input::all();

        $cate=Category::find($input['cate_id']);
        $cate->cate_order=$input['cate_order'];
        $re=$cate->update();

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
