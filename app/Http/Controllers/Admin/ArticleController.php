<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Article;
use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class ArticleController extends CommonController
{
    //文章列表
    public function index(){
        $article=Article::leftJoin('cate','article.cate_id','=','cate.cate_id')->orderby("article.art_id","desc")->paginate(10);
        return view('admin.articleList',compact('article'));
    }

    //添加文章页面
    public function create(){
        $cates=Cate::orderby('cate_order','asc')->get();
        $cate=(new CateController)->getCateTree($cates);
        return view('admin.articleAdd',compact('cate'));
    }
    //添加文章数据处理
    public function store(){
        $input=Input::except("_token");
        //如果描述为空，截取100个字。
        if(empty($input['art_description'])){
            $input['art_description']=substr($input['art_content'],0,100);
        }
        //上传缩略图
        if(!empty($_FILES['art_img']['tmp_name'])){
            $imgname=time().rand(1000,9999);
            if(!file_exists("upload/".date("Ymd",time()))){
                mkdir("upload/".date("Ymd",time()));
            }
            move_uploaded_file($_FILES["art_img"]["tmp_name"],"upload/".date("Ymd",time())."/".$imgname.".jpg");
            $input['art_img']="/upload/".date("Ymd",time())."/".$imgname.".jpg";
        }
        $input['art_time']=time();

        $rules=[
            'art_title'=>'required',
            'art_content'=>'required',
        ];
        $message=[
            'art_title.required'=>'文章名称不能为空！',
            'art_content.required'=>'文章内容不能为空！',
        ];

        $validator=Validator::make($input,$rules,$message);
        if($validator->passes()){
            $re=Article::create($input);
            if($re){
                return redirect("admin/article");
            }else{
                //添加文章失败，删除上传的缩略图
                unlink("upload/".date("Ymd",time())."/".$imgname.".jpg");
                return back()->with("errors","添加文章失败请稍后重试！");
            }
        }else{
            return back()->withErrors($validator);
        }

    }

    //修改文章
    public function edit($cate_id)
    {
        $cates=Cate::orderby('cate_order','asc')->get();
        $cate=(new CateController)->getCateTree($cates);
        $article=Article::find($cate_id);
        return view('admin.articleEdit',compact("cate","article"));
    }

    //修改文章处理
    public function update($id){
        $input=Input::except('_token','_method');
        $input['art_time']=time();
        $re=Article::where('art_id',$id)->update($input);
        if($re){
            return redirect("admin/article");
        }else{
            return back()->with("errors","修改文章失败请稍后重试！");
        }
    }
    //删除文章
    public function delete(){
        $input=Input::only('art_id');
        $re=Article::where("art_id",$input['art_id'])->delete();
        if($re){
            $data=[
                'status'=>0,
                'msg'=>'删除分类成功！',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'删除分类失败，请稍后再试！',
            ];
        }
        return $data;
    }

}
