@extends('layouts.admin')
@section('title','修改文章分类')
@section('position')
    <li><a href="{{url('admin/index')}}">首页</a></li>
    <li><a href="{{url('admin/cate')}}">文章分类</a></li>
    <li><a href="#">修改文章分类</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">

                <div data-original-title="" class="box-header well">
                    <h2><i class="glyphicon glyphicon-edit"></i> 修改文章分类</h2>
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
                    <form role="form" action="{{url('admin/cate/'.$cateinfo->cate_id)}}" method="post">
                        <input type="hidden" name="_method" value="put">
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
                            <input type="text" placeholder="分类名称" name="cate_name" class="form-control" value="{{$cateinfo->cate_name}}">
                        </div>
                        <div class="form-group">
                            <label for="text">分类标题</label>
                            <input type="text" name="cate_title" placeholder="分类描述" value="{{$cateinfo->cate_title}}"  class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">关键词</label>
                            <input type="text" name="cate_keyword"  class="form-control" value="{{$cateinfo->cate_keyword}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">分类描述</label><br/>
                            <textarea name="cate_description" class="autogrow" cols="90" rows="2">{{$cateinfo->cate_description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">排序</label>
                            <input type="text" name="cate_order" value="{{$cateinfo->cate_order}}"   class="form-control">
                        </div>
                        {!! csrf_field() !!}
                        <button class="btn btn-default"  type="submit">提交修改</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->
    </div>
@endsection
<script type="text/javascript">

</script>