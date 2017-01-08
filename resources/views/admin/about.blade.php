@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>  &raquo; 个人资料添加
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
    
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/about')}}" method="post">
            <!-- 携带csrf认证 -->
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>标题：</th>
                        <td>
                            <input type="text" class="lg" name="about_title" value='{{$profile->about_title}}'>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>二维码URL</th>
                        <td>
                            <input type="text" class="lg" name="about_qr" value='{{$profile->about_qr}}'>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>其他URL：</th>
                        <td>
                            <input type="text" class="lg" name="about_url" value='{{$profile->about_url}}'>
                        </td>
                    </tr>
                     <tr>
                        <th><i class="require">*</i>联系方式：</th>
                        <td>
                            <textarea class="lg" name="about_contact">{{$profile->about_contact}}</textarea>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>现居地：</th>
                        <td>
                            <input type="text" class="lg" name="about_location" value='{{$profile->about_location}}'>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>关键字：</th>
                        <td>
                            <input type="text" class="lg" name="about_keywords" value='{{$profile->about_keywords}}'>
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="about_description">{{$profile->about_description}}</textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>左栏介绍：</th>
                        <td>
                        <!-- 百度编辑器插件开始 -->
                            <script type="text/javascript" charset="utf-8" src="{{asset('/resources/org/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('/resources/org/ueditor/ueditor.all.min.js')}}"> </script>
                                <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                                <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                             <script type="text/javascript" charset="utf-8" src="{{asset('/resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" name="about_introduction" type="text/plain" style="width:800px;height:500px;">{!!$profile->about_introduction!!}</script>
                            <!-- 样式矫正 -->
                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
                            <script type="text/javascript">

                                //实例化编辑器
                                //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
                                var ue1 = UE.getEditor('editor');
                            </script>
                        <!-- 百度编辑器插件结束 -->
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
@endsection