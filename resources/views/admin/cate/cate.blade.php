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
                <span>视频分类添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    视频分类名称：<input type="text" name="c_cate_name" class="input1" />
                </div>
                <div class="bbD">
                    视频分类等级：
                    <select class="input3" name="c_parent_id">
                        <option value="0">顶级</option>
                    </select>
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
<script>
    function goods_add() {
        var data = {};
        var url = "/index/cate_add";
        data.c_cate_name = $("[name='c_cate_name']").val();
        data.parent_id = $("[name='c_parent_id']").val();

        $.ajax({
            type:"post",
            data:data,
            url:url,
            success:function(msg){

            }
        })


    }
</script>