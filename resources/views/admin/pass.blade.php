@extends('layouts.admin')
@section('title','修改密码')
@section('position')
    <li><a href="{{url('admin/index')}}">首页</a></li>
    <li><a href="#">修改密码</a></li>
@endsection
@section('content')
    <div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-edit"></i> 修改用户密码</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i class="glyphicon glyphicon-chevron-up"></i></a>
                    </div>
                </div>
                <div class="box-content">
                    @if(!empty(session('msg')))
                        <div class="alert alert-danger">
                            {{session('msg')}}
                        </div>
                    @endif
                    <form role="form" action="" method="post">
                        <div class="form-group">
                            <label for="exampleInputEmail1">用户当前密码</label>
                            <input type="password" class="form-control" name="oldpass" id="exampleInputPassword1" placeholder="Old Password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">请输入新密码</label>
                            <input type="password" class="form-control" name="newpass1" id="exampleInputPassword1" placeholder="New Password" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">请确认新密码</label>
                            <input type="password" class="form-control" name="newpass2" id="exampleInputPassword1" placeholder="New Password" required>
                        </div>
                        {!! csrf_field() !!}
                        <button type="submit" class="btn btn-default">提交修改</button>
                        <button type="button" class="btn btn-default" onclick="javascript:history.go(-1);">取消返回</button>
                    </form>

                </div>
            </div>
        </div>
        <!--/span-->
@endsection