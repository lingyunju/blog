@extends('layouts.admin')
@section('title','添加配置')
@section('position')
    <li><a href="{{url('admin/index')}}">首页</a></li>
    <li><a href="{{url('admin/article')}}">配置列表</a></li>
    <li><a href="#">添加配置</a></li>
@endsection
@section('jsandcss')

@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-edit"></i> 添加配置</h2>
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
                    <form role="form" action="/admin/config" method="post" >
                        <div class="form-group">
                            <label for="text">配置标题</label>
                            <input type="text" placeholder="配置标题" name="conf_title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">配置字段</label>
                            <input type="text" name="conf_name"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">类型</label><br/>
                            <input type="radio" class="radio-inline" name="conf_type" value="input"> input
                            <input type="radio" class="radio-inline" name="conf_type" value="textear"> textear
                            <input type="radio" class="radio-inline" name="conf_type" value="radio"> radio
                        </div>
                        <div class="form-group">
                            <label for="text">类型值</label><br/>
                            <input type="text" name="feld_value"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">排序</label>
                            <input type="text" name="conf_order"   class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="text">说明</label><br/>
                            <input type="text" name="conf_tips"  class="form-control">
                        </div>
                        {!! csrf_field() !!}
                        <button class="btn btn-default" type="submit">添加配置</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
@endsection