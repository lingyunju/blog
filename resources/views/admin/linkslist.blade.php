@extends('layouts.admin')
@section('title','友情链接列表')
@section('jsandcss')
    <link href='{{$adminurl}}/bower_components/layer/skin/layer.css' rel='stylesheet'>
    <script src="{{$adminurl}}/bower_components/layer/layer.js"></script>
    <script type="text/javascript">
        $(function () {
            //删除文章
            $(".delete_but").click(function () {
                var id=$(this).attr("data-id");
                layer.confirm('确定要删除该分类？', {
                    btn: ['确定','取消']       //按钮
                }, function(){
                    $.ajax({
                        type:"post",
                        url:"/admin/article/delete",
                        data:"art_id="+id+"&_token={{csrf_token()}}",
                        success:function(data) {
                            layer.msg(data.msg,function(){
                                location.reload();
                            });
                        }
                    })
                }, function(){

                });
            })
        })
    </script>
@endsection
@section('position')
    <li><a href="{{url('admin/index')}}">首页</a></li>
    <li><a href="{{url('admin/links')}}">友情链接列表</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list"></i> 友情链接列表</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="col-md-6" style="padding: 10px">
                    <a href="{{url('admin/article/create')}}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i>添加友情链接</a>
                </div>
                <div id="message"></div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">链接ID</th>
                            <th width="10%" class="text-center">链接名称</th>
                            <th width="10%" class="text-center">链接URL</th>
                            <th width="30%" class="text-center">链接描述</th>
                            <th width="10%" class="text-center">排序</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($linklist as $link)
                            <tr>
                                <td class="text-center" style="vertical-align: middle">{{$link->link_id}}</td>
                                <td class="text-center" style="vertical-align: middle">{{$link->link_name}}</td>
                                <td class="text-center" style="vertical-align: middle">{{$link->link_url}}</td>
                                <td class="text-center" style="vertical-align: middle">{{$link->link_title}}</td>
                                <td class="text-center" style="vertical-align: middle">{{$link->link_order}}</td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="#">
                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                        查看
                                    </a>
                                    <a class="btn btn-info" href="">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                        修改
                                    </a>
                                    <a class="btn btn-danger delete_but" href="javascript:void (0);">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                        删除
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
@endsection