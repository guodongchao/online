<?php

namespace App\Http\Controllers\admin\weixin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class weiXinController extends Controller
{
    public function weinxin(Request $request){
        $echostr  = $request->input("echostr");
        echo $echostr;
    }
}
