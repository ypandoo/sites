<?php

// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
    echo "mc init failed\n";
else
{
    $f=file_get_contents('func.php');
    memcache_set($mmc,"func.php", $f);
    //echo memcache_get($mmc,"func.php");
}
file_put_contents('saemc://func.php','');
require_once 'saemc://func.php';

//require_once 'func.php';
//require_once('config.php');

session_begin();
if (!isset($_SESSION['phone']) || !isset($_SESSION['pass'])) {
    jump('index.php');
}

?>

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
<title>往期答卷</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<script src="js/bootstrap.js"></script>
<script src="js/jquery-2.0.3.min.js"></script>
<script src="js/jquery.touchSwipe.js"></script>
<script src="js/move.js"></script>
<script src="js/template.min.js"></script>
<script src="js/config.js"></script>
<script src="js/base.js"></script>
<script src="js/head.js"></script>


</head>
<body>

	<header id="header" class="header-topbar">
		<a class="go-back" href="info.html"><img src="images/home.png"/></a>
		<h1 class="header-title">往期答卷</h1>
	</header>

<div id="content" class="content-login">
<br>
<?
//$link = conn_db();
$link = conn_db(); 

$phone = xss($_POST['phone']);
$pass = xss($_POST['pass']);

// init question list
$date=date('Y-m-d');  //当前日期
$w=date('w',strtotime($date));  //计算今天星期几
$now_start=date('Y-m-d',strtotime("$date -".($w ? $w - 1 : 6).' days'));
$weekdays=array();  //本周一至周五的日期
for($i=1;$i<6;$i++)
{
	$d=date('Y-m-d',strtotime("$date -".($w ? $w - $i : $w - $i+7).' days'));
	$weekdays[]=$d;
}
$i=0;
$state=array("未开始","未完成","已完成");
$weekarray=array("日","一","二","三","四","五","六");  
$paper='周'.$weekarray[$w].'答卷'; 

foreach($weekdays as $d)
{
	$expectDate=$d;
	$sql = "SELECT qid FROM question where que_date='$expectDate'";
	$ret=runquery($sql,$link);
	$qcount=mysql_num_rows($ret);  // 当日题目数

	$query = "SELECT uid FROM users WHERE phone='".$phone."' AND usr_passwd = '".$pass."'";
	$row=getaline($query,$link);
	$sql = "SELECT qid FROM answers where uid='".$row['uid']."' and que_date='$expectDate'";
	$ret=runquery($sql,$link);
	$acount=mysql_num_rows($ret);  // 该用户已经回答问题数
	
	$s=0;
	if($acount==$qcount)
	{
		$s=2;  //已完成
	}
	else if($acount>0)
	{
		$s=1;
	}
	else
	{
		$s=0;
	}
	$w=date('w',strtotime($d));
	$z=$weekarray[$w];
	$zt=$state[$s];
print <<<EOT
		<span id="submit-{$i}" class="submit" onclick="window.location.href='showque.php?qdate={$w}'">周{$z}答卷{$zt}</span> 
EOT;
	
}

?>
</div>
	
</body>

</html>