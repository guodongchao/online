<?php

namespace App\Http\Controllers\index\index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\admin\CourseCate;
use App\models\culum;
use App\models\userculum;

class indexController extends Controller
{
    public function index(){
        return view("index.index.index");
    }
    public function header1(){
        return view("index.index.header1");
    }
    public function header2(){
        return view("index.index.header2");
    }
    public function main(){
        $where = [
            'c_status'=>1,
        ];
       $cateData =  CourseCate::where("c_status",1)->where("c_parent_id","!=",0)
                 ->orderBy("c_cate_sort","desc")
                 ->select("c_cate_id","c_cate_name")
                 ->limit(4)->get()->toArray();
        foreach($cateData as $key=>$val){

            $cateData[$key]['culum'] = culum::where("culum_show",1)->where("c_cate_id",$val['c_cate_id'])->limit(8)->get()->toArray();
            foreach($cateData[$key]['culum'] as $k=>$v){
                $cateData[$key]['culum'][$k]['num'] = userculum::where("culum_id",$v['culum_id'])->count();

            }
        }

        return view("index.index.main",['cateData'=>$cateData]);
    }
    //退出
    public function quit(){
        session()->flush('acount');
        session()->flush('u_id');
        return ['code'=>1];
    }
}
