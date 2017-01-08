@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>  &raquo; 修改配置项

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
                <a href="{{url('admin/config')}}"><i class="fa fa-fw fa-list-ul"></i>配置项列表</a>
                <a href="{{url('admin/config/create')}}"><i class="fa fa-plus"></i>添加配置项</a>  
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/config/'.$field->conf_id)}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            <!-- 携带csrf认证 -->
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                   
                    <tr>
                        <th><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" name="conf_title" required value="{{$field->conf_title}}">
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>名称：</th>
                        <td>
                            <input type="text" class="lg" name="conf_name" value="{{$field->conf_name}}">
                        </td>
                    </tr>
                    <tr>
                        <th>类型：</th>
                        <td>
                            <input type="radio"  name="field_type" value='input' @if($field->field_type=='input') checked @endif onclick="showValue()">input&nbsp;&nbsp;
                            <input type="radio"  name="field_type" value='textarea'  @if($field->field_type=='textarea') checked @endif onclick="showValue()">textarea&nbsp;&nbsp;
                            <input type="radio"  name="field_type" value='radio'  @if($field->field_type=='radio') checked @endif onclick="showValue()">radio
                        </td>
                    </tr>
                    <tr class="fv" >
                        <th>类型值：</th>
                        <td>
                            <input type="text" class="lg" name="field_value" value="{{$field->field_value}}">
                             <p><i class="fa fa-exclamation-circle yellow"></i>不同选项之间用英文逗号隔开 示例：0|关闭,1|打开</p>
                        </td>
                    </tr>
                    <tr>
                        <th>排序：</th>
                        <td>
                            <input type="text" class="sm" name="conf_order" value="{{$field->conf_order}}">
                        </td>
                    </tr>
                    <tr>
                        <th>说明：</th>
                        <td>
                            <textarea type="text" class="sm" name="conf_tips" >{{$field->conf_tips}}</textarea>
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

showValue();
//选择不同类型时,显示或者隐藏类型值
function showValue(){

      var v=$('[name=field_type]:checked').val();
      if(v=='radio'){
        $('.fv').show();
      }else{
        $('.fv').hide();
      }

}
</script>
@endsection