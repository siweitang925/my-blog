<!doctype html>
<html>
<head>
<title>关于我--{{Config::get('web.seo_title')}}</title>
<meta name="keywords" content="{{$profile->about_keywords}}" />
<meta name="description" content="{{$profile->about_description}}" />
<meta charset="utf-8">
<link href="{{asset('/resources/views/home/css/base.css')}}" rel="stylesheet">
<link href="{{asset('/resources/views/home/css/new.css')}}" rel="stylesheet">
<link href="{{asset('/resources/views/home/css/about.css')}}" rel="stylesheet">
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav">
    @foreach($navs as $v)<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach
   </nav>
  </nav>
</header>
<article class="blogs">
  <h1 class="t_nav"><span>{{$profile->about_title}}</span></h1>
  <div class="index_about">
    <ul class="infos">
      {!!$profile->about_introduction!!}
    </ul>
  </div>
  <aside class="right">
    <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->
    <div class="blank"></div>
    <div class='profile'>
      <ul>
        <li><b>姓名：</b><span>唐士位</span></li>
      <li><li><li><b>籍贯：</b><span>海南/洋浦</span></li>
      <li><li><b>现居地：</b><span>{{$profile->about_location}}</span></li>
      <li><b>毕业学校：</b><span>北京理工大学</span></li>
      <ul>
    </div>
    <div class='contact'>
      <h3>联系方式：</h3><br/><pre>{{$profile->about_contact}}</pre><br/>
    </div>
    <div class='webQr'>
      <h3>网站地址二维码，欢迎扫描分享</h3><br/><img src=''></pre>
    </div>
  </aside>
</article>
<footer>
   {{Config::get('web.copyright')}} <a href="/">网站统计</a></p>
</footer>
</body>
<script src="{{asset('/resources/views/home/js/silder.js')}}"></script>
</html>

