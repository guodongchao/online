<?php

namespace App\Http\Controllers\admin\Mation;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class MationController extends Controller
{
    //资讯分类添加页面
    public function mationCateAdd(){
        return view('admin.mation.mationcateadd');
    }
    //资讯分类执行添加
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
        }else{
            echo json_encode(['msg'=>'添加失败','code'=>1]);
        }
    }
    //资讯分类展示
    public function mationCateShow(){
        $catedata = DB::table('mation_cate')->where('is_del',1)->paginate(4);
        return view('admin.mation.mationcateshow',['catedata'=>$catedata]);
    }
    //是否展示
    public function isShow(Request $request){
        $is_show = $request->input('is_show');
        $mcate_id = $request->input('mcate_id');
        $res = DB::table('mation_cate')->where('mcate_id',$mcate_id)->update(['is_show'=>$is_show]);
        if($res){
            return json_encode(['msg'=>'修改成功','code'=>1]);
        }else{
            return json_encode(['msg'=>'修改失败','code'=>0]);
        }
    }
    //分类删除
    public function mationCateDel(Request $request){
        $mcate_id = $request->input('mcate_id');
        $is_del=[
            'is_del'=>0
        ];
        $res = DB::table('mation_cate')->where('mcate_id',$mcate_id)->update($is_del);
        if($res){
            echo json_encode(['msg'=>'删除成功','code'=>0]);
        }else{
            echo json_encode(['msg'=>'删除失败','code'=>1]);
        }
    }
    //分类修改页面
    public function mationCateUpdate(Request $request){
        $mcate_id = $request->input('mcate_id');
        $catedata = DB::table('mation_cate')->where('mcate_id',$mcate_id)->first();
        return view('admin.mation.mationcateupdate',['catedata'=>$catedata]);
    }
    //分类执行修改
    public function mationCateUpdateDo(Request $request){
        $cate_name = $request->input('cate_name');
        $is_show = $request->input('is_show');
        $mcate_id = $request->input('mcate_id');
        if(empty($cate_name)){
            return json_encode(['msg'=>'名称不能为空','code'=>1]);
        }
        $datainfo=[
            'mcate_name'=>$cate_name,
            'is_show'=>$is_show,
        ];
        $res = DB::table('mation_cate')->where('mcate_id',$mcate_id)->update($datainfo);
        if($res){
            echo json_encode(['msg'=>'修改成功','code'=>0]);
        }else{
            echo json_encode(['msg'=>'未修改','code'=>1]);
        }
    }
}