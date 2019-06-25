<?php

namespace App\Http\Controllers\admin\goods;

use App\models\chapter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\models\admin\CourseCate;
use App\models\culum;


class goods extends Controller
{
    //课程添加视图
    public function goods(){
        $teacher = [
            [ "teacher_id"=>1,
              "teacher_name"=>"张三"
            ]
        ];
        $data = CourseCate::where("c_status",1)->get()->toArray();
        $info = $this->recursion($data);
//        print_r($info);die;
        return view("admin.goods.goods",['data'=>$info,"teacher"=>$teacher]);
    }
    //课程添加执行
    public function goods_add(Request $request){

        $data = $request->input();
        $culum_name = $request->input("culum_name");
        $c_cate_id = $request->input("c_cate_id");
        $culum_price = $request->input("culum_price");
        $teacher_id = $request->input("teacher_id");
        $culum_desc = $request->input("culum_desc");
        $culum_status = $request->input("culum_status");
        $culum_hours = $request->input("culum_hours");
        $img = $request->input("img");
        if($data || $culum_name || $c_cate_id ||$culum_price||$teacher_id||$culum_desc||$culum_status||$img){
            $res = culum::insert($data);
            if($res){
                return ["code"=>100,"msg"=>"添加成功"];
            }else{
                return ["code"=>200,"msg"=>"抱歉,添加失败"];
            }
        }else{
            return ["code"=>200,"msg"=>"您有信息未添写,请填写后重新添加"];
        }


    }
    //课程展示
    public function goods_show(){
       $data =  culum::join("teacher_details","culum.teacher_id","=","teacher_details.teacher_id")
             ->join("course_cate","culum.c_cate_id","=","course_cate.c_cate_id")
             ->select("culum.*","teacher_details.teacher_name","course_cate.c_cate_name")
             ->where("is_del",1)
             ->paginate(1);
//        print_r($data);
        return view("admin.goods.goods_show",['data'=>$data]);
    }
    //课程删除
    public function goods_del(Request $request){
        $id = $request->input("id");
        $where = [
            'culum_id'=>$id,
            'chapter_status'=>1
        ];
        $chapterdata = chapter::where($where)->first();
        if($chapterdata){
            return ["code"=>200,"msg"=>"该课程下有章节不能删除"];
        }
        $search = culum::where("culum_id",$id)->select("culum_img")->first();
        $arr = [
            "is_del"=>2,
        ];
        $res =  culum::where("culum_id",$id)->update($arr);
        if ($res){
            $filePath = "./admin/$search->culum_img";
            unlink($filePath);
            return ["code"=>100,"msg"=>"删除成功"];
        }else{
            return ["code"=>200,"msg"=>"删除失败"];
        }
    }
    //课程修改视图
    public function goods_update(Request $request){
        $id = $request->input("id");
        $search = culum::where("culum_id",$id)->first();
        $teacher = [
            [ "teacher_id"=>1,
                "teacher_name"=>"张三"
            ]
        ];
        $data = CourseCate::where("c_status",1)->get()->toArray();
        $info = $this->recursion($data);
//        print_r($info);die;
        return view("admin.goods.goods_update",['data'=>$info,"teacher"=>$teacher,'info'=>$search]);
    }
    //课程修改执行
    public function goods_update_do(Request $request){
        $data = $request->input();
        $culum_name = $request->input("culum_name");
        $culum_id = $request->input("culum_id");
        $c_cate_id = $request->input("c_cate_id");
        $culum_price = $request->input("culum_price");
        $teacher_id = $request->input("teacher_id");
        $culum_desc = $request->input("culum_desc");
        $culum_status = $request->input("culum_status");
        $culum_hours = $request->input("culum_hours");
        $img = $request->input("img");
        $where = [
            "culum_name"=>$culum_name,
            "c_cate_id"=>$c_cate_id,
            "teacher_id"=>$teacher_id
        ];
        $search = culum::where("culum_id","!=",$culum_id)->where($where)->first();
        if($search){
            return ["code"=>200,"msg"=>"抱歉,该课程在该老师及分类下已存在"];
        }
        if($culum_name || $c_cate_id || $teacher_id||$culum_desc||$img){
            $res = culum::where("culum_id",$culum_id)->update($data);
            if($res){
                return ["code"=>100,"msg"=>"修改成功"];
            }else{
                return ["code"=>200,"msg"=>"抱歉,修改失败"];
            }
        }else{
            return ["code"=>201,"msg"=>"您有信息未添写,请填写后重新修改"];
        }
    }
//    递归
    public function recursion($data,$parent_id=0,$level=0){
        static $tmp;
        foreach($data as $key=>$val){
            if($val['c_parent_id'] == $parent_id){
                $val['level']=$level;
                $tmp[] = $val;
                $this->recursion($data,$val['c_cate_id'],$level+1);
            }
        }
        return $tmp;
    }
    public function uploadAjax(Request $request)
    {
        if ($request->isMethod('POST')) {

            $fileCharater = $request->file('file');
//            var_dump($fileCharater);
            if ($fileCharater->isValid()) {
                $ext = $fileCharater->getClientOriginalExtension();// 文件后缀
                $path = $fileCharater->getRealPath();//获取文件的绝对路径
                $filename = date('Ymdhis') . '.' . $ext;//定义文件名
                Storage::disk('public')->put($filename, file_get_contents($path));
                $file_path = "/admin/uploads/" . $filename;
            }

        }
        return json_encode($file_path);

    }

    public function culum_search(Request $request){
        $search = $request->input("search");
        $data = culum::join("course_cate","culum.c_cate_id","=","course_cate.c_cate_id")
            ->join("teacher_details","culum.teacher_id","=","teacher_details.teacher_id")
            ->where("c_status",1)
            ->where("is_del",1)
            ->where("culum_name",'like',"%$search%")
            ->orwhere("c_cate_name","like","%$search%")
            ->select("culum.*","teacher_details.teacher_name","course_cate.c_cate_name")
//            ->paginate(5);
        ->get();
        $view = view("admin.goods.culum_search",['data'=>$data]);
        $content = response($view)->getContent();
        return ["code"=>200,"msg"=>$content];



    }
}
