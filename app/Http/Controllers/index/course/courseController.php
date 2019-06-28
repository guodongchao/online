<?php

namespace App\Http\Controllers\index\course;
use App\models\collect;
use Storage;
use App\models\notice;
use App\models\section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\user;
use App\models\detailed;
use Illuminate\Support\Facades\Redis;
use App\models\admin\CourseCate;
use App\models\culum;
use App\models\userculum;
use App\models\chapter;
use App\models\hour;
use App\models\userhour;

class courseController extends Controller
{
    public function coursecont(Request $request){ //详细课程介绍
        //接课程的id
        $culum_id = $request->input("culum_id");
        $culumdata = culum::where('culum_id',$culum_id)
            ->join('teacher_details','culum.teacher_id','=','teacher_details.teacher_id')
            ->first()->toArray();
        //课程目录
        $muludata = chapter::where('culum.culum_id',$culum_id)
            ->where('chapter_status',1)
            ->join('culum','chapter.culum_id','=','culum.culum_id')
            ->get()->toArray();
        //课程公告
        $c_cate_id = notice::where('n_status',1)->get(['c_cate_id','n_name'])->toArray();
//        print_r($c_cate_id);exit;
        $name = [];
        foreach($c_cate_id as $k=>$v){
            if(substr_count($v['c_cate_id'],$culumdata['c_cate_id'])>0){
                $name[]['n_name'] = $v['n_name'];
            }
        }
        //总课时
        $data = hour::where('culum_id',$culum_id)->get(['culum_id'])->toarray();
        $num = count($data);
        //总分钟
        $time = hour::where('culum_id',$culum_id)->pluck('show_time')->toarray();
        $time = array_sum($time);
        //x学习人数
        $usernaem = DB::table('user_culum')->where('culum_id',$culum_id)->get();
        $usernum = count($usernaem);

//        print_r($time);
//        exit;
        return view("index.course.coursecont",['culumdata'=>$culumdata,'muludata'=>$muludata,'name'=>$name,'num'=>$num,'time'=>$time,'usernum'=>$usernum]);
    }
    public function coursecont1(Request $request){    //章节,问答,资料区
        $u_id =$request->input("u_id",1);
        $culum_id =$request->input("culum_id",1);   //课程id
        $u_id =$request->session()->get('u_id');
        $culum_id =$request->input("culum_id");   //课程id
//
        if(empty($u_id)){
            return json_encode(['code'=>1]);
        }
        $where = [
            'u_id'=>$u_id,
            'culum_id'=>$culum_id
        ];
        $usernaem = DB::table('user_culum')->where($where)->first();
//        var_dump($usernaem);exit;
        if(empty($usernaem)){
            return json_encode(['code'=>2]);
        }

        return json_encode(['code'=>3,'culum_id'=>$culum_id]);
//        return view("index.course.coursecont1",['data'=>$arr,'beforQuest_id'=>$quest_id]);
    }
    public function coursecont2(Request $request){
        $u_id = session("u_id");
        $u_name = session("u_name");
        if(!$u_id){
            return redirect("/index/login");
        }

        $culum_id =$request->input("culum_id");   //课程id
        $quest_id = $request->input("quest_id");    //查看问题的id
//        $this->canWatch($u_id,$culum_id);
        $culumCan = userculum::where("u_id",$u_id)->where("culum_id",$culum_id)->first();
        if(!$culumCan){
            return redirect("/index/coursecont?culum_id=$culum_id");
        }

        if($quest_id){
            $data = Redis::lrange($quest_id,0,-1);
        }else{
            $strKey = "clum_$culum_id";  //第一层
            $data = Redis::lrange($strKey,0,-1);
        }
        foreach($data as $key=>$val){
            $arr[] = Redis::hgetall($val);
        }
        if(!isset($arr)){
            $arr=[];
        }
        $culumdata = culum::where('culum_id',$culum_id)
            ->join('teacher_details','culum.teacher_id','=','teacher_details.teacher_id')
            ->first()->toArray();
        //总分钟
        $time = hour::where('culum_id',$culum_id)->pluck('show_time')->toarray();
        $culumdata['time'] = array_sum($time);
        $culumdata['hour'] = count($time);
        $culumdata['num']=userculum::where('culum_id',$culum_id)->count();
        //相关课程
        $where=[
            'is_del'=>1,
            'c_cate_id'=>$culumdata['c_cate_id']
        ];
        $culum_cate=culum::where($where)->limit(3)->get()->toarray();
        //章节小节
        $chapter=chapter::where('culum_id',$culum_id)->where('chapter_status',1)->get()->toarray();
        foreach($chapter as $k=>$v){
            $chapter[$k]['section']=section::where('chapter_id',$v['chapter_id'])->where('is_del',1)->select('section_id','section_name')->get()->toarray();
        }
        foreach ($chapter as $k=>$v){
            foreach ($v['section'] as $kk=>$vv){
                $chapter[$k]['section'][$kk]['hour']=hour::where('section_id',$vv['section_id'])->where('is_del',1)->get()->toarray();
            }
        }
//        dump($chapter);
        return view("index.course.coursecont1",['chapter'=>$chapter,'culum_cate'=>$culum_cate,'culumdata'=>$culumdata,'data'=>$arr,'beforQuest_id'=>$quest_id]);
    }
    public function courselist(Request $request){       //课程展示(主要查询分类)
        $data = CourseCate::where("c_status",1)->get()->toArray();
        $sortData = recursionSon($data);
        $c_cate_id=$request->input('c_cate_id');
        return view("index.course.courselist",['c_cate_id'=>$c_cate_id,'cateData'=>$sortData]);
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
        $culum_id =$request->input("culum_id",1);
        $u_name = session("u_name");
        $u_id = session("u_id");

        $culumCan = userculum::where("u_id",$u_id)->where("culum_id",$culum_id)->first();
        if(!$culumCan){
            return redirect("/index/coursecont?culum_id=$culum_id");
        }
        $chapter=chapter::where('culum_id',$culum_id)->where('chapter_status',1)->get()->toarray();
        foreach($chapter as $k=>$v){
            $chapter[$k]['section']=section::where('chapter_id',$v['chapter_id'])->where('is_del',1)->select('section_id','section_name')->get()->toarray();
        }
        foreach ($chapter as $k=>$v){
            foreach ($v['section'] as $kk=>$vv){
                $chapter[$k]['section'][$kk]['hour']=hour::where('section_id',$vv['section_id'])->where('is_del',1)->get()->toarray();
            }
        }
        $myHouse = userhour::where("u_id",$u_id)->where("culum_id",$culum_id)->pluck("hour_id");
//        dump($myHouse);
        if(!$myHouse){
            $hourData = hour::whereNotIn("hour_id",$myHouse)->limit(1)->first();
        }else{
            $hourData = hour::where("culum_id",$culum_id)->limit(1)->first();
        }
//        dump($hourData);
//        userhour::where("")
//        dump($chapter);
        return view("index.course.video",['chapter'=>$chapter,'u_name'=>$u_name,'hourData'=>$hourData]);
    }

    public function canWatch($u_id,$culum_id){
        $culumCan = userculum::where("u_id",$u_id)->where("culum_id",$culum_id)->first();
        if(!$culumCan){
            dump($u_id);
            return redirect("/index/coursecont?culum_id=$culum_id");
            die;
        }
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
        if($data) {
            foreach ($data as $value) {

                $arr[] = Redis::hgetall($value);
            }
        }else{
            $arr = [];
        }
        $view = view("index.course.courseAjax",['data'=>$arr,'quest'=>$questData,'quest_id'=>$quest_id]);
        $content = response($view)->getContent();
        return $content;
    }
    //头像上传
    public function uploadAjax(Request $request)
    {
        if ($request->isMethod('POST')) {
            $fileCharater = $request->file('file');
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
    //我的信息
    public function mycourse(){
        $uid=session('u_id');
        $where=[
            'u_id'=>$uid
        ];
        $img = user::where($where)->pluck('u_img')->toarray();
        //学习中
        $userWhere=[
            'u_id'=>$uid,
            'user_culum_status'=>1,
            'user_culum_del'=>1
        ];
        $userCulum=userculum::where($userWhere)->pluck('culum_id')->toarray();
        $Info1=[];
        foreach($userCulum as $k=>$v){
            $culumwhere=[
                'culum_id'=>$v
            ];
            $culumInfo=culum::where($culumwhere)->first();
            $dateinfo['culum_name']=$culumInfo->culum_name;
            $dateinfo['culum_img']=$culumInfo->culum_img;
            $Info1[]=$dateinfo;
        }
        //已学完
        $user2Where=[
            'u_id'=>$uid,
            'user_culum_status'=>2,
            'user_culum_del'=>1
        ];
        $userCulum2=userculum::where($user2Where)->pluck('culum_id')->toarray();
        $Info2=[];
        foreach($userCulum2 as $k=>$v){
            $culumwheres=[
                'culum_id'=>$v
            ];
            $culumInfos=culum::where($culumwheres)->first();
            $dateinfo2['culum_name']=$culumInfos->culum_name;
            $dateinfo2['culum_img']=$culumInfos->culum_img;
            $Info2[]=$dateinfo2;
        }
        //收藏
        $collectWhere=[
            'u_id'=>$uid,
            'collect_status'=>1,
        ];
        $userCollect=collect::where($collectWhere)->pluck('culum_id')->toarray();
        $Collect=[];
        foreach($userCollect as $k=>$v){
            $collectwhere=[
                'culum_id'=>$v
            ];
            $collectInfo=culum::where($collectwhere)->first();
            $date['culum_name']=$collectInfo->culum_name;
            $date['culum_img']=$collectInfo->culum_img;
            $Collect[]=$date;
        }
        $data=[
            'img'=>$img[0],
            'culumInfo'=>$Info1,
            'culuminfo'=>$Info2,
            'collectInfo'=>$Collect
        ];
        return view("index.course.mycourse",$data);
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
    //修改信息执行
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






