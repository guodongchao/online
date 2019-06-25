<?php

namespace App\Http\Controllers\index\course;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\user;
use App\models\detailed;
use Illuminate\Support\Facades\Redis;
use App\models\admin\CourseCate;
use App\models\culum;
use App\models\userculum;

class courseController extends Controller
{
    public function coursecont(Request $request){ //详细课程介绍
        //接课程的id
        $culum_id = $request->input("culum_id");

        return view("index.course.coursecont");
    }
    public function coursecont1(Request $request){    //章节,问答,资料区
        $u_id =$request->input("u_id",1);
        $culum_id =$request->input("culum_id",1);   //课程id
        $quest_id = $request->input("quest_id");    //查看问题的id

        if($quest_id){
            $data = Redis::lrange($quest_id,0,-1);

        }else{
            $strKey = "clum_$culum_id";  //第一层
            $data = Redis::lrange($strKey,0,-1);
        }

        foreach($data as $key=>$val){
            $arr[] = Redis::hgetall($val);
        }
//        dump($arr);die;
        if(!isset($arr)){
            $arr=[];
        }

        return view("index.course.coursecont1",['data'=>$arr,'beforQuest_id'=>$quest_id]);
    }
    public function courselist(Request $request){       //课程展示(主要查询分类)
        $data = CourseCate::where("c_status",1)->get()->toArray();
        $sortData = recursionSon($data);

        return view("index.course.courselist",['cateData'=>$sortData]);
    }

    public function courselistData(Request $request){       //课程展示(中间位置)
        $page = empty($request->input("page"))?1:$request->input("page");
        $pageSize = 3;
        $offset = ($page-1)*$pageSize;
        $cate_id = $request->input("cate_id");
        if(!$cate_id){
            return ["code"=>200,"msg"=>"非法操作"];
        }
        $culumData = culum::where("c_cate_id",$cate_id)->where("culum_show",1);

        $data = $culumData->get();
        $total = ceil(count($data)/$pageSize);

        $culumData = $culumData
                   ->offset($offset)
                   ->limit($pageSize)
                   ->get();   //课程
        foreach($culumData as $key=>$val){
            $studyNum = userculum::where("culum_id",$val->culum_id)->count();
            $val->studyNum =  $studyNum;
        }

        $view = view("index.course.cateCulum",['data'=>$culumData,'search'=>"",'cate_id'=>$cate_id,'page'=>$page,'total'=>$total]);
        $content = response($view)->getContent();
        return $content;

    }

    public function courseSearch(Request $request){       //课程搜索
        $page = empty($request->input("page"))?1:$request->input("page");
        $pageSize = 3;
        $offset = ($page-1)*$pageSize;
        $cate_id = $request->input("cate_id");
        $search = $request->input("search");

        if(!$cate_id){
            return ["code"=>200,"msg"=>"非法操作"];
        }
        $culumData = culum::where("culum_show",1)->where("c_cate_id",$cate_id)->where("culum_name","like","%$search%");

        $data = $culumData->get();
        $total = ceil(count($data)/$pageSize);

        $culumData = $culumData
            ->offset($offset)
            ->limit($pageSize)
            ->get();   //课程
        foreach($culumData as $key=>$val){
            $studyNum = userculum::where("culum_id",$val->culum_id)->count();
            $val->studyNum =  $studyNum;
        }

        $view = view("index.course.cateCulum",['data'=>$culumData,'cate_id'=>$cate_id,'page'=>$page,"search"=>$search,'total'=>$total]);
        $content = response($view)->getContent();
        return $content;

    }





    //视频播放
    public function video(Request $request){
        return view("index.course.video");
    }
    public function quest(Request $request){      //提出问题
        $u_id =$request->input("u_id",1);
        $content =$request->input("content");
        $contentInfo =$request->input("contentInfo");
        $culum_id =$request->input("culum_id");
        $quest_id = $request->input("quest_id");  //查看问题的id
        $time = time();
        $uniq = Redis::incr($u_id);

        $userInfo = user::where("u_id",$u_id)->first()->toArray();

        if($quest_id){   //第二层及以后
//            $hashKey = "secClum".$culum_id."uid".$u_id.$uniq;
            $secKey = "req".$quest_id;  //第二及以后的key值
            $hashKey = "sec".$quest_id;  //二次后的value
            Redis::lpush($secKey,$hashKey);

        }else{
            $hashKey = "clum".$culum_id."uid".$u_id.$uniq;   //第一层
            $strKey = "clum_$culum_id";  //第一层
            Redis::lpush($strKey,$hashKey);

        }
        $data = [
            'quest_title'=>$content,
            'quest_info'=>$contentInfo,
            'time'=>$time,
            'quest_id'=>$hashKey
        ];
        $quest_id = $hashKey;
        $arr = array_merge($userInfo,$data);

        $res = Redis::hMset($hashKey,$arr);  //将问题存入哈希里

        if($res){
            return ["code"=>100,"msg"=>"发布成功","quest_id"=>$quest_id,'arr'=>$arr];
        }else{
            return ["code"=>200,"msg"=>"发布失败","quest_id"=>$quest_id];
        }

    }

    public function questSecord(Request $request){   //第二次问题查看
        $quest_id = $request->input("quest_id");
        $culum_id = $request->input("culum_id");
//        $beforQuest_id = $request->input("beforQuest_id");
        $u_id = $request->input("u_id",1);
        if(!$quest_id){
            $strKey = "clum_$culum_id";  //第一层
            $data = Redis::lrange($strKey,0,-1);
            $questData ="";
        }else{
            $secKey = "req".$quest_id;  //第二及以后的key值
            $questData = Redis::hgetall($quest_id);

            $data = Redis::lrange($secKey,0,-1);
        }


//        dump($data);

        if($data) {
            foreach ($data as $value) {

                $arr[] = Redis::hgetall($value);
            }
        }else{
            $arr = [];
        }
//        dump($arr);
//        dump($questData);
        $view = view("index.course.courseAjax",['data'=>$arr,'quest'=>$questData,'quest_id'=>$quest_id]);
        $content = response($view)->getContent();
        return $content;
    }
    //我的信息
    public function mycourse(){
        $uid=session('u_id');
        $where=[
            'u_id'=>$uid
        ];
        $img = user::where($where)->pluck('u_img')->toarray();
        return view("index.course.mycourse",['img'=>$img[0]]);
    }
    //修改密码
    public function myrepassword(){
        $uid=session('u_id');
        return view("index.course.myrepassword",['uid'=>$uid]);
    }
    //修改密码执行
    public function myrepasswordDo(Request $request){
        $old_pwd=$request->input('u_pwd');
        $new_pwd=$request->input('u_pwds');
        $u_id=$request->input('uid');
        $where=[
            'u_id'=>$u_id
        ];
        $Info=user::where($where)->first()->toarray();
        if($Info['u_pwd']!=md5($old_pwd)){
            return json_encode(['code'=>4003,'msg'=>'密码错误']);die;
        }
        $pwdData=[
            'u_pwd'=>md5($new_pwd)
        ];
        $res=user::where(['u_id'=>$u_id])->update($pwdData);
        if($res){
            return json_encode(['code'=>200,'msg'=>'修改成功']);
        }else{
            return json_encode(['code'=>5003,'msg'=>'修改失败']);die;
        }
    }
    //修改信息
    public function detail(){
        $uid=session('u_id');
        $where=[
            'u_id'=>$uid
        ];
        $userInfo =user::where($where)->first();
        $detailInfo=detailed::where($where)->first();
        $data=[
            'userInfo'=>$userInfo,
            'detailInfo'=>$detailInfo
        ];
        return view('index.course.mysetting',$data);
    }
    public function detailDo(Request $request)
    {
        $u_id = $request->input('u_id');
        $u_email = $request->input('u_email');
        $u_name = $request->input('u_name');
        $u_tel = $request->input('u_tel');
        $u_img = $request->input('u_img');
        DB::beginTransaction();
        try {
            $where = [
                'u_id' => $u_id
            ];
            $userData = [
                'u_name' => $u_name,
                'u_email' => $u_email,
                'u_img' => $u_img
            ];
            $detailData = [
                'u_tel' => $u_tel,
            ];
             user::where($where)->update($userData);
             detailed::where($where)->update($detailData);
            //提交事务
            DB::commit();
            return json_encode(['code' => 200, 'msg' => '修改成功']);

        } catch (\Exception $e) {
            //回滚
            DB::rollback();
            throw $e;
        }
    }
}






