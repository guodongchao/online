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
                <span>商品添加</span>
            </div>
            <div class="baBody">
                <div class="bbD">
                    商品名称：<input type="text" name="goods_name" class="input1" />
                </div>
                <div class="bbD">
                    商品分类选择框：<select class="input3" name="cate_id"><option>请选择</option></select>
                </div>
                <div class="bbD">
                    商品品牌选择框：<select class="input3" name="brand_id"><option>请选择</option></select>
                </div>
                <div class="bbD">
                    商品价格：<input type="text" name="goods_price" class="input1" />
                </div>
                <div class="bbD">
                    商品介绍：<textarea name="goods_desc" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="bbD">
                    商品状态：<input type="radio" name="goods_status[]" value="0">不上架
                              <input type="radio" name="goods_status[]" value="1">上架
                </div>
                <div class="bbD">
                    商品库存：<input type="text" name="goods_number" class="input1">
                </div>
                <div class="bbD">
                    商品推荐：<input type="checkbox" name="goods_recommend[]" value="0">精品
                              <input type="checkbox" name="goods_recommend[]" value="1">新品
                              <input type="checkbox" name="goods_recommend[]" value="1">热销
                </div>
                <div class="bbD">
                    商家备注：<textarea name="goods_note" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="bbD">
                        库存警告：<input type="text" name="warn_number" class="input1">
                </div>
                <div class="bbD">
                    商品重量：<input type="text" name="goods_weight" class="input1">
                </div>
                <div class="bbD">
                    市场价格：<input type="text" name="market_price" class="input1">
                </div>
                <div class="bbD">
                    购买商品所赠送的积分：<input type="text" name="point" class="input1">
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