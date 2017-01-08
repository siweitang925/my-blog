@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a>  &raquo; 添加文章
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
                <a href="{{url('admin/article')}}"><i class="fa fa-fw fa-list-ul"></i>文章列表</a>

            
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/article')}}" method="post">
            <!-- 携带csrf认证 -->
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                    <tr>
                        <th width="120"><i class="require">*</i>文章分类：</th>
                        <td>
                            <select name="cate_id">
                                @foreach($data as $v)
                                <option value="{{$v->cate_id}}">{{$v->deep_cate_name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>文章标题：</th>
                        <td>
                            <input type="text" class="lg" name="art_title" required>
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>编辑者：</th>
                        <td>
                            <input type="text" class="sm" name="art_editor">
                        </td>
                    </tr>
                    <tr>
                        <th>缩略图：</th>
                        <td>
                            <input type="text" size='50' name="thumb">
                            <input type="hidden" size='50' name="art_thumb" value="">
                            <input id="file_upload" name="file_upload" type="file" multiple="true">
<script src="{{asset('/resources/org/upload/jquery.uploadify.min.js')}}" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="{{asset('/resources/org/upload/uploadify.css')}}">
<script type="text/javascript">
        <?php $timestamp = time();?>
        $(function() {
            $('#file_upload').uploadify({
                'buttonText':'选择图片',

                'formData'     : {
                     'timestamp' : '<?php echo $timestamp;?>',
                    '_token'     : "{{csrf_token()}}"
                },
                'swf'      : "{{asset('/resources/org/upload/uploadify.swf')}}",
                'uploader' : "{{url('admin/upload')}}",
                'onUploadSuccess' : function(file, data, response) {
            $('input[name=thumb]').val(file.name);
            $('input[name=art_thumb]').val(data);
            $('#thumb_img').attr('src',data);
            console.log(data);
        }
            });
        });
    </script>
<style>
.uploadify{display:inline-block;}
.uploadify-button{border:none; border-radius:5px; margin-top:8px;}
table.add_tab tr td span.uploadify-button-text{color: #FFF; margin:0;}
</style>
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td>
                            <img id="thumb_img" src="" style="max-width:100px;max-height:100px;"></img>
                        </td>
                    </tr>
                     <tr>
                        <th>文章标签：</th>
                        <td>
                            <textarea  name="art_tag" ></textarea>
                        </td>
                    </tr>
                    <tr>
                        <th>描述：</th>
                        <td>
                            <textarea name="art_description"></textarea>
                        </td>
                    </tr>

                    <tr>
                        <th>文章内容：</th>
                        <td>
                        <!-- 百度编辑器插件开始 -->
                            <script type="text/javascript" charset="utf-8" src="{{asset('/resources/org/ueditor/ueditor.config.js')}}"></script>
                            <script type="text/javascript" charset="utf-8" src="{{asset('/resources/org/ueditor/ueditor.all.min.js')}}"> </script>
                                <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                                <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                             <script type="text/javascript" charset="utf-8" src="{{asset('/resources/org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                            <script id="editor" name="art_content" type="text/plain" style="width:800px;height:500px;"></script>
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
                                var ue = UE.getEditor('editor');
                            </script>
                        <!-- 百度编辑器插件结束 -->
                        </td>
                    </tr>
                    <tr>
                        <th>设为站长推荐？</th>
                        <td>
                            <input type="radio" name='art_recommend' value='1'>是&nbsp;&nbsp;&nbsp;
                            <input type="radio" name='art_recommend' value='0'>否
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