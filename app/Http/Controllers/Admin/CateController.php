<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\Cate;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class CateController extends CommonController
{
    /*GET | admin/cate 
    *　全部分类列表
     *  *　 */
    public function index()
    {
        $cates=Cate::orderby('cate_order','asc')->get();
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
        return view('admin.addcate');
    }
    
    /*ajax修改分类排序*/
    public function changeOrder()
    {
        $input=Input::all();
        $cate=Cate::find($input['cid']);
        $cate->cate_order=$input['cateOrder'];
        $res=$cate->update();
        if($res){
            $data=[
                'status'=>0,
                'msg'=>'分类排序更新成功！',
            ];
        }else{
            $data=[
                'status'=>1,
                'msg'=>'分类排序更新失败，请重新尝试！',
            ];
        }
        return $data;
    }
    
}
