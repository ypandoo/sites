<?php
// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
    echo "mc init failed\n";
else
{
    $f=file_get_contents('getquestions.php');
    memcache_set($mmc,"getquestions.php", $f);
}
file_put_contents('saemc://getquestions.php','');
require_once 'saemc://getquestions.php';


// for local debug
//include_once('getquestions.php');
//echo "window.page_config =".json_encode($page_config);
?>
<html>
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
    <meta name="description" content=""/>
    <meta name="keywords" content="速问速答"/>
    <title>速问速答</title>
      <link rel="stylesheet" type="text/css" href="css/survey.css">
	  <script>
	  $(document).ready ( function(){
		//get current ip 
		var ip = ILData[0];
		var submitData = {ip: ip};
		$.post('confirm_ip.php?ac=acw', submitData,
				function(data) 
				{
					//out of date
					if (data.outofdate == true) 
					{
						window.location.href = 'http://vnew.sinaapp.com/yinzuo/xuanchuan/event.html'; 
						return;
					} 
					
					if (data.success == false) 
					{
						$("#scratchpad").hide();
						$("#try_today").html("您今日共有"+data.limit+"次刮奖机会，今日机会已用完");
						return;
					} 
					else 
					{
						$("#try_today").html("您今日共有"+data.limit+"次刮奖机会，已使用" + data.times + "次.");
						return;
					}
				},
				"json")
	});
	</script>
	  
   </head>
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
					<b>60</b>
					<span>你的<i>geek</i>指数</span>
				</div>
				<p class="discription"></p>
				<ul class="options">
					<li><span class="share">给好友看看</span></li>
					<li>再玩一次</li>
					<li>点击进入微信公众号</li>
				</ul>
			</div>
		</div>
	</div>
	
   <div class="share_overmask">
		<div class="share_arrow"></div>
		<div class="share_words"></div>
   </div>
   
</div>


<script>
<?
echo "window.page_config =".json_encode($page_config);
?>
</script>
  <script type="text/javascript" src="js/require.js" charset="UTF-8"></script>
   <script type="text/javascript" src="js/survey.js" charset="UTF-8"></script>
 </body>
</html>