<?php

namespace App\Http\Controllers\admin\shiping;

use App\models\hour;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class shiping extends Controller
{
    public function upd(Request $request){
        $section_id = $request->input('section_id');
        return view("admin.shiping.shiping",['section_id'=>$section_id]);
    }
    //视频上传
   public function uploadShiping(){
        global $_W;
        global $_GPC;
        $fileArr = $_FILES['mf'];
        $title = $_GPC['title'];
        /*var_dump($title);
        exit;*/
        //设置预览目录,上传成功的路径
        $previewPath = "./admin/shiping/";
        if(!is_dir($previewPath)){
            mkdir($previewPath);
        }
        $ext = pathinfo($fileArr['name'], PATHINFO_EXTENSION);//获取当前上传文件扩展名
        $arrExt = array('3gp','rmvb','flv','wmv','avi','mkv','mp4','mp3','wav',);

        if(!in_array($ext,$arrExt)) {
            exit(json_encode(-1,JSON_UNESCAPED_UNICODE));//视/音频或采用了不合适的扩展名！
        } else {
            //文件上传到预览目录
            $previewName = 'pre_'.md5(mt_rand(1000,9999)).time().'.'.$ext; //文件重命名
            $previewSrc = $previewPath.$previewName;

            if(move_uploaded_file($fileArr['tmp_name'],$previewSrc)){//上传文件操作，上传失败的操作
                exit($previewName);
            } else {
                //上传成功的失败的操作
                exit(json_encode(0,JSON_UNESCAPED_UNICODE));
            }
        }
    }
    //课时执行添加
    public function hourInsert(Request $request){
       $hour_name = $request->input('hour_name');
       $section_id = $request->input('section_id');
       $video_desc = $request->input('video_desc');
       $show_time=trim($request->input('show_time'));
       $data = [
           'hour_name'=>$hour_name,
           'section_id'=>$section_id,
           'video_desc'=>$video_desc,
           'create_time'=>time(),
           'show_time'=>$show_time
       ];
       $res = hour::insert($data);
        if($res){
            echo json_encode(['msg' => '添加成功', 'code' =>0,'section_id'=>$section_id]);
        }else{
            echo json_encode(['msg' => '添加失败', 'code' =>1]);
        }
    }
}
