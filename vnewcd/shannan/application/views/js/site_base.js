// JavaScript Document
$('.menuBtn').click(function(){
	$('menu').toggleClass('open');
	});

$('.loginBox h3 a').click(function(){
	$('.loginAlert').hide();
	});
$('.loginBtn,.box1i').click(function(){
	$('.loginAlert').show();
	});







//add
function chk_login(){
	var username=$("input[name='username']").val();
	var password=$("input[name='pass']").val();
	var jizhu=$("input[name='jizhu']").val();

	//var yz=$("#yz").val();

	if(username==''){
		alert('用户名不能为空');
		return false;
	}
	if(password==''){
		alert('密码不能为空');
		return false;
	}
	/*if(yz==''){
		alert('验证码不能为空');
		return false;
	}*/
		var url="../chk_login.php";
		var da={};
		da['username']=username;
		da['password']=password;
		da['jizhu']=jizhu;
		$.ajax({
		type: "POST",
		url: url,
		data: da,
		beforeSend: function(XMLHttpRequest){
		},
		success: function(data, textStatus){
			data=parseInt(data);
			switch(data){
				case 1:
				    alert('登录成功');
					window.location.reload();
					break;
				case 11:
				    alert('请先完善资料');
					window.location.href='usercenter.php';
					break;
				case 2:
					alert("用户名或密码错误");
					break;
				case 3:
					alert("该账户被锁定");
					break;
				default:
					alert('登录信息不正确。');
			}
		},
		complete: function(XMLHttpRequest, textStatus){
		},
		error: function(){
			alert("更新失败");
		},
		cache : false
		});
		return false;

}


//默认选中
function selectValue(sId,value){
    var s = document.getElementById(sId);
    var ops = s.options;
	for(var i=0;i<ops.length; i++){
	var tempValue = ops[i].value;
		if(tempValue == value){
				ops[i].selected = true;
		}
	}
}

function GetUrlPara(){
	var url = document.location.toString();
	var arrUrl = url.split("?");
	var para = arrUrl[1];
	return para;
}

function chk_sou(){
	var skey=$("#skey").val();
	if(skey=="" || skey=='请输入职位关键词：如 销售总监'){
		alert("搜索不能为空");
		return false;
	}else{
		location.href='rc.php?skey='+skey;
	}
}

function chk_sou2(s,id){
	if(!s || !id || id==0){
		//return false;
	}
	var para=GetUrlPara();
	if(!para){
		location.href='rc.php?'+s+'='+id;
		return false;
	}
	var arr= new Array(); //定义一数组
	arr=para.split("&"); //字符分割
	for (i=0;i<arr.length ;i++ ) {
		if(arr[i].indexOf(s)!==-1){
			arr.splice(i,1);
		}
	}
	arr.push(s+'='+id);
	var url=arr.join('&');
	location.href='rc.php?'+url;

}


function add_td(id,title){
	if(!id || !title){
		alert('出错'); return false;
	}
	var url="/add_td.php";
	var da={};
	da['id']=id;
	da['title']=title;
	$.ajax({
	type: "POST",
	url: url,
	data: da,
	success: function(data, textStatus){
		if(data==1){
		    alert("投递成功");
			location.reload();
		}else if(data==2){
		    alert("请登录");
			return false;
		}else if(data==3){
			alert("已投递");
			return false;
		}else{
			alert("出错"+data);
			return false;
		}
	}
	});
}


function chk_qy(){
	var title=$("input[name='title']").val();
	var lxr=$("input[name='lxr']").val();
	var phone=$("input[name='phone']").val();
	var address=$("input[name='address']").val();
	var email=$("input[name='email']").val();
	var content=$("textarea[name='content']").val();

	if(!title){
		alert('企业名称不能为空');return false;
	}
	if(!lxr){
		alert('负责人姓名不能为空');return false;
	}
	if(!phone){
		alert('联系电话不能为空');return false;
	}
	if(!address){
		alert('联系地址不能为空');return false;
	}
	if(!email){
		alert('企业邮箱不能为空');return false;
	}
	if(!content){
		alert('企业需求不能为空');return false;
	}


}

function chk_qy2(){
	var i1=0,i2=0,i3=0,i4=0,i5=0,i6=0,i7=0,i8=0,i9=0;
	$("input[name='zw_title[]']").each(function(){
		if($(this).val()==''){
			i1++;
		}
	});
	if(i1){
		alert('请填写职位名称'); return false;
	}

	$("input[name='num[]']").each(function(){
		if($(this).val()==''){
			i2++;
		}
	});
	if(i2){
		alert('请填写招聘人数'); return false;
	}

	$("select[name='c2[]']").each(function(){
		if($(this).val()==''){
			i3++;
		}
	});
	if(i3){
		alert('请选择职位类别'); return false;
	}

	$("input[name='addr[]']").each(function(){
		if($(this).val()==''){
			i4++;
		}
	});
	if(i4){
		alert('请填写工作地址'); return false;
	}

	$("input[name='mony[]']").each(function(){
		if($(this).val()==''){
			i5++;
		}
	});
	if(i5){
		alert('请填写职位薪资'); return false;
	}

	$("input[name='fzr[]']").each(function(){
		if($(this).val()==''){
			i6++;
		}
	});
	if(i6){
		alert('请填写负责人'); return false;
	}

	$("input[name='phone2[]']").each(function(){
		if($(this).val()==''){
			i7++;
		}
	});
	if(i7){
		alert('请填写联系方式'); return false;
	}

	$("input[name='mianshi[]']").each(function(){
		if($(this).val()==''){
			i8++;
		}
	});
	if(i8){
		alert('请填写面试地址'); return false;
	}

	$("textarea[name='yaoqiu[]']").each(function(){
		if($(this).val()==''){
			i9++;
		}
	});
	if(i9){
		alert('请填写职位要求'); return false;
	}


}

function isEmail(str){
	var reg = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$/;
	return reg.test(str);
}

function chk_user_edit(){
	var nicheng=$("input[name='nicheng']").val();
	var phone=$("input[name='phone']").val();
	var email=$("input[name='email']").val();
	if(nicheng==''){
		alert("昵称不能为空");
		return false;
	}
	var myreg = /^1[3|5|8]\d{9}$/;
    if(!myreg.test(phone)){
		alert("请输入有效的手机号码！");
		return false;
	}
	if(!isEmail(email)){
		alert("请输入正确的电子邮箱！");
		return false;
	}

}
