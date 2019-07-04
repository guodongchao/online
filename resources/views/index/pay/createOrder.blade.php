
    <style>
        .car_tab{
            font-family: "宋体";
            border-collapse: collapse;
            border: 1px solid #eaeaea;
        }
        table.car_tab tr td.car_th {
            background-color: #f6f6f6;
            font-size: 14px;
            border-right: 1px solid #eaeaea;
            padding: 8px 20px;
            font-family: "Microsoft YaHei";
            text-align: center;
        }
        table.car_tab tr td {
            border-collapse: collapse;
            line-height: 22px;
            border: 0;
            border-bottom: 1px solid #eaeaea;
            padding: 15px 20px;
        }
        .layui_btn{
            display: inline-block;
            height: 38px;
            line-height: 38px;
            padding: 0 18px;
            background-color: #1E9FFF;
            color: #fff;
            white-space: nowrap;
            text-align: center;
            font-size: 14px;
            border: none;
            border-radius: 2px;
            cursor: pointer;
        }
    </style>
    <!-- InstanceBeginEditable name="EditRegion1" -->
    <div class="coursecont">
        <div class="coursepic">
            <table border="0" class="car_tab" style="width:100%;" cellspacing="0" cellpadding="0">
                <tbody>
                <input type="hidden" value="{{$data->culum_id}}" name="culum_id">
                <tr>
                    <td class="car_th" width="550">商品名称</td>
                    <td class="car_th" width="150">商品价格</td>
                </tr>

                <tr>
                    <td>
                        <img src="admin/{{ltrim($data->culum_img,".")}}" width="80" height="50" style="float: left">
                        <span style="float: left;margin-left: 5px;">{{$data->culum_name}}</span>
                    </td>
                    <td style="text-align: center;color: #ff4e00;">
                        ￥{{number_format($data->culum_price,2,'.',',')}}
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <label title="微信">
                            <input type="radio" name="pay_type" checked value="1">微信
                        </label>
                        <label title="支付宝">
                            <input type="radio" name="pay_type" value="2" style="margin-left: 50px;">支付宝
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: right;">
                        <input type="button" class="layui_btn" value="提交订单">
                    </td>

                </tr>

                </tbody></table>
        </div>
        <div style="text-align: right;">
        </div>
    </div>
    <!-- InstanceEndEditable -->


    <div class="clearh"></div>
    <script src="js/jquery-1.8.0.min.js"></script>
    <script>
        $(function () {
            $(".layui_btn").click(function () {
                var culum_id = $("[name='culum_id']").val();
                var pay_type = $("[name='pay_type']:checked").val();
                if(pay_type==2){
                    location.href="show?culum_id="+culum_id;
                }else{
                    location.href="show?culum_id="+culum_id;
                }

            });
        })
    </script>