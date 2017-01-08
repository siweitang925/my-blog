@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>&raquo;配置项列表
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
   
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置项</a>
                    <a href="{{url('admin/config')}}"><i class="fa fa-refresh"></i>更新排序</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>
    <form action="{{url('admin/config/changecontent')}}" method="post" >
        {{csrf_field()}}
        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th>内容</th>
                        <th>操作</th>
                    </tr>

                    <!-- 循环遍历分类信息 -->
                    @foreach($data as $v)
                    <tr>
                        <td class="tc">
                            <input type="text" name="ord[]" value="{{$v->conf_order}}"  onchange="changeOrder(this.value,{{$v->conf_id}})">
                        </td>
                        <td class="tc">{{$v->conf_id}}</td>
                        <td>
                            <a href="#">{{$v->conf_title}}</a>
                        </td>
                        <td>{{$v->conf_name}}</td>
                        <td>{!!$v->html!!}</td>
                        <td>
                            <a href="{{url('admin/config/'.$v->conf_id.'/edit')}}"+>修改</a>
                            <a href="javascript:(0)" onclick='delConf({{$v->conf_id}})'>删除</a>
                        </td>
                    </tr>
                    @endforeach
                    
                </table>
                <br />
                <table>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="确定">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </table>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <!-- 加载js -->
<script type="text/javascript">

function changeOrder(conf_order,conf_id)
{
    // layer.msg('更新成功', {icon: 6});
    // alert(0);
    $.post('{{url('admin/config/changeorder')}}',{'_token':'{{csrf_token()}}','conf_order':conf_order,'conf_id':conf_id},function(data){

            if(data.status==0)
            {
                layer.msg(data.msg, {icon: 6});
            }else
            {
                layer.msg(data.msg, {icon: 5});
            }
             
    });
                
}

function delConf(conf_id)
{
    
   
    layer.confirm('是否要删除该配置？', {
      btn: ['确认删除','取消'] //按钮
    }, function(){
        //确认后的操作
        $.post("{{url('admin/config')}}/"+conf_id ,{'_token':'{{csrf_token()}}','_method':'delete'},function(data){
            if(data.status==0)
            {
                location.reload();
            }else
            {
                layer.msg(data.msg, {icon: 5});
            }
        });
        // alert(conf_id);
      
    }, function(){
      // layer.msg('也可以这样', {
      //   time: 20000, //20s后自动关闭
      //   btn: ['明白了', '知道了']
      // });
    });
        


    
}


</script>


@endsection