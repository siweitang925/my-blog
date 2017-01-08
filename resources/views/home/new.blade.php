@extends('layouts.home')
@section('title')
<title>{{$data->art_title}}--{{Config::get('web.web_title')}}</title>
<meta name="keywords" content="{{$data->art_tag}}" />
<meta name="description" content="{{$data->art_description}}" />
<link href="{{asset('/resources/views/home/css/new.css')}}" rel="stylesheet">

@endsection
@section('sidebar')
</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav">
    @foreach($navs as $v)<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach

</header>
<br/>
<article class="blogs">
  <h1 class="t_nav"><span>您当前的位置：<a href="{{url('/')}}">首页</a>&nbsp;&gt;&nbsp;<a href="{{url('cate/'.$data->cate_id)}}">{{$data->cate_name}}</a></span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('cate/'.$data->cate_id)}}" class="n2">{{$data->cate_name}}</a></h1>
  <div class="index_about">
    <h2 class="c_titile">{{$data->art_title}}</h2>
    <p class="box_c"><span class="d_time">发布时间：{{date('Y-m-d',$data->art_time)}}</span><span>编辑：<i>{{$data->art_editor}}</i></span><span>查看次数：{{$data->art_view}}</span></p>
    <ul class="infos">
    
      {!!$data->art_content!!}
     
    </ul>
    <div class="keybq">
    <p><span>关键字词: </span>{{$data->art_tag}}</p>
    
    </div>
    <div class="ad"> </div>
    <div class="nextinfo">
      @if($article['pre'])<p>上一篇：<a href="{{url('art/'.$article['pre']->art_id)}}">{{$article['pre']->art_title}}</a></p>@endif
      @if($article['next'])<p>下一篇：<a href="{{url('art/'.$article['next']->art_id)}}">{{$article['next']->art_title}}</a></p>@endif
    </div>
    <div class="otherlink">
      <h2>相关文章</h2>
      <ul>
        @foreach($relate as $r)
        <li><a href="{{url('art/'.$r->art_id)}}" title="{{$r->art_title}}">{{$r->art_title}}</a></li>
        @endforeach
      </ul>
    </div>
    <!-- 评论框 -->
    <div class='comment' style='padding-right:8px;'>
    <!-- 多说评论框 start -->
  <div class="ds-thread" data-thread-key="{{$data->art_id}}" data-title="{{$data->art_title}}" data-url="{{url('art/'.$data->art_id)}}"></div>
<!-- 多说评论框 end -->
<!-- 多说公共JS代码 start (一个网页只需插入一次) -->
<script type="text/javascript">
var duoshuoQuery = {short_name:"siweitang"};
  (function() {
    var ds = document.createElement('script');
    ds.type = 'text/javascript';ds.async = true;
    ds.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') + '//static.duoshuo.com/embed.unstable.js';
    ds.charset = 'UTF-8';
    (document.getElementsByTagName('head')[0] 
     || document.getElementsByTagName('body')[0]).appendChild(ds);
  })();
  </script>
<!-- 多说公共JS代码 end -->
</div>
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
    <div class="news">
     @parent
    </div>
    <div class="visitors">
      <h3>
        <p>最近访客</p>
      </h3>
      <ul>
      </ul>
    </div>
  </aside>
</article>

@endsection