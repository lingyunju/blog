<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;

class LoginController extends CommonController
{
    public function login()
    {
        if($input=Input::all()){
            $user=User::first();
            if($user->user_name != $input['user_name'] || decrypt($user->user_pass) != $input['user_pass'] ){
                return back()->with('msg','用户名或密码错误');
            }
        }else{
            return view('admin.login');
        }
    }


}
