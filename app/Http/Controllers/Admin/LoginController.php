<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class LoginController extends CommonController
{
    /*管理员登录*/
    public function login()
    {
        if($input=Input::all()){
            $user = User::where('user_name',$input['user_name'])->first();
            if(empty($user) || $user->user_name != $input['user_name'] || decrypt($user->user_pass) != $input['user_pass'] ){
                return back()->with('msg','用户名或密码错误');
            }
            session(['user'=>$user]);
            return redirect('admin/index');
        }else{
            return view('admin.login');
        }
    }

    /*退出登录*/
    public function loginOut()
    {
        session(['user'=>null]);
        return redirect('admin/login');
    }
}
