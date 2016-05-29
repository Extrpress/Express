$(function(){
	$.post("url",function(data){
		var info=data.info;
		if(data.success) {
			for(item in info){
				var lcode=item.lcode,
				lname=item.lname,
				laddress=item.laddress;
				var html='<div class="list"><div class="number"><div class="lable">单号:'+lcode+'</div></div><div class="time">昨天</div><div class="send_people"><div class="lable">寄件人:'+lname+'</div></div><div class="from"><div class="lable">寄件地址:'+laddress+'</div></div><div class="msge"><a href="transpresent.html"><div class="lable">详情</div></a></div></div>'
			}
		}
	})
})