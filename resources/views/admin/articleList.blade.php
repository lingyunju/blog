@extends('layouts.admin')
@section('title','文章列表')
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
    <li><a href="{{url('admin/article')}}">文章列表</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list"></i> 文章列表</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="col-md-6" style="padding: 10px">
                    <a href="{{url('admin/article/create')}}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i>添加文章</a>
                </div>
                <div id="message"></div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">文章ID</th>
                            <th width="10%" class="text-center">分类名称</th>
                            <th width="30%" class="text-center">文章标题</th>
                            <th width="10%" class="text-center">缩略图</th>
                            <th width="10%" class="text-center">查看次数</th>
                            <th width="10%" class="text-center">发布时间</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($article as $art)
                            <tr>
                                <td class="text-center" style="vertical-align: middle">{{$art->art_id}}</td>
                                <td class="text-center" style="vertical-align: middle">{{$art->cate_name}}</td>
                                <td class="text-center" style="vertical-align: middle">{{$art->art_title}}</td>
                                <td class="text-center" style="vertical-align: middle"><img src="{{$art->art_img}}" width="100px" height="30px" alt=""></td>
                                <td class="text-center" style="vertical-align: middle">{{$art->art_view}}</td>
                                <td class="text-center" style="vertical-align: middle">{!! date("Y-m-d H:i:s",$art->art_time) !!}</td>
                                <td class="text-center">
                                    <a class="btn btn-success" href="#">
                                        <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                        查看
                                    </a>
                                    <a class="btn btn-info" href="{{url('admin/article/'.$art->art_id.'/edit')}}">
                                        <i class="glyphicon glyphicon-edit icon-white"></i>
                                        修改
                                    </a>
                                    <a class="btn btn-danger delete_but" href="javascript:void (0);" data-id="{{$art->art_id}}">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                        删除
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="7">{!! $article->links() !!}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
@endsection