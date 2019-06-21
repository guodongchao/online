<?php

namespace App\Http\Controllers\index\comment;

use App\models\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class commentController extends Controller
{
    //问答
    public function comment(Request $request){
        $redis=new \redis();
        $redis->connect('127.0.0.1','6379');

        $comment_id=$request->input('comment_id');
        $all=$redis->hGetAll($comment_id);
        if($all){
            $all['comment_id']=$comment_id;
            $comment=$redis->lRange("com$comment_id",0,-1);
            if($comment){
                foreach($comment as $k=>$v){
                    $arr[]=$redis->hGetAll($v);
                    $arr[$k]['comment_id']=$v;
                }
                return view("index.comment.comment",['all'=>$all,'arr'=>$arr]);
            }else{
                return view("index.comment.comment",['all'=>$all]);
            }
        }else{
            $comment=$redis->lRange('comment',0,-1);
            foreach($comment as $k=>$v){
                $arr[]=$redis->hGetAll($v);
                $arr[$k]['comment_id']=$v;
            }
            if(isset($arr)){
                return view("index.comment.comment",['arr'=>$arr]);
            }else{
                return view("index.comment.comment");
            }

        }

    }
    //全部评论
    public function comment_do(Request $request){
        $content=$request->input('content');
        $comment_id=$request->input('comment_id');
        $user_id=1;
        $user=user::where('u_id',$user_id)->first()->toarray();
        $redis=new \redis();
        $redis->connect('127.0.0.1','6379');
        $id=$redis->incr($user_id);
        if(!empty($comment_id)){
            $redis->lpush("com$comment_id","uid$user_id,$id");
        }else{
            $redis->lpush('comment',"uid$user_id,$id");
        }
        $arr=[
            'content'=>$content,
            'time'=>time(),
        ];
        $arr=array_merge($user,$arr);
        $res=$redis->hMSet("uid$user_id,$id",$arr);
        if($res){
            return json_encode([
                'code'=>1,
                'msg'=>'发布成功'
            ]);
        }else{
            return json_encode([
                'code'=>2,
                'msg'=>'发布失败，请检查您的网络'
            ]);
        }
    }

}