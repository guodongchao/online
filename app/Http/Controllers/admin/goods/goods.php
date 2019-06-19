<?php

namespace App\Http\Controllers\admin\goods;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use App\Models\admin\CourseCate;

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
//        $culum_name = $request->input("[name='culum_name']").val();
//        data.c_cate_id = $("[name='c_cate_id']").val();
//        data.culum_name = $("[name='culum_name']").val();
//        data.culum_price = $("[name='culum_price']").val();
//        data.teacher_id = $("[name='teacher_id']").val();
//        data.culum_desc = $("[name='culum_desc']").val();
//        data.culum_status = $("[name='culum_status']").val();
//        data.img = $(".uplo").val();

    }
    //课程展示
    public function goods_show(){
        return view("admin.goods.goods_show");
    }
    //课程删除
    public function goods_del(){

    }
    //课程修改视图
    public function goods_update(){
            return view("admin.goods.goods_update");
    }
    //课程修改执行
    public function goods_update_do(){

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
                $file_path = "./uploads/" . $filename;
            }

        }
        return json_encode($file_path);

    }
}
