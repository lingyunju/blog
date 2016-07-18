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
        $input=Input::except("_token");
        $re=Cate::create($input);
        if($re){
            return redirect('admin/cate');
        }else{
            return back()->with('msg','添加分类失败，请稍后重试！');
        }
    }
    //GET|admin/cate/create 
    public function create()
    {
        $toptag=Cate::where("cate_pid",0)->get();
        return view('admin.addcate',compact("toptag"));
    }
    //GET|admin/cate/edit
    //编辑分类
    public function edit($cate_id)
    {
        $toptag=Cate::where("cate_pid",0)->get();
        $cateinfo=Cate::find($cate_id);
        return view('admin.editcate',compact("toptag","cateinfo"));
    }

    //更新分类信息
    public function update($cate_id){
        $input=Input::except('_token','_method');
        $re=Cate::where("cate_id",$cate_id)->update($input);
        if($re){
            return redirect('admin/cate');
        }else{
            return back()->with("msg","分类信息更新失败，请稍后重试！");
        }
    }

    //删除分类
    public  function delete(){
        $input=Input::only('cata_id');
        $re=Cate::where("cate_id",$input['cata_id'])->delete();
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
