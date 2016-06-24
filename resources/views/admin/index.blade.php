@extends('layouts.admin')
@section('title', '管理系统首页')
@section('position')
    <li><a href="">首页</a></li>
@endsection
@section('content')
    {{--快捷操作--}}
    <div class=" row">
        <div class="col-md-3 col-sm-3 col-xs-6">
            <a data-toggle="tooltip" title="6 new members." class="well top-block" href="#">
                <i class="glyphicon glyphicon-plus blue"></i>
                <div>新增文章</div>
                <div>507</div>
            </a>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6">
            <a data-toggle="tooltip" title="4 new pro members." class="well top-block" href="#">
                <i class="glyphicon glyphicon-star green"></i>

                <div>Pro Members</div>
                <div>228</div>
                <span class="notification green">4</span>
            </a>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6">
            <a data-toggle="tooltip" title="$34 new sales." class="well top-block" href="#">
                <i class="glyphicon glyphicon-shopping-cart yellow"></i>

                <div>Sales</div>
                <div>$13320</div>
                <span class="notification yellow">$34</span>
            </a>
        </div>

        <div class="col-md-3 col-sm-3 col-xs-6">
            <a data-toggle="tooltip" title="12 new messages." class="well top-block" href="#">
                <i class="glyphicon glyphicon-envelope red"></i>

                <div>Messages</div>
                <div>25</div>
                <span class="notification red">12</span>
            </a>
        </div>
    </div>
    {{--系统配置--}}
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-cog"></i> 系统配置信息</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <div class="row">
                        <div class="col-md-2 text-center"><h6>操作系统</h6></div>
                        <div class="col-md-10"><h6>{{PHP_OS}}</h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-center"><h6>运行环境</h6></div>
                        <div class="col-md-10"><h6>{{$_SERVER['SERVER_SOFTWARE']}}</h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-center"><h6>系统版本</h6></div>
                        <div class="col-md-10"><h6>1.0</h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-center"><h6>北京时间</h6></div>
                        <div class="col-md-10"><h6><?php echo date("Y年m月d日 H:i:s",time());  ?></h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-center"><h6>服务器域名/IP</h6></div>
                        <div class="col-md-10"><h6>{{$_SERVER['HTTP_HOST']}} [{{$_SERVER['SERVER_ADDR']}}]</h6></div>
                    </div>
                    <div class="row">
                        <div class="col-md-2 text-center"><h6>当前使用浏览器</h6></div>
                        <div class="col-md-10"><h6>{{$_SERVER['HTTP_USER_AGENT']}}</h6></div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection