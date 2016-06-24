<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class IndexController extends CommonController
{
    public function index(){
        
        return view('admin.index');
    }
    
    /*修改密码*/
    public function changePass(Request $request)
    {
        if($request->isMethod('post')){
            $input=Input::all();
            $user=User::where('user_id',session('user.user_id'))->first();
            if($input['oldpass'] != decrypt($user->user_pass)){
                return back()->with('msg','当前密码输入错误！');
            }
            if($input['newpass1'] != $input['newpass2']){
                return back()->with('msg','两次输入密码不一样，请重新输入！');
            }
            $user->user_pass=encrypt($input['newpass1']);
            $user->update();
            return back()->with('msg','密码修改成功');
        }else{
            return view('admin.pass');
        }
    }
}
