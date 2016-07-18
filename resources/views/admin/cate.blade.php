@extends('layouts.admin')
@section('title','文章分类列表')
@section('jsandcss')
    <link href='{{$adminurl}}/bower_components/layer/skin/layer.css' rel='stylesheet'>
    <script src="{{$adminurl}}/bower_components/layer/layer.js"></script>
    <script type="text/javascript">
        $(function(){
            //修改排序
            $(".cate_order").change(function () {
                var corder=$(this).val();
                var cid=$(this).attr('cid');
                $.ajax({
                    type: "POST",
                    url: '{{url('admin/changeorder')}}',
                    data: "cid="+cid+"&cateOrder="+corder+"&_token={{csrf_token()}}",
                    success: function(data){
                        if(data.status==0){
                            $("#message").addClass('alert-success alert');
                            $("#message").append(data.msg);
                        }else{
                            $("#message").addClass('alert-danger alert');
                            $("#message").append(data.msg);
                        }
                    }
                })
            })

            //删除分类
            $(".delete_but").click(function () {
                var id=$(this).attr("data-id");
                layer.confirm('确定要删除该分类？', {
                 btn: ['确定','取消']       //按钮
                 }, function(){
                    $.ajax({
                        type:"post",
                        url:"/admin/cate/delete",
                        data:"cata_id="+id+"&_token={{csrf_token()}}",
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
    <li><a href="{{url('admin/cate')}}">文章分类</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-list"></i> 文章分类列表</h2>
                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="col-md-6" style="padding: 10px">
                    <a href="{{url('admin/cate/create')}}" class="btn btn-primary btn-sm"><i class="glyphicon glyphicon-plus"></i>添加分类</a>
                    <a class="btn btn-primary btn-sm">批量删除</a>
                    <a class="btn btn-primary btn-sm">更新排序</a>
                </div>
                <div id="message"></div>
                <div class="box-content">
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th width="5%" class="text-center">分类ID</th>
                            <th width="10%" class="text-center">分类名称</th>
                            <th width="30%" class="text-center">标题</th>
                            <th width="10%" class="text-center">查看次数</th>
                            <th width="10%" class="text-center">排序</th>
                            <th class="text-center">操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $v)
                        <tr>
                            <td class="text-center" style="vertical-align: middle">{{$v->cate_id}}</td>
                            <td class="text-center" style="vertical-align: middle">{{$v->cate_name}}</td>
                            <td class="text-center" style="vertical-align: middle">{{$v->cate_title}}</td>
                            <td class="text-center" style="vertical-align: middle">{{$v->cate_view}}</td>
                            <td class="text-center" style="vertical-align: middle"><input type="text" cid="{{$v->cate_id}}}" class="cate_order" style="width: 50px;text-align: center;" value="{{$v->cate_order}}"></td>
                            <td class="text-center">
                                <a class="btn btn-success" href="#">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    查看
                                </a>
                                <a class="btn btn-info" href="{{url('admin/cate/'.$v->cate_id.'/edit')}}">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                    修改
                                </a>
                                <a class="btn btn-danger delete_but" href="javascript:void (0);" data-id="{{$v->cate_id}}">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    删除
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->
    </div><!--/row-->
@endsection