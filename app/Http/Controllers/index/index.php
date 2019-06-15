<?php

namespace App\Http\Controllers\index;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Http\Controllers\Controller;
use App\models\Book;
use App\models\Brand;
class index extends Controller
{
    public function index(Request $request){
        return view("Index.index");
    }
    public function left(){
        return view("Index.left");
    }
    public function head(){
        return view("Index.head");
    }
    public function main(){
        return view("Index.main");
    }
}
