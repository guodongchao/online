<?php
    function aa(){
        return 111;
    }
//    递归
 function recursion($data,$parent_id=0,$level=0){
    static $tmp;
    foreach($data as $key=>$val){
        if($val['c_parent_id'] == $parent_id){
            $val['level']=$level;
            $tmp[] = $val;
            recursion($data,$val['c_cate_id'],$level+1);
        }
    }
    return $tmp;
}
?>