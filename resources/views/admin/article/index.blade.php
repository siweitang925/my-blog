@extends('layouts.admin')
@section('content')
<body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 文章列表
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        <form action="" method="post">
            <table class="search_tab">
                <tr>
                    <th width="120">选择分类:</th>
                    <td>
                        <select onchange="javascript:location.href=this.value;">
                            <option value="">全部</option>
                            <option value="http://www.baidu.com">百度</option>
                            <option value="http://www.sina.com">新浪</option>
                        </select>
                    </td>
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" placeholder="关键字"></td>
                    <td><input type="submit" name="sub" value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <div class="result_title">
            @if(session('msg'))
            <div class="mark">
                <p>{{session('msg')}}</p>
            </div>
        @endif
        </div>
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/article/create')}}"><i class="fa fa-plus"></i>新增文章</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">

            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>点击量</th>
                        <th>推荐？</th>
                        <th>更新时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value=""></td>
                        <td class="tc">{{$v->art_id}}</td>
                        <td>
                            <a href="#">{{$v->art_title}}</a>
                        </td>
                        <td>{{$v->art_view}}</td>
                        <td>{{$v->art_recommend?'是':'否'}}</td>
                        <td>{{date('Y-m-d/ H时',$v->art_time)}}</td>
                        <td>
                            <a href="{{url('admin/article').'/'.$v->art_id.'/edit'}}">修改</a>
                            <a href="javascript:(0);" onclick='delArt({{$v->art_id}})'>删除</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>



                <div class="page_list">
                    {!!$data->links()!!}
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->
<style>
    .result_content ul li span {
    font-size: 15px;
    padding: 6px 12px;
}
</style>

<script type="text/javascript">

function delArt(art_id)
{
  
    layer.confirm('是否要删除该文章？', {
      btn: ['确认删除','取消'] //按钮
    }, function(){
        //确认后的操作
        $.post("{{url('admin/article')}}/"+art_id ,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
            if(data.status==0)
            {
                location.reload();
            }else
            {
               console.log(data);
                layer.msg(data.msg, {icon: 5});
            }
        });
        // alert(cate_id);
      
    }, function(){
      // layer.msg('也可以这样', {
      //   time: 20000, //20s后自动关闭
      //   btn: ['明白了', '知道了']
      // });
    });
        

}


</script>
@endsection