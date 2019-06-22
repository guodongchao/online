<div>
    <h3 class="pingjia">问题:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$quest['quest_title']}}</h3>
    <h3 class="pingjia">问题详情:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$quest['quest_info']}}</h3>
    <h2>评论区</h2>
    @if($data)
    <ul class="evalucourse">
        @foreach($data as $key=>$val)
            <li quest_id="{{$quest_id}}">
                        	<span class="pephead"><img src="images/0-0.JPG" width="50" title="候候">
							<p class="pepname">{{$val['u_name']}}</p>
                            </span>
                            <span class="pepcont">
                            <p><a href="#" class="peptitle see" onclick="see($(this),'{{$val['quest_id']}}')">{{$val['quest_info']}}</a></p>
                            <p class="peptime pswer">
                                <span class="pepask" quest_id="{{$quest_id}}">
                                    回答(<strong><a class="bluelink see" onclick="see($(this),'{{$val['quest_id']}}')" href="#">10</a></strong>)&nbsp;&nbsp;&nbsp;&nbsp;
                                    浏览(<strong><a class="bluelink" href="#">10</a></strong>)
                                </span>{{date("Y-m-d H:i",$val['time'])}}
                            </p>
                            </span>
            </li>
        @endforeach
    </ul>
        @else
        <h3>暂无回答,快来坐第一个吧!</h3>
    @endif
    <div class="c_eform" quest_id="{{$quest_id}}" >
        <textarea rows="7" class="pingjia_con" id="questInfo" onblur="if (this.value =='') this.value='请输入评论内容';this.className='pingjia_con'" onclick="if (this.value=='请输入问题的详细内容') this.value='';this.className='pingjia_con_on'">请输入问题的详细内容</textarea>
        <a href="#" class="fombtn quest" >发布</a>
        <div class="clearh"></div>
    </div>

</div>