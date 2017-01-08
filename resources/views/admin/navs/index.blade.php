@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>&raquo; 导航列表
    </div>
    <!--面包屑导航 结束-->

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
                    <a href="{{url('admin/navs/create')}}"><i class="fa fa-plus"></i>添加导航</a>
                    <a href="{{url('admin/navs')}}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>导航名称</th>
                        <th>导航别名</th>
                        <th>导航地址</th>
                        <th>操作</th>
                    </tr>

                    <!-- 循环遍历分类信息 -->
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" name="ord[]" value="{{$v->nav_order}}"  onchange="changeOrder(this.value,{{$v->nav_id}})">
                        </td>
                        <td class="tc">{{$v->nav_id}}</td>
                        <td>
                            <a href="#">{{$v->nav_name}}</a>
                        </td>
                        <td>{{$v->nav_alias}}</td>
                        <td>{{$v->nav_url}}</td>
                        <td>
                            <a href="{{url('admin/navs/'.$v->nav_id.'/edit')}}"+>修改</a>
                            <a href="javascript:(0)" onclick='delNav({{$v->nav_id}})'>删除</a>
                        </td>
                    </tr>
                    @endforeach
                   
                </table>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <!-- 加载js -->
<script type="text/javascript">

function changeOrder(nav_order,nav_id)
{
    // layer.msg('更新成功', {icon: 6});
    // alert(0);
    $.post('{{url('admin/navs/changeorder')}}',{'_token':'{{csrf_token()}}','nav_order':nav_order,'nav_id':nav_id},function(data){

            if(data.status==0)
            {
                layer.msg(data.msg, {icon: 6});
            }else
            {
                layer.msg(data.msg, {icon: 5});
            }
             
    });
                
}

function delNav(nav_id)
{
    
   
    layer.confirm('是否要删除该导航？', {
      btn: ['确认删除','取消'] //按钮
    }, function(){
        //确认后的操作
        $.post("{{url('admin/navs')}}/"+nav_id ,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
            if(data.status==0)
            {
                location.reload();
            }else
            {
                layer.msg(data.msg, {icon: 5});
            }
        });
        // alert(nav_id);
      
    }, function(){
      // layer.msg('也可以这样', {
      //   time: 20000, //20s后自动关闭
      //   btn: ['明白了', '知道了']
      // });
    });
        


    
}


</script>


@endsection