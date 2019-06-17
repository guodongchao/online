<?php

namespace App\Http\Controllers\admin\index;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\models\Book;
use App\models\Brand;
class index extends Controller
{
    public function index(Request $request){
        return view("admin.Index.index");
    }
    public function left(){
        return view("admin.Index.left");
    }
    public function head(){
        return view("admin.Index.head");
    }
    public function main(){
        return view("admin.Index.main");
    }
}
