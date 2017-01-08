<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;

use  App\Http\Model\Article;//使用Article表构建器
use  App\Http\Model\Links;//使用Links表构建器
use  App\Http\Model\Category;//使用Category表构建器
use  App\Http\Model\About;//使用About表构建器

class IndexController extends CommonController
{
    //显示首页
    public function index()
    {
        //获得最新文章,及该文章的分类信息

        $art=Article::join('Category','Category.cate_id','=','Article.cate_id')
        ->select('Article.*','Category.cate_name')->orderBy('art_time','desc')->paginate(6);

        //友情链接
        $links=Links::all();
       

    	return view('home.index',compact('art','links'));
    }

    //显示分类页
    public function cate($cate_id)
    {

        //分类浏览数自增
        Category::where('cate_id',$cate_id)->increment('cate_view',1); 

        //获得当前分类信息

        $fields=Category::find($cate_id);

        //判断是否为顶级分类
        //获得当前分类的子分类
        if($cate_child=Category::where('cate_pid',$cate_id)->get()->all()){
            //获得所有该大类下子分类的文章
            $child=[];//收集子分类的id
            foreach ($cate_child as $k => $v) {
               $child[]=$v->cate_id;
            }
            //获得所有分类文章,---？？？包括该分类标题名称？？？
            $art=Article::whereIn('cate_id',$child)->orderBy('art_time','desc')->paginate(3);
            

        }else{
            //获得该分类的所有文章，

            $art=Article::where('cate_id',$cate_id)->orderBy('art_time','desc')->paginate(3);

            
        }
            
            return view('home.list',compact('art','fields','cate_child'));
    	
    }

    //显示文章页
    public function art($art_id)
    {
        //获得该文章信息
        $data=Article::join('category','Category.cate_id','=','Article.cate_id')
        ->where('art_id',$art_id)->first();
        //文章浏览数自增
        Article::where('art_id',$art_id)->increment('art_view',1);
        //获得上一篇，下一篇
        $article['pre']=Article::where('art_id','<',$art_id)->orderBy('art_id','desc')->first();
        $article['next']=Article::where('art_id','>',$art_id)->orderBy('art_id','asc')->first();

        //获取相关文章信息
        $relate=Article::where('cate_id',$data->cate_id)->orderBy('art_time','desc')->take(6)->get();
    	return view('home.new',compact('data','article','relate'));
    }
    //显示关于我的页面
    public function about(){
        //获取个人信息
        $profile=About::first();

        return view('home.about',compact('profile'));
    }
    //显示留言板界面
    public function message(){
        //获取个人信息
        $profile=About::first();
        return view('home.message',compact('profile'));

    }
}
