<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>头部-有点</title>
    <link rel="stylesheet" type="text/css" href="css/css.css" />
    <script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body>
<div id="pageAll">
    <div class="page ">
        <!-- 上传广告页面样式 -->
        <div class="banneradd bor">
            <div class="baTop">
                <span>题库添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    题库分类：<select class="input3" name="q_class"><option value="">请选择</option></select>
                </div>
                <div class="bbD" >
                    题库类型：<input type="radio" name="q_type" value="1" onclick="check_type(1)"/>选择题<input type="radio" value="2" name="q_type" onclick="check_type(2)"/>判断题
                </div>
                <div class="bbD">
                    题目名称：<input type="text" name="q_name" class="input1" />
                </div>
                <div class="bbD" id="type">
                    题目答案：<input type="text" name="q_answer" class="input1"  placeholder="用‘,’隔开写出4个答案"/>
                </div>
                <div class="bbD">
                    正确答案：<input type="text" name="q_result" class="input1" />
                </div>

                <div class="bbD">
                    <p class="bbDP">
                        <button class="btn_ok btn_yes" href="#" onclick="goods_add()">提交</button>
                        <a class="btn_ok btn_no" href="goods">取消</a>
                    </p>
                </div>
            </div>
        </div>

        <!-- 上传广告页面样式end -->
    </div>
</div>
</body>
</html>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script>
    $('#type').hide()
    /*
    获取值，提交值
    */
    function goods_add() {
        var q_type=$("input[name='q_type']:checked").val();
        var q_name=$("input[name='q_name']").val();
        if(q_type==1){
            var q_answer=$("input[name='q_answer']").val();
        }else{
            q_answer="√,×";
        }
        var q_result=$("input[name='q_result']").val();
        if(q_type==undefined){
            alert('请选择题类型');
            return false;
        }
        if(q_name==""){
            alert('题目名称不能为空')
            return false;
        }
        if(q_answer==""){
            alert('题目答案不能为空')
            return false;
        }
        if(q_result==""){
            alert('正确答案不能为空')
            return false;
        }
       var data={
           q_type:q_type,
           q_name:q_name,
           q_answer:q_answer,
           q_result:q_result
        }
        $.ajax({
            type:'post',
            data:data,
            url:'http://online.com/admin/brand_add',
            dataType:'json',
            success:function(data){
                alert(data.msg)
                if(data.error==0){
                    window.location.reload();
                }
            }
        })
    }
    /*
    显示隐藏
     */
    function check_type(val) {
        if(val==1){
            $('#type').show()
        }else if(val==2){
            $('#type').hide()
        }
    }
</script>