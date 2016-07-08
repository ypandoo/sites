<?php
// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
    echo "mc init failed\n";
else
{
    $f=file_get_contents('getquestions.php');
    memcache_set($mmc,"getquestions.php", $f);
    //echo memcache_get($mmc,"getquestions.php");
}
file_put_contents('saemc://getquestions.php','');
require_once 'saemc://getquestions.php';


// for local debug
//require_once('getquestions.php');
session_begin();
if (!isset($_SESSION['phone']) || !isset($_SESSION['pass'])) {
    jump('login.html');
}
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="description" content=""/>
    <meta name="keywords" content="速问速答"/>
    <title>速问速答</title>
	<script type="text/javascript" src="js/jquery-2.0.3.min.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/require.js" charset="UTF-8"></script>
	<script type="text/javascript" src="js/survey.js" charset="UTF-8"></script>
    <link rel="stylesheet" type="text/css" href="css/survey.css">
</head>
<script>
	$(document).ready ( function(){
	if(!localStorage.mobile || !localStorage.jlrlogin || localStorage.jlrlogin == 0)
	{
		sessionStorage.preTab = "todayque.php";
		window.location.href = "login.html";
	}
	
</script>
<script>
<?
	echo "window.page_config =".json_encode($page_config);
?>
</script>	
<body>
<div class="window">

    <div class="page-loading-mask"></div>

	<div class="pages">
		<div class="page home">
			<div class="page-content">
				<h1></h1>
				<div class="start"><div><span>开始</span></div></div>
			</div>
		</div>
		<div class="page result">
			<div class="page-content">
				<div class="score">
				</div>
				<p class="discription"></p>
			</div>
		</div>
	</div>
	
   <div class="share_overmask">
		<div class="share_arrow"></div>
		<div class="share_words"></div>
   </div>
   
</div>

 </body>
</html>