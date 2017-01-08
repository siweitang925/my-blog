@extends('layouts.home')
@section('title')
<title>{{Config::get('web.web_title')}}--{{Config::get('web.seo_title')}}</title>
<meta name="keywords" content="{{Config::get('web.keywords')}}" />
<meta name="description" content="{{Config::get('web.description')}}" />
<link href="{{asset('/resources/views/home/css/index.css')}}" rel="stylesheet">

@endsection
@section('sidebar')
<header>
  <div id="logo"><a href="/"></a></div>
  <nav class="topnav" id="topnav">
    @foreach($navs as $v)<a href="{{$v->nav_url}}"><span>{{$v->nav_name}}</span><span class="en">{{$v->nav_alias}}</span></a>@endforeach
  </nav>
</header>
<div class="banner">
  <section class="box" id='sectionBox'>
    <ul class="texts">
      <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
      <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
      <p>加了锁的青春，不会再因谁而推开心门。</p>
    </ul>
    <div class="avatar"><a href="{{url('admin/login')}}"><span>四味糖</span></a> </div>
  </section>
</div>
<div class="template">
  
</div>
<div class='audio'>
<audio controls  >
    <source src='{{asset('/resources/views/home/sources/default.mp3')}}'>
</audio>
</div>
<article>
  <h2 class="title_tj">
    <p>最新<span>文章</span></p>
  </h2>
  <div class="bloglist left">
    @foreach($art as $a)
    <h3>{{$a->art_title}}</h3>
    <figure><img src="{{$a->art_thumb}}"></figure>
    <ul>
      <p>{{$a->art_description}}</p>
      <a title="{{$a->art_title}}" href="{{url('art/'.$a->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
    </ul>
    <p class="dateview"><span> {{date('Y-m-d',$a->art_time)}}</span><span>作者：<i>{{$a->art_editor}}</i></span><span>专栏：[<a href="{{url('cate/'.$a->cate_id)}}">{{$a->cate_name}}</a>]</span></p>
    @endforeach

 <!-- 分页 -->
  <div class="page">
    {{$art->links()}}
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
 <br /><br /><br />

    <div class="news" style="float:left;">
   
        @parent
   
    <h3 class="links">
      <p>友情<span>链接</span></p>
    </h3>
    <ul class="website">
      @foreach($links as $link)
      <li><a href="{{$link->link_url}}" title="{{$link->link_title}}" target="_blank">{{$link->link_name}}</a></li>
      @endforeach
    </ul> 
    </div>  
     
    </aside>
</article>


@endsection
