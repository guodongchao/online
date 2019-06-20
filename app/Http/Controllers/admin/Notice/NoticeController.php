<?php

namespace App\Http\Controllers\admin\Notice;

use Illuminate\Http\Request;
use App\models\notice;
use App\Http\Controllers\Controller;

class NoticeController extends Controller
{
    //添加讲师视图
    public function notice(Request $request){
        return view('admin.notice.notice');
    }
    //添加讲师执行
    public function notice_do(Request $request){
        $data=$request->input('data');
        $data['teacher_time']=time();
        $res=teacherdetails::insert($data);
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
    //讲师视图
    public function notice_list(Request $request){
        $data=teacherdetails::where('teacher_status',1)->paginate(1);
        return view('admin.teacher.teacher_list',['data'=>$data]);
    }
    //删除讲师
    public function notice_del(Request $request){
        $teacher_id=$request->input('teacher_id');
        $res=teacherdetails::where('teacher_id',$teacher_id)->update(['teacher_status'=>2]);
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
    //讲师修改视图
    public function notice_update(Request $request){
        $teacher_id=$request->input('teacher_id');
        $data=teacherdetails::where('teacher_id',$teacher_id)->first();
        return view("admin.teacher.teacher_update",['data'=>$data]);
    }
    //讲师修改执行
    public function notice_update_do(Request $request){
        $data=$request->input('data');
        $teacher_id=$data['teacher_id'];
        $res=teacherdetails::where('teacher_id',$data['teacher_id'])->update($data);
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
