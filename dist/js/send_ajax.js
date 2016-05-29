var aurl = apphost+"/index.php?g=logistics&m=logistics&a=add";
$(function(){
	$("#submit").click(function(event){
		$.post(aurl,
		{
			uid:3,
			laddress: $("#send_to_address").val(),
			lname: $("#send_to_name").val(),
			lphone: $("#send_to_phone").val(),
			lweight: $("#weight").val(),
			lremark: $("#Remark").val()
		},
		function(data){
			if (data.success) {
				location.href = "sent.html";
			}
			else{
				alert("网络错误");
			}	
		},
		"json")
	})
})