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
                <div class="col-md-12">
                    @if(!empty(session('msg')))
                        <div class="alert alert-danger">
                            {{session('msg')}}
                        </div>
                    @endif
                </div>
                <div class="box-content col-lg-5">
                    <form role="form" action="/admin/cate" method="post">
                        <div class="form-group">
                            <label for="text">父级分类</label><br/>
                            <select  data-rel="chosen" name="cate_pid" class="col-lg-3">
                                @foreach ($toptag as $sd)
                                    <option value="{{$sd->cate_id}}">{{$sd->cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text">分类名称</label>
                            <input type="text" placeholder="分类名称" name="cate_name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">分类标题</label>
                            <input type="text" name="cate_title" placeholder="分类描述"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">关键词</label>
                            <input type="text" name="cate_keyword"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">分类描述</label><br/>
                            <textarea name="cate_description" class="autogrow" cols="90" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">排序</label>
                            <input type="text" name="cate_order"   class="form-control">
                        </div>
                        {!! csrf_field() !!}
                        <button class="btn btn-default" type="submit">Submit</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
@endsection