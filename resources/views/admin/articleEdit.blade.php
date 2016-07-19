@extends('layouts.admin')
@section('title','修改文章')
@section('position')
    <li><a href="{{url('admin/index')}}">首页</a></li>
    <li><a href="{{url('admin/article')}}">文章列表</a></li>
    <li><a href="#">修改文章</a></li>
@endsection
@section('jsandcss')
    <!-- 配置文件 -->
    <script type="text/javascript" src="/resources/org/UEdito/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/resources/org/UEdito/ueditor.all.js"></script>
    <script type="text/javascript" charset="utf-8" src="/resources/org/UEdito/lang/zh-cn/zh-cn.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container');
    </script>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-edit"></i> 修改文章</h2>
                    <div class="box-icon">
                        <a class="btn btn-minimize btn-round btn-default" href="#"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="col-md-12">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @if(is_object($errors))
                                @foreach($errors->all() as $error)
                                    <p>{{$error}}</p>
                                @endforeach
                            @else
                                <p>{{$errors}}</p>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="box-content col-lg-5">
                    <form role="form" action="{{url('admin/article/'.$article->art_id)}}" method="post" enctype="multipart/form-data" >
                        <div class="form-group">
                            <label for="text">所属分类</label><br/>
                            <select  data-rel="chosen" name="cate_id" class="col-lg-3">
                                @foreach($cate as $c)
                                    <option @if($article->cate_id == $c->cate_id ) selected="selected" @endif value="{{$c->cate_id}}">{{$c->_cate_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="text">文章标题</label>
                            <input type="text" placeholder="文章标题" name="art_title" value="{{$article->art_title}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">文章缩略图</label>
                            <input type="text" name="art_img" value="{{$article->art_img}}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">关键词</label>
                            <input type="text" name="art_keyword" value="{{$article->art_keyword}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">文章描述</label><br/>
                            <textarea name="art_description" class="autogrow" cols="95" rows="2">{{$article->art_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="text">作者</label>
                            <input type="text" name="art_editor" value="{{$article->art_editor}}"   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">文章内容</label>
                            <textarea name="art_content" type="text/plain" id="container" class="autogrow" >{{$article->art_content}}</textarea>
                        </div>
                        {!! csrf_field() !!}
                        <input type="hidden" name="_method" value="put">
                        <button class="btn btn-default" type="submit">修改文章</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
@endsection