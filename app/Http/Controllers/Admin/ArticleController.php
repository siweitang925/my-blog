<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Http\Model\Category;//使用Category表构建器

use Illuminate\Support\Facades\Input;//加载input门面类

use  App\Http\Model\Article;

class ArticleController extends CommonController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //get - admin/article  //显示全部文章
    public function index()
    {
        //显示文章列表页
        $data = Article::orderBy('art_id','desc')->paginate(8);
        return view('admin.article.index',compact('data'));
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    //get-  admin/article/create  //显示添加文章页面
    public function create()
    {
        //显示添加文章页面
        $data = (new Category)->tree();
        return view('admin.article.add',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    //post admin/article  添加文章
    public function store(Request $request)
    {
        //获取提交过来的表单数据
        $input=Input::except('_token','thumb');
        $input['art_time']=time();
        if(isset($input['art_content']))
        {
            $re=Article::create($input);
            return redirect('admin/article')->with('msg','文章添加完成');
        }else{
           return back()->with('msg','文章内容不能为空！');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    //get - admin/article/{article}/edit  //编辑文章
    public function edit($id)
    {
        //获得需要修改的分类的信息
        $field=Article::find($id);
        $data=(new Category)->tree();
        return view('admin.article.edit',compact('data','field'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
      //put -  admin/article/{article}   //更新文章
    public function update($art_id)
    {

        //获得要更新文章的信息
        $input=Input::except('_token','_method','thumb');
       
        $re=Article::where('art_id',$art_id)->update($input);
        if($re){
            return redirect('admin/article')->with('msg','修改文章信息成功！');
        }else{
            return redirect('admin/article/'.$art_id.'/edit')->with('msg','信息未发生变化，修改文章信息失败！');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //delete - admin/article/{article}   //删除文章
    public function destroy($art_id)
    {
        

        //删除传递过来的文章
        $re=Article::where('art_id','=',$art_id)->delete();
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
}
