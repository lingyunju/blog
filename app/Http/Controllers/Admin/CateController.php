<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;

class CateController extends CommonController
{
    /*GET | admin/cate 
    *　全部分类列表
     *  *　 */
    public function index()
    {
        $cates=Cate::all();
        $catelist=$this->getCateTree($cates);
        return view('admin.cate')->with('data',$catelist);
    }

    public function getCateTree($data)
    {
        foreach ($data as $k=>$v){
            if($v->cate_pid ==0){
                $data[$k]['_cate_name']=$data[$k]['cate_name'];
                $list[]=$data[$k];
                foreach ($data as $i =>$j){
                    if($j->cate_pid == $v->cate_id){
                        $data[$i]['_cate_name']="|—".$data[$i]['cate_name'];
                        $list[]=$data[$i];
                    }
                }
            }
        }
        return $list;
    }
    //POST | admin/cate    
    public function store()
    {
        
    }
    //GET|admin/cate/create 
    public function create()
    {
    
    }
    
    
}
