<?php

namespace App\Http\Controllers\Admin;

use App\Http\Model\NavsModel;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NavsController extends Controller
{
    public function index(){
        $nav=NavsModel::orderby('nav_order','asc')->get();
        return view('admin/navsList',compact('nav'));
    }
}
