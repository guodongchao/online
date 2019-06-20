<?php

namespace App\Http\Controllers\admin\Teacher;

use Illuminate\Http\Request;
use App\models\teacherdetails;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    //添加讲师视图
    public function teacher(Request $request){

        return view('admin.teacher.teacher');
    }
    //添加讲师执行
    public function teacher_do(Request $request){
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
    public function teacher_list(Request $request){
        $data=teacherdetails::where('teacher_status',1)->paginate(1);
        return view('admin.teacher.teacher_list',['data'=>$data]);
    }
    //删除讲师
    public function teacher_del(Request $request){
        $teacher_id=$request->input('teacher_id');
        $res=teacherdetails::where('teacher_id',$teacher_id)->update(['teacher_status'=>2,'taecher_del_time'=>time()]);
        if($res){
            $teacher_img=teacherdetails::where('teacher_id',$teacher_id)->value('teacher_img');
            if(!empty($teacher_img)){
                $teacher_img=trim($teacher_img,'.');
                @unlink("./admin/".$teacher_img);
            }
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
    public function teacher_update(Request $request){
        $teacher_id=$request->input('teacher_id');
        $data=teacherdetails::where('teacher_id',$teacher_id)->first();
        return view("admin.teacher.teacher_update",['data'=>$data]);
    }
    //讲师修改执行
    public function teacher_update_do(Request $request){
        $data=$request->input('data');
        $teacher_id=$data['teacher_id'];
        $res=teacherdetails::where('teacher_id',$data['teacher_id'])->update($data);
        if($res!==false){
            $teacher_img=teacherdetails::where('teacher_id',$teacher_id)->value('teacher_img');
            if(!empty($teacher_img)){
                $teacher_img=trim($teacher_img,'.');
                @unlink("./admin/".$teacher_img);
            }
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
