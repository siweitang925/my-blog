@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>  &raquo; 添加导航
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            @if(session('msg'))
            <div class="mark">
                <p>{{session('msg')}}</p>
            </div>
        @endif
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{url('admin/navs')}}"><i class="fa fa-fw fa-list-ul"></i>导航列表</a>

            
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/navs')}}" method="post" submit="return checkUrl()">
            <!-- 携带csrf认证 -->
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                   
                    <tr>
                        <th><i class="require">*</i>导航名称：</th>
                        <td>
                            <input type="text" name="nav_name" required>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>导航别名：</th>
                        <td>
                            <input type="text" class="lg" name="nav_alias">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require" >*</i>导航URL：</th>
                        <td>
                            <input type="text" class="lg" name="nav_url" onblur="changeUrl()" value="http://"><span id='url' style="color:red;"></span>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>排序：</th>
                        <td>
                            <input type="text" class="sm" name="nav_order">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

<script style="text/javascript">
function changeUrl(){

        var url=$('input[name=nav_url]').val();
        var s1 = url.lastIndexOf(':');
        var s2 = url.indexOf('.');
  
        if((s2==-1||s1!=4)&& url!=''){
              
                $('#url')[0].innerHTML='url填写错误！';
                return false;
        }else{
            $('#url')[0].innerHTML='';
            return true;
        }

}
function checkUrl()
{
    if(changeUrl()==false){
        return false;
    }
    return true;
}
</script>
@endsection