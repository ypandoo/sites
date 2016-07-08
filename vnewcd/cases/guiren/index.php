<?
session_start();
if(isset($_SESSION['userid']))
  $userid=$_SESSION['userid'];
else
{
	//换成自己的接口信息
	$appid = 'wx2394bd8a2d5a3ab2';
	header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://vnewcd.com/maidong/outh.php&response_type=code&scope=snsapi_userinfo&state=123&connect_redirect=1#wechat_redirect');
}

$userid =$_SESSION['userid'];
$pid = md5(uniqid(rand()));
/*$userid = 'oCCoMuKY5VY2v-w14jw6aBhxTlMo';*/

//lookup userid in data base, if exists just redirect to poster
/*require_once('vnewMysql.php');
$dbobj = new db_mysql;
$dbhost = 'qdm123993354.my3w.com:3306';
$dbuser = 'qdm123993354';
$dbpw = 'lei000lei';
$dbname='qdm123993354_db';
$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);
$sql = 'select * from `msl_maidong_poster` where `userid` = "'.$userid.'"';
$result = $dbobj->query($sql);
if(!empty($result) && $dbobj->num_rows($result) > 0)
{
	// direct to result page with userid
	header('location:result.php?userid='.$userid);
}*/
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
<title>拖延终结季,今天你拜拖了吗？</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<div id='wx_pic' style='margin:0 auto;display:none;'>
	<img src='logo.jpg' />
</div>
<style>
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
.submit {
color: #fff;
background-color: #00925f;
border-radius: 6px;
padding: 10px 0;
font-size: 18px;
text-align: center;
display: block;
margin: 0 0px 0px 0px;
cursor: pointer;
width: 100%;
position:absolute;
}

#des{
position: absolute;
top: 36%;
margin-left: 10%;
margin-right: 10%;
width: 80%;
text-align: center;
font-size: 25px;
font-weight: bold;
color: white;
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

.submit
{
	background-color: #BB2626;
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

#userinfo1 {
position:absolute;
width:320px;
height:300px;
z-index:15;
text-align:left;
background-size:100% 100%;
background-image: url(images/textbox.png);
font-family: "Microsoft YaHei", Droid Sans, Arial, Helvetica, sans-serif;
position: fixed;
top: 54%;
left: 50%;
margin-left: -160px;
margin-top: -150px;
text-shadow:0 0 0 #494949;
color:#03478B;
}

#userinfo2 {
position:absolute;
width:320px;
height:300px;
z-index:15;
text-align:left;
background-size:100% 100%;
background-image: url(images/textbox2.png);
font-family: "Microsoft YaHei", Droid Sans, Arial, Helvetica, sans-serif;
position: fixed;
top: 54%;
left: 50%;
margin-left: -160px;
margin-top: -150px;
text-shadow:0 0 0 #494949;
color:#03478B;
}

.inpK {
  margin-top: 35px;
  margin-left: 20%;
  width: 100%;
  text-align: left;
  height: 20px;
  line-height: 20px;
  font-size: 16px;
}

.inpK2 {
  margin-top:10px;
  margin-left: 20%;
  width: 100%;
  text-align: left;
  height: 20px;
  line-height: 20px;
  font-size: 16px;
}

.inpK3 {
  margin-top:10px;
  margin-left: 20%;
  width: 100%;
  text-align: left;
  height: 15px;
  line-height: 15px;
  font-size: 12px;
}

.nW1 .nW2{
  width: 120px;
  font-size: 15px;
}

.conS {
  width: 125px;
  border-bottom: 1px solid #38a9e1;
  /*border-radius: 5px;*/
  height: 20px;
  line-height: 20px;
  display: inline-block;
  overflow: hidden;
  background-color: transparent;
  background-size:100% 100%;
  /*background-image: url(images/select.png);*/
}

.select {
  width: 125px;
  height: 25px;
  line-height: 25px;
  border: 0;
  /*border-radius: 5px;*/
  font-size: 18px;
  text-align: center;
  overflow: hidden;
  color: #a9a9a9;
  background-color: transparent;
  outline: none;
  /*vertical-align: top;*/
  /*margin: -1px 0 0 -1px;*/
}

.inpTo {
  margin-top: 30px;
  margin-left: 20%;
  width: 58%;
  text-align: left;
  height: 25px;
  line-height: 25px;
  font-size: 18px;
  border-bottom: 1px solid #38a9e1;
}

.inpFrom {
  margin-top: 10px;
  margin-left: 20%;
  width: 58%;
  text-align: right;
  height: 25px;
  line-height: 25px;
  font-size: 18px;
  border-bottom: 1px solid #38a9e1;
}

.inpName {
  height: 25px;
  line-height: 25px;
  font-size: 17px;
  border: 0;
  color: rgb(8, 88, 168);
  width: 100%;
  font-family: "Microsoft YaHei";
}

.showText{
  height: 25px;
  line-height: 25px;
  font-size: 18px;
  font-weight: bold;
  width:100%;
  font-family:"Microsoft YaHei";
  text-align: left;
  margin-left: 20%;
  width:100%;
  margin-top:10px;
  margin-bottom: 0px;
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
	<!--div id="content">
		<input id="from" value="" width="100px"/>
		<input id="to" value="" width="100px"/>
		<button type="button" id="submit-content" >提交</button>
	</div-->
	
	<div style= "bottom: 50px; position: absolute; left:25%; width: 50%; text-align:center; ">
		<span><img src="images/confirm.png" height="35px" onclick="confirm(this)"></img></span>
	</div>	
	
	<div id = "userinfo1" style="">
		<div class="inpK">
                 <span><b>我赌上</b></span>
                 <div class="conS nW1">
				 <input class="select nW2" id="select1" placeholder="请输入挑战内容" maxlength="5"/>
                 </div>
        </div>
		<div class="inpK2">
				 <span><b>你</b></span>
                 <div class="conS nW1">
				 <input class="select nW2" id="select2" placeholder="请输入挑战内容" maxlength="5"/>
                 </div>
        </div>
		<div class="inpK2">
				 <span><b>赢不了我！</b></span>
        </div>
		<div class="inpK3">
				 <span><b>(例如:我赌上颜值,你减肥赢不了我!)</b></span>
        </div>
	</div>
	
	<div id = "userinfo2" style="display:none">
		<div class="inpTo">
		<input type="text" placeholder="(请输入被挑战者名字)" class="inpName" id="to"  maxlength="5"/>
        </div>
		<span ><p class="showText" id="text1">赌上</p></span>
		<span ><p class="showText" id="text2">不服来战</p></span>
		<div class="inpFrom">
		<input type="text" placeholder="(请输入挑战者名字)" class="inpName" id="from"  maxlength="5"/>
        </div>
	</div>
</body>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script>
	var first_time = 1;
	var text1='';
	var text2='';
	
	function confirm(e)
	{
		if(first_time)
		{
			var select1 = $('#select1').val();
			var select2 = $('#select2').val();
			if(select1 == '' || select1 == '0'){
				alert('亲，还有内容没填哦！');
				return false;
			}
			if(select2 == '' || select2 == '0'){
				alert('亲，还有内容没填哦！');
				return false;
			}
			text1 = '我赌上'+select1+',';
			text2 = '你'+select2+'赢不了我!';
			
			$('#text1').text(text1);
			$('#text2').text(text2);
			
			$('#userinfo1').hide();
			$('#userinfo2').show();
			first_time = 0;
			
		}
		else
		{
			var from = $('#from').val();
			var to = $('#to').val();
			if(from == '' ){
				alert('亲，战书还不完整哦！');
				return false;
			}
			if(to == '' ){
				alert('亲，战书还不完整哦！');
				return false;
			}
			var userid = "<?php echo $userid?>";
			var pid = "<?php echo $pid?>";
			var submit_data = {
					'userid': userid,
					'from': from,
					'to': to,
					'text1' : text1,
					'text2' : text2,
					'pid': pid
			};
			
			$.post('save_words.php', submit_data,
				function(data) {
					if(data.status == 1)
					{
						window.location.href = 'result.php?userid='+ userid+'&pid='+pid;
					}
					else{
						alert(data.msg);
					}
				},
				"json")	
		}
	}
</script>

</html>

