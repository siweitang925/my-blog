@extends('layouts.home')
@section('title')
<title>{{$fields->cate_name}}--{{Config::get('web.web_title')}}</title>
<meta name="keywords" content="{{$fields->cate_keywords}}" />
<meta name="description" content="{{$fields->cate_description}}" />
<link href="{{asset('/resources/views/home/css/style.css')}}" rel="stylesheet">

@endsection
@section('sidebar')

</head>
<body>
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav">
    @foreach($navs as $v)<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach
  </nav>
</header>
<br/>
<article class="blogs">
<h1 class="t_nav"><span>{{$fields->cate_title}}</span><a href="{{url('/')}}" class="n1">网站首页</a><a href="{{url('cate/'.$fields->cate_id)}}" class="n2">{{$fields->cate_name}}</a></h1>
<div class="newblog left">
  @foreach($art as $a)
    <h2>{{$a->art_title}}</h2>
   <p class="dateview"><span>发布时间：{{date('Y-m-d',$a->art_time)}}</span><span>作者：<i>{{$a->art_editor}}</i></span></p>
    <figure><img src="{{$a->art_thumb}}"></figure>
    <ul class="nlist">
      <p>{{$a->art_description}}</p>
      <a title="{{$a->art_title}}" href="{{url('art/'.$a->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <div class="line"></div>
    @endforeach
   
    <div class="page">
      {!!$art->links()!!}
    </div>
</div>
<aside class="right">
   <div class="rnav">
      <ul>
        @foreach($cate_child as $k=>$cc)
       <li class="rnav{{$k+1}}"><a href="{{url('cate/'.$cc->cate_id)}}" target="_blank">{{$cc->cate_name}}</a></li>
       @endforeach
       
     </ul>      
    </div>
<div class="news">
 @parent
    </div>
    <div class="visitors">
      <h3><p>最近访客</p></h3>
      <ul>

      </ul>
    </div>
     <!-- Baidu Button BEGIN -->
    <div id="bdshare" class="bdshare_t bds_tools_32 get-codes-bdshare"><a class="bds_tsina"></a><a class="bds_qzone"></a><a class="bds_tqq"></a><a class="bds_renren"></a><span class="bds_more"></span><a class="shareCount"></a></div>
    <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
    <script type="text/javascript" id="bdshell_js"></script> 
    <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
    <!-- Baidu Button END -->   
</aside>
</article>

@endsection