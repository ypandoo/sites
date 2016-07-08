<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<link rel="stylesheet" href="css/base.css" />
<title>注册</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>

<body>
	<header id="header" class="header-topbar">
		<a class="go-back" href="login.html"><img src="images/home.png"/></a>
		<h1 class="header-title">注册-个人信息</h1>
	</header>
	<div id="content" class="content-reg">
		<div class="reg-row">
			<div class="reg-row-border"><input type="text" id="user_name" placeholder="姓名" value=""/></div>
		</div>
		
		<div class="reg-row">
			<div class="reg-row-border"><input type="text" id="joyo_id" placeholder="卓越网帐号" value=""/></div>
		</div>
		
		<div class="reg-row">
			<div class="reg-row-border">
			<select id="department" placeholder="请选择捷豹或路虎" onChange="DepartmentChange(this.value)">
				<option value="请选择捷豹或路虎">请选择捷豹或路虎</option>
				<option value="路虎">路虎</option>
				<option value="捷豹">捷豹</option>
			</select>
			</div>
		</div>
		
		<div class="reg-row">
			<div class="reg-row-border">
			<select id="region" placeholder="请选择您所属大区" onChange="ProvinceChange(this.value)">
				<option value="请选择您所属大区">请选择您所属大区</option>
			</select>
			</div>
		</div>
		
		<div class="reg-row">
			<div class="reg-row-border">
			<select id="sales" placeholder="请选择经销商名称">
				<option value="请选择经销商名称">请选择经销商名称</option>
			</select>
			</div>
		</div>
		
		<div style="height:auto;line-height:20px;overflow:hidden;margin:0px 20px;margin-bottom:10px;color:#F00;display:none;" id="error-tip">提示</div>

		<div class="reg-row">
			<span id="submit-loading" class="submit" style="display: none;">正在验证...</span>
			<span id="submit-reg-next" class="submit">完成注册</span>
		</div>
	</div>	
	
<script src="js/bootstrap.js"></script>
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/jquery.touchSwipe.js"></script>
<script src="js/move.js"></script>
<script src="js/template.min.js"></script>
<script src="js/config.js"></script>
<script src="js/base.js"></script>
<script src="js/head.js"></script>
<script src="js/cookie.js"></script>


<script type="text/javascript">
$(document).ready ( function(){
	var site = sessionStorage.getItem("firstRegFinish");
	if(site === "T")
	{
		sessionStorage.removeItem("firstRegFinish");
		return;
	}
	else
	{
		window.location.href = "login.html";
	}
});
</script>

<script>

		$('#submit-reg-next').on('click', function(){
		
			//name checked
			var name = $('#user_name').val();
			var id = $('#joyo_id').val();
			var department = $('#department').val();
			var region = $('#region').val();
			var sales = $('#sales').val();	
			
			if(name == ''){
				errTip('请输入姓名');
				return false;
			}
			
			if(id == ''){
				errTip('请输入卓越网帐号');
				return false;
			}
			
			if(department == 0){
				errTip('请选择捷豹或路虎');
				return false;
			}
			
			if(region == 0){
				errTip('请选择您所属大区');
				return false;
			}
			
			if(sales == 0){
				errTip('请选择经销商名称');
				return false;
			}
			
			$('#submit-loading').show();
			$('#submit-reg-next').hide();
			
			//sessionStorage.mobile = $('#mobile').val();
			//sessionStorage.password = pass;
			var submit_data = {
				'phone' : sessionStorage.mobile,
				'pwd':sessionStorage.password,
				'name': name,
				'zhuoyue': id,
				'region': region,
				'dealer':sales,
				'department':department
			};
			/*$name = xss($_POST['name']);
			$zhuoyue   = xss($_POST['zhuoyue']);
			$department= xss($_POST['department']);
			$region   = xss($_POST['region']);
			$dealer= xss($_POST['dealer']);
			$phone   = xss($_POST['phone']);
			$pwd= xss($_POST['pwd']);*/
						
			$.post('reg_test.php', submit_data,
				function(data) {
					if(data && data.code == 0) {
						msgSendOk = true;
						//setGray();
						//errTip('注册成功');
						alert(data.msg);
						localStorage.mobile = sessionStorage.mobile;
						localStorage.jlrlogin = 1;
						setCookie("mobile", sessionStorage.mobile);
						sessionStorage.removeItem("mobile");
						sessionStorage.removeItem("password");
						window.location.href = "info.html";
						
					} else if (data && data.code != 0) {
						alert(data.msg);
						setGrayCss(0);
						$('#submit-loading').hide();
						$('#submit-reg-next').show();
					}
				},
				"json")	
						
		});

	function setGrayCss(flag) {
		if(1 == flag) {
			counter = 60;
			$(".btn-send").html("发送中...");
			$(".btn-send").addClass('reg-row-btn-gray');
		} else {
			counter = 0;
			$(".btn-send").removeClass('reg-row-btn-gray');
			$(".btn-send").html("发送验证码");
		}
	}


	function errTip(str){
		$('#error-tip').html(str).show();
		
	}
	
	function CleanOptions(selectId)
	{
		//clear all region data
		var obj = document.getElementById(selectId);  
        var selectOptions = obj.options;  
        var optionLength = selectOptions.length;  
        for(var i=1;i <optionLength;i++)  
        {  
            obj.removeChild(selectOptions[1]);  
        } 
	}
	
	function AddOption(selectId, text)
	{
		var x = document.getElementById(selectId);
		var option = document.createElement("option");
		option.text = text;
		option.value = text;
		x.add(option);
	}
	
	function DepartmentChange(department) {
		
		CleanOptions("region");
		CleanOptions("sales");
		
		if(department == "请选择捷豹或路虎")
		{
			return;
		}
	
		//Add new region
		var submit_data = {'department': department,};

		$.ajax({
		 url: 'query_region.php',
		 type: "POST",
		 data: submit_data,
		 dataType: "json",
		 async: false,
		 success:function(data) {
				 if(data.status == 1)
				{
					for (var i = 0; i < data.regionsize; i++)
					{
						AddOption("region", data["region"+i]);
					}
				}
				else{
					alert("读取信息错误！");
				}
			},
		 error:function(){
				alert("读取信息错误！");
			}
		 });
	}
	
	function ProvinceChange(region) {
		
		CleanOptions("sales");
		var department = $('#department').val();
		if(region == "请选择您所属大区" || department == "请选择捷豹或路虎")
		{
			return;
		}
	
		//Add new region
		var submit_data = {'department': department, 'region': region};

		$.ajax({
		 url: 'query_sales.php',
		 type: "POST",
		 data: submit_data,
		 dataType: "json",
		 async: false,
		 success:function(data) {
				 if(data.status == 1)
				{
					for (var i = 0; i < data.salessize; i++)
					{
						AddOption("sales", data["sales"+i]);
					}
				}
				else{
					alert("读取信息错误！");
				}
			},
		 error:function(){
				alert("读取信息错误！");
			}
		 });
	}
	
	
</script>
	
</body>
</html>