<?php

namespace App\Http\Controllers\index\article;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class articleController extends Controller
{
    public function article(Request $request){
        $mation_id = $request->input('mation_id');
        $mcate_id = $request->input('mcate_id');
        $top= $request->input('top');
        $id = DB::table('mation')->where('is_del',1)->orderBy('mation_id','desc')->value('mation_id');
        if(empty($mcate_id)){
            if(!empty($top)){
                $mation_id = $this->articleTop($mation_id);
            }else{
                $mation_id = $this->articlexia($mation_id,$id);
            }

        }
//        print_r($mation_id);exit;
        $data = DB::table('mation')->where('mation.is_del',1)
            ->where('mation.mation_id',$mation_id)
            ->join('mation_cate_rela','mation.mation_id','=','mation_cate_rela.mation_id')
            ->join('mation_cate','mation_cate_rela.mcate_id','=','mation_cate.mcate_id')
            ->first();
        $catesdata = DB::table('mation_cate_rela')
            ->where('is_del',1)
            ->where('mcate_id',1)
            ->join('mation','mation_cate_rela.mation_id','=','mation.mation_id')
            ->limit(6)
            ->get();
        return view("index.article.article",['data'=>$data,'catesdata'=>$catesdata,'daid'=>$id]);
    }
    public function articlelist(Request $request){
        $pageSize = 4;
        $mcate_id = $request->input('mcate_id');

        $catedata = DB::table('mation_cate')->where('is_del',1)->get();
        $mationdata=DB::table('mation')->where('mation.is_del',1);
        if(!empty($mcate_id)){
            $mationdata = $mationdata->where('mation_cate.mcate_id',$mcate_id);
        }else{
            $mcate_id = "";
        }
        
        $mationdata = $mationdata->join('mation_cate_rela','mation.mation_id','=','mation_cate_rela.mation_id')
            ->join('mation_cate','mation_cate_rela.mcate_id','=','mation_cate.mcate_id');
        $totalData = $mationdata->get();
        $mationdata = $mationdata->limit($pageSize)->get();


        $total = ceil(count($totalData)/$pageSize);

        $catesdata = DB::table('mation_cate_rela')
            ->where('is_del',1)
            ->where('mcate_id',1)
            ->join('mation','mation_cate_rela.mation_id','=','mation.mation_id')
            ->limit(6)
            ->get();
        return view("index.article.articlelist",['page'=>1,'total'=>$total,'mcate_id'=>$mcate_id,'catedata'=>$catedata,'mationdata'=>$mationdata,'catesdata'=>$catesdata]);
    }

    //上一篇
    function articleTop($mation_id){
            for($i=$mation_id-1;$i>=1;$i--){
                $mation = DB::table('mation')->where('mation.is_del',1)->where('mation_id',$i)->value('mation_id');
                if(!empty($mation)){
                    return $mation;
                }
            }
            return $mation_id;
    }
    //下一篇
    function articlexia($mation_id,$id){
        for($i=$mation_id+1;$i<=$id;$i++){
            $mation = DB::table('mation')->where('mation.is_del',1)->where('mation_id',$i)->value('mation_id');
            if(!empty($mation)){
                return $mation;
            }
        }
        return $mation_id;
    }
    public function articlePage(Request $request){
        $pageSize = 4;
        $page = $request->input("page");
        $mcate_id = $request->input('mcate_id');
        $offset = ($page-1)*$pageSize;

//        $catedata = DB::table('mation_cate')->where('is_del',1)->get();
        $mationdata=DB::table('mation')->where('mation.is_del',1);
        if(!empty($mcate_id)){
            $mationdata = $mationdata->where('mation_cate.mcate_id',$mcate_id);
        }
        $mationdata = $mationdata->join('mation_cate_rela','mation.mation_id','=','mation_cate_rela.mation_id')
            ->join('mation_cate','mation_cate_rela.mcate_id','=','mation_cate.mcate_id');
        $totalData = $mationdata->get();
        $mationdata = $mationdata->offset($offset)->limit($pageSize)->get();


        $total = ceil(count($totalData)/$pageSize);

//        $catesdata = DB::table('mation_cate_rela')
//            ->where('is_del',1)
//            ->where('mcate_id',1)
//            ->join('mation','mation_cate_rela.mation_id','=','mation.mation_id')
//            ->limit(6)
//            ->get();
        $view = view("index.article.articlePage",['page'=>$page,'mcate_id'=>$mcate_id,'total'=>$total,'mationdata'=>$mationdata]);
        $content = response($view)->getContent();
        return $content;
    }
}