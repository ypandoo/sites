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
<title>个人积分</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
</head>
 

<body>
	<script>
		var phone = localStorage.mobile;
	</script>
	
	<header id="header" class="header-topbar">
		<a class="go-back" href="info.html"><img src="images/go_back.png"/></a>
		<h1 class="header-title">个人积分</h1>
	</header>
	
	<div id="content" class="content-userinfo">
		        <table id="table-jaguar" class="table table-bordered">
                <thead>
                    <tr>
                        <th data-dynatable-column="rank" class="dynatable-head"><a class="dynatable-sort-header" href="#">时间</a>
                        </th>
                        <th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">分数来源</a>
                        </th>
						<th data-dynatable-column="country" class="dynatable-head"><a class="dynatable-sort-header" href="#">得分</a>
                        </th>
                    </tr>
                </thead>
                <tbody>
					<?
						$mysql = new SaeMysql();
						$phone = "<script>document.write(phone);</script>";
						$sql = "select * from  `bonus` where `phone` = '". $phone."'";
						$sql2 = "select * from  `bonus` where `phone` = '1111'";
						echo $sql;
						echo $sql2;
						$data = $mysql->getData($sql);
						foreach($data as $row) 
						{
					?>
						<tr>
						<td style="text-align: left;"><?=$row['bonus_date']?></td>
						<td style="text-align: left;"><?=$row['bonus_type']?></td>
						<td style="text-align: left;"><?=$row['bonus_score']?></td>
						</tr> 
					<?
					}	
					?>
                </tbody>
            </table>
	</div>
	
	<script src="js/jquery-2.0.3.min.js"></script>
	<script src="js/jquery.touchSwipe.js"></script>
	<script type="text/javascript">
	$(document).ready ( function(){
		if(!localStorage.mobile || !localStorage.jlrlogin || localStorage.jlrlogin == 0)
		{
			sessionStorage.preTab = "personal_score.php";
			window.location.href = "login.html";
		}
	});
	</script>
	
</body>
</html>