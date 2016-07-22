@extends('layouts.home')
@section('title','博客首页')
@section('content')
<div class="banner">
    <section class="box">
        <ul class="texts">
            <p>打了死结的青春，捆死一颗苍白绝望的灵魂。</p>
            <p>为自己掘一个坟墓来葬心，红尘一梦，不再追寻。</p>
            <p>加了锁的青春，不会再因谁而推开心门。</p>
        </ul>
        <div class="avatar"><a href="#"><span>后盾</span></a> </div>
    </section>
</div>
<div class="template">
    <div class="box">
        <h3>
            <p><span>热点信息</span> hotnews</p>
        </h3>
        <ul>
            @foreach($hot as $h)
            <li><a href="/news/"  target="_blank"><img src="{!! $h->art_img !!}"></a><span>{{$h->art_title}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
<article>
    <h2 class="title_tj">
        <p>文章<span>推荐</span></p>
    </h2>
    <div class="bloglist left">
        @foreach($news as $n)
        <h3>{{$n->art_title}}</h3>
        <figure><img src="{!! $n->art_img !!}"></figure>
        <ul>
            <p>{!! $n->art_description !!}...</p>
            <a  href="{{url('a/'.$n->art_id)}}" target="_blank" class="readmore">阅读全文>></a>
        </ul>
        <p class="dateview"><span>{{date('Y-m-d',$n->art_time)}}</span><span>作者：{{$n->art_editor}}</span></p>
        @endforeach
    </div>
    <aside class="right">
        <div class="news">
            <h3>
                <p>最新<span>文章</span></p>
            </h3>
            <ul class="rank">
                @foreach($news as $n)
                <li><a href="{{url('a/'.$n->art_id)}}" title="{{$n->art_title}}" target="_blank">{{$n->art_title}}</a></li>
                @endforeach
            </ul>
            <h3 class="ph">
                <p>点击<span>排行</span></p>
            </h3>
            <ul class="paih">
                @foreach($paih as $p)
                <li><a href="{{url('a/'.$p->art_id)}}" title="{{$p->art_title}}" target="_blank">{{$p->art_title}}</a></li>
                @endforeach
            </ul>
            <h3 class="links">
                <p>友情<span>链接</span></p>
            </h3>
            <ul class="website">
                @foreach($links as $l)
                <li><a href="{{$l->link_url}}" target="_blank">{{$l->link_name}}</a></li>
                @endforeach
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