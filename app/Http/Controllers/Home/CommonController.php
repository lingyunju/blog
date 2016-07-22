<?php

namespace App\Http\Controllers\Home;

use App\Http\Model\NavsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class CommonController extends Controller
{
    public function __construct(){
        $navs=NavsModel::orderby('nav_id','asc')->get();
        View::share('navs',$navs);
    }
}
