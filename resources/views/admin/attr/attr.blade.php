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
                <span>商品属性添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    商品属性名称：<input type="text" name="attr_name" class="input1" />
                </div>
                <div class="bbD">
                    所属商品类型：<select class="input3"><option>请选择</option></select>
                </div>
                <div class="bbD">
                    属性/规格：<input type="radio" name="attr_input_type" value="1" checked>属性
                               <input type="radio" name="attr_input_type" value="2">规格
                </div>
                <div class="bbD">
                    录入方式：<input type="radio" name="attr_type" value="1" checked>手工录入
                              <input type="radio" name="attr_type" value="2">从下面的列表中选择</br>
                    可选值：<textarea name="attr_value" id="" disabled cols="30" rows="10"></textarea>
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