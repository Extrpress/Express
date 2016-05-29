var url = apphost+"/index.php?g=logistics&m=logistics&a=logisticsInfo";
$(function(){
	console.log(2);
	$.post(url,
		{},
		function(data){
		var info=data.info;
		console.log(info);
		if(data.success) {
			for(var i in info){
				var lcode=info[i].lcode,
				lname=info[i].uname,
				timex=info[i].timex,
				laddress=info[i].uaddress;
				var html='<a href="transpresent.html"><div class="list"><div class="number"><div class="lable">单号:</div>'+lcode+'</div><div class="time">'+timex+'</div><div class="send_people"><div class="lable">寄件人:</div>'+lname+'</div><div class="from"><div class="lable">寄件地址:</div>'+laddress+'</div><div class="msge"></div></div></a>';
				var node=$(html),
				$parent=$("#receive_cont");
				$parent.append(node);
			}
		}
	},
	"json"
	)
})