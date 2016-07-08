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
<title>本周成绩</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
 

<body>
	<header id="header" class="header-topbar">
		<a class="go-back" href="info.html"><img src="images/go_back.png"/></a>
		<h1 class="header-title">本周成绩</h1>
	</header>
	
	<div id="content" class="content-userinfo">
		<div id="user-info" class="user-body">
			<ul>
				<li>
					<div>
						<span class="info-left">姓名</span>
						<span class="info-right" id="name">正在读取中...</span>
					</div>
				</li>
				
				<li>
					<div>
						<span class="info-left">卓越网帐号</span>
						<span class="info-right" id="joyo">正在读取中...</span>
					</div>
				</li>
				
				<li>
					<div>
						<span class="info-left">所属大区</span>
						<span class="info-right" id="region">正在读取中...</span>
					</div>
				</li>
				
				<li>
					<div>
						<span class="info-left">所属经销商</span>
						<span class="info-right" id="sales">正在读取中...</span>
					</div>
				</li>
				
				<li>
					<div>
						<span class="info-left">电话号码</span>
						<span class="info-right" id="phone">正在读取中...</span>
					</div>
				</li>
				
				<li id="change-pass">
					<div class="userinfo-password">
						<span class="info-left">密码修改</span>
						<span class="info-right">点击修改密码</span>
					</div>
				</li>
				
			</ul>
		</div>
	</div>
	
	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/jquery.touchSwipe.js"></script>
	<script type="text/javascript">
	$(document).ready ( function(){
		if(!localStorage.mobile || !localStorage.jlrlogin || localStorage.jlrlogin == 0)
		{
			sessionStorage.preTab = "personal_info.html";
			window.location.href = "login.html";
		}
						
		var submit_data = {
				'phone' : localStorage.mobile
				//'name' : localStorage.name
			};
			/*$name = xss($_POST['name']);
			$zhuoyue   = xss($_POST['zhuoyue']);
			$department= xss($_POST['department']);
			$region   = xss($_POST['region']);
			$dealer= xss($_POST['dealer']);
			$phone   = xss($_POST['phone']);
			$pwd= xss($_POST['pwd']);*/
						
			$.post('query_personal_info.php', submit_data,
				function(data) {
					if(data && data.code == 0) {
						$("#name").html(data.name);
						$("#joyo").html(data.joyo);
						$("#region").html(data.region);
						$("#sales").html(data.sales);
						$("#phone").html(localStorage.mobile);
						
						//window.location.href = "info.html";
						
					} else if (data && data.code != 0) {
						alert(data.msg);
					}
				},
				"json")	
	});
	</script>

	<script>
		$('#change-pass').on('click',function(){
			window.location.href = "changepassword.html";
		});

	</script>
	
</body>
</html>