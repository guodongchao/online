@if($data)
    @foreach($data as $key=>$val)
        <tr>
            <td width="100px" class="tdColor tdC">{{$val->culum_id}}</td>
            <td width="200px" class="tdColor">{{$val->culum_name}}</td>
            <td width="260px" class="tdColor">{{$val->culum_price}}</td>
            <td width="275px" class="tdColor">{{$val->culum_hours}}</td>
            <td width="290px" class="tdColor">{{$val->c_cate_name}}</td>
            <form  class="layui-form">
                <td width="290px" class="tdColor">
                    <img style="height:100px;width: 100px;" src="{{$val->culum_img}}" alt="">
                </td>
            </form>
            <td width="290px" class="tdColor">{{$val->teacher_name}}</td>
            <td width="290px" class="tdColor">{{$val->culum_desc}}</td>
            <td width="290px" class="tdColor layui-form">
                @if($val->culum_show==1)
                    <input type="checkbox"  value="1" checked>
                @else
                    <input type="checkbox"  value="2">
                @endif
            </td>
            <td width="290px" class="tdColor">
                @if($val->culum_status==1)
                    <input type="checkbox"  value="1" checked>
                @else
                    <input type="checkbox"  value="2">
                @endif
            </td>
            <td><a href="goods_update?id={{$val->culum_id}}"><img class="operation" src="img/update.png"></a>
                <img class="operation delban" src="img/delete.png" onclick="goods_del($(this),{{$val->culum_id}})">
            </td>
        </tr>
    @endforeach
@endif