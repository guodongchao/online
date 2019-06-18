<?php

namespace App\Http\Controllers\admin\Mation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MationController extends Controller
{
    public function mationCateAdd(){
        return view('admin.mation.mationcateadd');
    }
    public function mationCateInsert(Request $request){
        $cate_name = $request->input('cate_name');
        $is_show = $request->input('is_show');

        if(empty($cate_name)){
            return json_encode(['msg'=>'分类名称不能为空','code'=>1]);
        }
        $datainfo=[
            'mcate_name'=>$cate_name,
            'is_show'=>$is_show,
            'create_time'=>time()
        ];
        $res = DB::table('mation_cate')->insert($datainfo);

        if($res){
            echo json_encode(['msg'=>'添加成功','code'=>0]);
        }
    }
}