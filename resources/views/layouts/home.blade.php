<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link href="{{asset('/resources/views/home/css/base.css')}}" rel="stylesheet">
@yield('title')


<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>

@section('sidebar')
<h3>
      <p>站长<span>推荐</span></p>
    </h3>
    <ul class="rank" >
      @foreach($recommend as $r)
      <li><a href="{{url('/art/'.$r->art_id)}}" title="{{$r->art_title}}" target="_blank">{{$r->art_title}}</a></li>
      @endforeach
    </ul>
    <h3 class="ph">
      <p>点击<span>排行</span></p>
    </h3>
    <ul class="paih">
      @foreach($click as $c)
      <li><a href="{{url('/art/'.$r->art_id)}}" title="{{$c->art_title}}" target="_blank">{{$c->art_title}}</a></li>
      @endforeach
    </ul>
@show
<footer>
   {{Config::get('web.copyright')}} <a href="/">网站统计</a></p>
</footer>
</body>
<script src="{{asset('/resources/views/home/js/silder.js')}}"></script>
</html>