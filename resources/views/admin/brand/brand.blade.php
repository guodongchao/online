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
                <span>商品品牌添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    商品品牌名称：<input type="text" name="brand_name" class="input1" />
                </div>
                <div class="bbD">
                    商品品牌是否展示：<select class="input3"><option>请选择</option></select>
                </div>
                <div class="bbD">
                    上传图片：
                    <div class="bbDd">
                        <div class="bbDImg">+</div>
                        <input type="file" class="file" /> <a class="bbDDel" href="#">删除</a>
                    </div>
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
            alert(111);
    }
</script>