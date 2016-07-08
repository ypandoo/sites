<?
session_start();

//pid is empty, create a new page
if (!isset($_GET['pid']) || empty($_GET['pid']))
{
	//换成自己的接口信息
	$appid = 'wx2394bd8a2d5a3ab2';
	header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://vnewcd.com/guiren/outh.php?pid=&response_type=code&scope=snsapi_userinfo&state=123&connect_redirect=1#wechat_redirect');
}
else
{
	//now we have pid 
	$pid = $_GET['pid'];
	
	if(isset($_SESSION['pid']) && !empty($_SESSION['pid']))
	{
		$sid=$_SESSION['pid'];
		if($pid == $sid)
		{
			//showlist
			echo '<p>no pid -> create pid -> pid = sid</p>';
			
		}
		else
		{
			//lookup into data if found sid, show list
			
			//else calculate score
			//showlist
			echo '<p>pid != sid</p>';
		}
	}
	else
	{
		//no sid
		//换成自己的接口信息
		$appid = 'wx2394bd8a2d5a3ab2';
		header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://vnewcd.com/guiren/outh.php?pid='.$pid.'&response_type=code&scope=snsapi_userinfo&state=123&connect_redirect=1#wechat_redirect');
	}
}

//$userid = 'oCCoMuKY5VY2v-w14jw6aBhxTlMo';

//lookup userid in data base, if exists just redirect to poster
/*require_once('vnewMysql.php');
$dbobj = new db_mysql;
$dbhost = 'qdm123993354.my3w.com:3306';
$dbuser = 'qdm123993354';
$dbpw = 'lei000lei';
$dbname='qdm123993354_db';
$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);
$sql = 'select * from `guiren` where `wrotetoid` = "'.$pid.'"';
$result = $dbobj->query($sql);
if(!empty($result) && $dbobj->num_rows($result) > 0)
{
	//[0] => oCCoMuKY5VY2v-w14jw6aBhxTlMo [1] => 我赌上颜值, [2] => 他是 [3] => 你是 [4] => 你减肥赢不了我! [5] => Super Lei
	$result = $dbobj->fetch_row($result);
	//print_r($result);
	$from = $result[2];
	$to = $result[3];
	$text1 = $result[1];
	$text2 = $result[4];
}
else
{
	header('location:index.php');
}

/*echo "success";
$userid = "super Lei";*/
?>

<html>
<head>
<meta charset="utf-8">
<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta http-equiv="Access-Control-Allow-Origin" content="*">
<!--link rel="stylesheet" href="css/base.css" /-->
<title>脉动挑战</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<div id='wx_pic' style='margin:0 auto;display:none;'>
	<img src='logo.jpg' />
</div>
<style>
#userinfo2 {
  position: absolute;
  width: 300px;
  height: 280px;
  z-index: 15;
  text-align: left;
  background-size: 100% 100%;
  background-image: url(images/textbox3.png);
  font-family: "Microsoft YaHei", Droid Sans, Arial, Helvetica, sans-serif;
  position: fixed;
  top: 55%;
  left: 50%;
  margin-left: -150px;
  margin-top: -140px;
  text-shadow: 0 0 0 #494949;
  color: #03478B;
}

.showText{
  height: 25px;
  line-height: 25px;
  font-size: 18px;
  font-weight: bold;
  width:100%;
  font-family:"Microsoft YaHei";
  text-align: left;
  margin-left: 25%;
  width:100%;
  margin-top:2px;
  margin-bottom: 0px;
}

.showTextTop{
  height: 25px;
  line-height: 25px;
  font-size: 18px;
  width:100%;
  font-family:"Microsoft YaHei";
  text-align: left;
  margin-left: 20%;
  width:100%;
  margin-top:20px;
  margin-bottom: 0px;
}

.showTextBottom{
  height: 25px;
  line-height: 25px;
  font-size: 18px;
  width:100%;
  font-family:"Microsoft YaHei";
  text-align: right;
  margin-left: -20%;
  width:100%;
  margin-top:3px;
  margin-bottom: 0px;
}

body
{
	background: url('images/bg2.jpg') no-repeat center center fixed; 
	-webkit-background-size: 100% 100%;
	-moz-background-size: 100% 100%;
	-o-background-size: 100% 100%;
	overflow:hidden;
	color:#BB2626;
}

.sharemcover {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(0, 0, 0, 0.7);
		display: none;
		z-index: 20000;
		}
		
.submit:hover {
background: #018557;
}

</style>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?b4f21647e9b4bd03d127f71c865f423e";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</head>

<body>
	<!--div id = "userinfo2" style="">
        </div>
	</div>
	
	<div style= "bottom: 8px; position: absolute; left:25%; width: 50%; text-align:center; ">
			<div style="margin-bottom:10px"><span><img src="images/share_friends.png" height="35px" onclick="clickbutton(this)"></img></span></div>
			<span style="margin-top:20px"><a href="cover.html"><img src="images/again.png" height="35px"></img></a></span>
	</div>
	
	<div id="sharemcover0" class="sharemcover" style=" display:none;">
		<div style=""><img src="images/share.png" style="width:100%;"></div>
    </div-->
	
</body>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script>	
	/*function clickbutton(e)
	{
		$("#sharemcover0").show();
		_hmt.push(['_trackEvent', 'share', 'share']);
	}
	
	$("#sharemcover0").click(function () {
			$("#sharemcover0").hide();
			_hmt.push(['_trackEvent', 'share', 'share']);
	});
	document.title = "<? echo $to?>"+':'+"<? echo $text1?>"+"<? echo $text2?>"+"By-"+"<? echo $from?>";*/
</script>
</html>

