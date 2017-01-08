@extends('layouts/admin')
@section('content')
<script style="text/javascript">

    $(function(){
        $('[name=password]').blur(password);
        $('[name=password_c]').blur(password_c);

    })
    //验证新密码长度
    function password()
    {

        if($('[name=password]').val().length>20||$('[name=password]').val().length<6)
        {
            $('[name=password]')[0].nextSibling.nextSibling.innerHTML='请输入6-20位数的密码!';
            $('[name=password]')[0].nextSibling.nextSibling.style.color='red';
            return false;
  
        }
        else
        {
           $('[name=password]')[0].nextSibling.nextSibling.style.color='green'; 
           $('[name=password]')[0].nextSibling.nextSibling.innerHTML='ok!';
           return true;
       }
    
    }
    function password_c()
    {
        if($('[name=password_c]').val()!=$('[name=password]').val())
        {
            $('[name=password_c]')[0].nextSibling.nextSibling.innerHTML='两次密码不匹配!';
         
            $('[name=password_c]')[0].nextSibling.nextSibling.style.color='red';
            return false;
        }
        else if($('[name=password_c]').val()=='')
        {
            $('[name=password_c]')[0].nextSibling.nextSibling.innerHTML='该项不能为空!';
         
            $('[name=password_c]')[0].nextSibling.nextSibling.style.color='red';
            return false;
        }
        else{
             $('[name=password_c]')[0].nextSibling.nextSibling.style.color='green';
             $('[name=password_c]')[0].nextSibling.nextSibling.innerHTML='ok!';
             return true;
         }


    }

    function changePass()
    {
        if(password_c()==false)
        {
            return false;       
         }
        if(password()==false)
        {
            return false;
        }
        
        return true;

    }
</script>
    <!--面包屑导航 开始-->
<div class="crumb_warp">
    <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
    <i class="fa fa-home"></i> <a href="{{url('admin/info')}}">首页</a> &raquo; 修改密码
</div>
<!--面包屑导航 结束-->

<!--结果集标题与导航组件 开始-->
<div class="result_wrap">
    <div class="result_title">
        <h3>修改密码</h3>
        @if(session('msg'))
            <div class="mark">
                <p>{{session('msg')}}</p>
            </div>
        @endif
    </div>
    
</div>
<!--结果集标题与导航组件 结束-->

<div class="result_wrap">
    <form method="post" onsubmit="return changePass()" action="{{url('admin/pass')}}">
        {{csrf_field()}}
        <table class="add_tab">
            <tbody>
            <tr>
                <th width="120"><i class="require" >*</i>原密码：</th>
                <td>
                    <input type="password" name="password_o" required> <span>请输入原始密码</span>
                </td>
            </tr>
            <tr>
                <th><i class="require"  >*</i>新密码：</th>
                <td>
                    <input type="password" name="password" required> <span>新密码6-20位</span>
                </td>
            </tr>
            <tr>
                <th><i class="require" >*</i>确认密码：</th>
                <td>
                    <input type="password" name="password_c" required> <span>再次输入密码</span>
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