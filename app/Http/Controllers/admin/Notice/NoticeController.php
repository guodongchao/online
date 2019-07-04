<?php

namespace App\Http\Controllers\admin\Notice;

use Illuminate\Http\Request;
use App\models\notice;
use App\Http\Controllers\Controller;
use App\models\admin\CourseCate;

class NoticeController extends Controller
{
    //添加公告视图
    public function notice(Request $request){
        return view('admin.notice.notice');
    }
    //添加公告执行
    public function notice_do(Request $request){
        $data=$request->input('data');
        $data['n_time']=time();
        $res=notice::insert($data);
        if($res){

            return json_encode([
                'code'=>0,
                'msg'=>'添加成功'
            ]);
        }else{
            return json_encode([
                'code'=>1,
                'msg'=>'添加失败'
            ]);
        }
    }
    //公告视图
    public function notice_list(Request $request){
        $data['data']=notice::where('n_status',1)->get()->toarray();
        $arr = CourseCate::where("c_status",1)->get()->toArray();
        $arr = recursion($arr);
        foreach ($data['data'] as $k=>$v){
            $data['data'][$k]['cate_id']=explode(',',$v['c_cate_id']);
        }
        foreach($data['data'] as $k=>$v){
            $data['data'][$k]['cate_id']=CourseCate::whereIn('c_cate_id',$v['cate_id'])->where('c_status',1)->get()->toarray();
        }
        return view('admin.notice.notice_list',['arr'=>$arr,'data'=>$data]);
    }
    //公共添加分类
    public function n_cate(Request $request){
        $data=$request->input('data');
        $str=notice::where('n_id',$data['n_id'])->value('c_cate_id');
        if(empty($str)){
            $res=notice::where('n_id',$data['n_id'])->update(['c_cate_id'=>$data['c_cate_id']]);
        }else{
            $all=$str.",$data[c_cate_id]";
            $res=notice::where('n_id',$data['n_id'])->update(['c_cate_id'=>$all]);
        }
        if($res){
            return json_encode([
                'code'=>0,
                'msg'=>'添加成功'
            ]);
        }else{
            return json_encode([
                'code'=>1,
                'msg'=>'添加失败'
            ]);
        }
    }
    //删除分类
    public function cate_del(Request $request){
        $data=$request->input('data');
        $str=notice::where('n_id',$data['n_id'])->value('c_cate_id');
        $arr=explode(',',$str);
        $arr_flip = array_flip($arr);
        unset($arr_flip[$data['c_cate_id']]);
        $string_to_array = array_flip($arr_flip);
        $str = implode(",", $string_to_array);
        $res=notice::where('n_id',$data['n_id'])->update(['c_cate_id'=>$str]);
        if($res){
            return json_encode([
                'code'=>0,
                'msg'=>'删除成功'
            ]);
        }else{
            return json_encode([
                'code'=>1,
                'msg'=>'删除失败'
            ]);
        }
    }
    //删除公告
    public function notice_del(Request $request){
        $n_id=$request->input('n_id');
        $res=notice::where('n_id',$n_id)->update(['n_status'=>2]);
        if($res){
            return json_encode([
                'code'=>0,
                'msg'=>'删除成功'
            ]);
        }else{
            return json_encode([
                'code'=>1,
                'msg'=>'删除失败'
            ]);
        }
    }
    //公告修改视图
    public function notice_update(Request $request){
        $n_id=$request->input('n_id');
        $data=notice::where('n_id',$n_id)->first();
        return view("admin.notice.notice_update",['data'=>$data]);
    }
    //公告修改执行
    public function notice_update_do(Request $request){
        $data=$request->input('data');
        $res=notice::where('n_id',$data['n_id'])->update($data);
        if($res!==false){
            return json_encode([
                'code'=>0,
                'msg'=>'修改成功'
            ]);
        }else{
            return json_encode([
                'code'=>1,
                'msg'=>'修改失败'
            ]);
        }
    }
}
