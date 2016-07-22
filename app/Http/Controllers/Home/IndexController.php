<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\Article;
use App\Http\Model\Cate;
use App\Http\Model\LinksModel;

class IndexController extends CommonController
{
    public function index(){
        //热门文章
        $hot=Article::where('art_img','<>','')->orderby('art_view','desc')->take('6')->get();
        //最新文章
        $news=Article::orderby('art_id','desc')->take('6')->get();
        //点击排行
        $paih=Article::orderby('art_view','desc')->take(5)->get();
        //友情链接
        $links=LinksModel::orderby('link_order','asc')->get();

        return view('home.index',compact('hot','news','paih','links'));
    }

    public function newslist(){
        $news=Article::orderby('art_time','desc')->paginate('5');
        return view('home.newslist',compact('news'));
    }

    public function cate($cate_id){
        $fild=Cate::find($cate_id);
        $news=Article::where('cate_id',$cate_id)->orderby('art_time','desc')->paginate('5');
        return view('home.newslist',compact('news'));
    }
}
