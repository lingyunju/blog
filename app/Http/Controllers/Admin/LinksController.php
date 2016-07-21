<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\LinksModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Symfony\Component\DomCrawler\Link;

class LinksController extends CommonController
{
    //友情链接列表
    public function index(){
        $linklist=LinksModel::orderby('link_order','asc')->get();
        return view("admin.linkslist",compact('linklist'));
    }
}
