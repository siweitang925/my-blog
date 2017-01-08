@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>&raquo; 分类列表
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
    @if(session('msg'))
    <div class="result_wrap">
        <div class="result_title">
            
            <div class="mark">
                <p>{{session('msg')}}</p>
            </div>
        
        </div>
    </div>
    @endif
    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/category/create')}}"><i class="fa fa-plus"></i>添加分类</a>
                    <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                    <a href="{{url('admin/category')}}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%"><input type="checkbox" name=""></th>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>文章分类</th>
                        <th>标题</th>
                        <th>浏览量</th>                   
                        <th>操作</th>
                    </tr>

                    <!-- 循环遍历分类信息 -->
                    @foreach($data as $v)
                    <tr>
                        <td class="tc"><input type="checkbox" name="id[]" value="59"></td>
                        <td class="tc">
                            <input type="text" name="ord[]" value="{{$v->cate_order}}"  onchange="changeOrder(this.value,{{$v->cate_id}})">
                        </td>
                        <td class="tc">{{$v->cate_id}}</td>
                        <td>
                            <a href="#">{{$v->deep_cate_name}}</a>
                        </td>
                        <td>{{$v->cate_title}}</td>
                        <td>{{$v->cate_view}}</td>
                        <td>
                            <a href="{{url('admin/category/'.$v->cate_id.'/edit')}}"+>修改</a>
                            <a href="javascript:(0)" onclick='delCate({{$v->cate_id}})'>删除</a>
                        </td>
                    </tr>
                    @endforeach
                   
                </table>

                <div class="page_list">
                    <ul>
                        <li class="disabled"><a href="#">&laquo;</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <!-- 加载js -->
<script type="text/javascript">

function changeOrder(cate_order,cate_id)
{
    // layer.msg('更新成功', {icon: 6});
    // alert(0);
    $.post('{{url('admin/category/changeorder')}}',{'_token':'{{csrf_token()}}','cate_order':cate_order,'cate_id':cate_id},function(data){

            if(data.status==0)
            {
                layer.msg(data.msg, {icon: 6});
            }else
            {
                layer.msg(data.msg, {icon: 5});
            }
             
    });
                
}

function delCate(cate_id)
{
    $.post("{{url('admin/category/catechild')}}/"+cate_id,{'_token':'{{csrf_token()}}'},function(data){

        if(!data){
            layer.confirm('是否要删除该分类信息？', {
      btn: ['确认删除','取消'] //按钮
    }, function(){
        //确认后的操作
        $.post("{{url('admin/category')}}/"+cate_id ,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
            if(data.status==0)
            {
                location.reload();
            }else
            {
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
        }else{
            layer.msg('该分类属于父分类，不可删除！', function(){
            //关闭后的操作
            });
        }


    });
    
}


</script>


@endsection