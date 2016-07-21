<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\ConfigModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ConfigController extends CommonController
{
    //网站配置列表
    public function index(){
        $conf=ConfigModel::orderby('conf_order','asc')->get();
        return view('admin.configList',compact('conf'));
    }

    //添加配置页面
    public function create(){
        return view('admin.configAdd');
    }

    //添加配置处理
    public function store(){
        $input=Input::except('_token');
        $rules=[
            'conf_title'=>'required',
            'conf_name'=>'required',
        ];
        $message=[
            'conf_title.required'=>'配置名称不能为空！',
            'conf_name.required'=>'配置标题不能为空！',
        ];
        $validator=Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re=ConfigModel::create($input);
            if($re){
                return redirect("admin/config");
            }else{
                return back()->with("errors","添加配置失败请稍后重试！");
            }
        }else{
            return back()->withErrors($validator);
        }
    }
}
