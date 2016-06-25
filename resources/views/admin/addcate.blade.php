@extends('layouts.admin')
@section('title','添加文章分类')
@section('position')
    <li><a href="{{url('admin/index')}}">首页</a></li>
    <li><a href="{{url('admin/cate')}}">文章分类</a></li>
    <li><a href="#">添加文章分类</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-edit"></i> 添加文章分类</h2>
                    <div class="box-icon">
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">分类名称</label>
                            <input type="text" placeholder="分类名称" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">分类描述</label>
                            <input type="text" placeholder="Password"  class="form-control">
                        </div>

                        <button class="btn btn-default" type="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
@endsection