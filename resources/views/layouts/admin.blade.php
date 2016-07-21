<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">
    <!-- The styles -->
    <link id="bs-css" href="{{$adminurl}}/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="{{$adminurl}}/css/charisma-app.css" rel="stylesheet">
    <link href='{{$adminurl}}/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='{{$adminurl}}/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='{{$adminurl}}/bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='{{$adminurl}}/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='{{$adminurl}}/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='{{$adminurl}}/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='{{$adminurl}}/css/jquery.noty.css' rel='stylesheet'>
    <link href='{{$adminurl}}/css/noty_theme_default.css' rel='stylesheet'>
    <link href='{{$adminurl}}/css/elfinder.min.css' rel='stylesheet'>
    <link href='{{$adminurl}}/css/elfinder.theme.css' rel='stylesheet'>
    <link href='{{$adminurl}}/css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='{{$adminurl}}/css/uploadify.css' rel='stylesheet'>
    <link href='{{$adminurl}}/css/animate.min.css' rel='stylesheet'>
    <!-- jQuery -->
    <script src="{{$adminurl}}/bower_components/jquery/jquery.min.js"></script>
    <link rel="shortcut icon" href="{{$adminurl}}/img/favicon.ico">
    @section('jsandcss')
    @show
</head>

<body>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/admin"> <img alt="Charisma Logo" src="{{$adminurl}}/img/logo20.png" class="hidden-xs"/></a>
        <div class="text-center pull-left" style="font-size: 20px;color: #fff;font-weight: 900;line-height: 40px;width: 70%;">Laravel5.2框架学习实战（高级篇）</div>
        <!-- user dropdown starts -->
        <div class="btn-group pull-right">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> {{session('user.user_name')}}</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu">
                <li><a href="{{url('admin/changepass')}}">修改密码</a></li>
                <li class="divider"></li>
                <li><a href="{{url('admin/loginout')}}">退出登录</a></li>
            </ul>
        </div>
        <!-- user dropdown ends -->

        <!-- theme selector starts -->
        <div class="btn-group pull-right theme-container animated tada">
            <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> 网页风格</span>
                <span class="caret"></span>
            </button>
            <ul class="dropdown-menu" id="themes">
                <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
            </ul>
        </div>
        <!-- theme selector ends -->

    </div>
</div>
<!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>
                        <li><a class="ajax-link" href="{{url('admin/index')}}"><i class="glyphicon glyphicon-home"></i><span> 系统首页</span></a>
                        <li><a class="ajax-link" href="{{url('admin/cate')}}"><i class="glyphicon glyphicon-list"></i><span> 文章分类</span></a></li>
                        <li><a class="ajax-link" href="{{url('admin/article')}}"><i class="glyphicon glyphicon-list-alt"></i><span> 文章列表</span></a></li>
                        <li class="accordion">
                            <a href="#"><i class="glyphicon glyphicon-cog"></i><span> 系统配置</span></a>
                            <ul class="nav nav-pills nav-stacked" style="display: block;">
                                <li><a class="ajax-link" href="{{url('admin/links')}}"><i class="glyphicon glyphicon-heart"></i><span> 友情链接</span></a></li>
                                <li><a class="ajax-link" href="{{url('admin/navs')}}"><i class="glyphicon glyphicon-random"></i><span> 网站导航</span></a></li>
                                <li><a class="ajax-link" href="{{url('admin/config')}}"><i class="glyphicon glyphicon-lock"></i><span> 网站配置</span></a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
                <ul class="breadcrumb">
                    @section('position')

                    @show
                </ul>
            </div>
            @yield('content')
            <!-- content ends -->
        </div><!--/#content.col-md-0-->
    </div><!--/fluid-row-->

    <hr>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">

        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h3>Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here settings can be configured...</p>
                </div>
                <div class="modal-footer">
                    <a href="#" class="btn btn-default" data-dismiss="modal">Close</a>
                    <a href="#" class="btn btn-primary" data-dismiss="modal">Save changes</a>
                </div>
            </div>
        </div>
    </div>

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://usman.it" target="_blank">Muhammad
                Usman</a> 2012 - 2015</p>

        <p class="col-md-3 col-sm-3 col-xs-12 powered-by">Powered by: <a
                    href="http://usman.it/free-responsive-admin-template">Charisma</a></p>
    </footer>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="{{$adminurl}}/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="{{$adminurl}}/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='{{$adminurl}}/bower_components/moment/min/moment.min.js'></script>
<script src='{{$adminurl}}/bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='{{$adminurl}}/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="{{$adminurl}}/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="{{$adminurl}}/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="{{$adminurl}}/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="{{$adminurl}}/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="{{$adminurl}}/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="{{$adminurl}}/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="{{$adminurl}}/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="{{$adminurl}}/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="{{$adminurl}}/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="{{$adminurl}}/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="{{$adminurl}}/js/charisma.js"></script>

</body>
</html>
