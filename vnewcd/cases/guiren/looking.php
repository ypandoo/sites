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
	
	//
	require_once('vnewMysql.php');
	$dbobj = new db_mysql;
	$dbhost = 'qdm123993354.my3w.com:3306';
	$dbuser = 'qdm123993354';
	$dbpw = 'lei000lei';
	$dbname='qdm123993354_db';
	$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);
	$sql = 'select * from `guiren_user` where `userid` = "'.$pid.'"';
	$result = $dbobj->query($sql);
	//print_r($sql);
	if(!$result || $dbobj->num_rows($result) <= 0)
	{
		//换成自己的接口信息
		$appid = 'wx2394bd8a2d5a3ab2';
		header('location:https://open.weixin.qq.com/connect/oauth2/authorize?appid='.$appid.'&redirect_uri=http://vnewcd.com/guiren/outh.php?pid=&response_type=code&scope=snsapi_userinfo&state=123&connect_redirect=1#wechat_redirect');
	}
	
	$result = $dbobj->fetch_row($result);
	$nickname = $result[1];
	$picurl = $result[2];
	$justshow = 0;
	//echo '<p>'.$nickname.'</p>';
	//echo '<img src="'.$picurl.'” height="64px" width="64px"/>';
	
	//echo $nickname.$picurl;
	if(isset($_SESSION['pid']) && !empty($_SESSION['pid']))
	{
		$sid=$_SESSION['pid'];
		//print_r('sid='.$sid.'   ----   pid='.$pid);
		if($pid == $sid)
		{
			$justshow = 1;
			//showlist
			//echo '<p>no pid -> create pid -> pid = sid</p>';
			
		}
		else
		{
			//lookup into data if found sid, show list
			$sql = 'select * from `guiren_score` where `ownerid` = "'.$pid.'" and `toid` ="'. $sid.'"';
			$result = $dbobj->query($sql);
			//print_r($sql.$result.$dbobj->num_rows($result));
			if(empty($result) || $dbobj->num_rows($result) <= 0 || !$result)
			{
				$justshow = 0;
				//calculate
			}
			else
			{
				$justshow = 1;
			}
			//print_r('justshow='.$justshow);
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
<title>水逆已过! 是时候寻找下半年的转运星了!我!要!转!运!</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<div id='wx_pic' style='margin:0 auto;display:none;'>
	<img src='logo.jpg' />
</div>

<style>
#userinfo {
  position: absolute;
  width: 220px;
  height: 300px;
  z-index: 15;
  text-align: left;
  background-size: 100% 100%;
  background-image: url();
  font-family: "Microsoft YaHei", Droid Sans, Arial, Helvetica, sans-serif;
  position: fixed;
  top: 40%;
  left: 50%;
  margin-left: -110px;
  margin-top: -150px;
  /*text-shadow: 0 0 0 #494949;
  color: #03478B;*/
  background-color: rgb(255, 210, 210);
  border-radius: 20px;
}


#tips {
  position: absolute;
  width: 80px;
  height: 40px;
  z-index: 15;
  text-align: left;
  background-size: 100% 100%;
  background-color: white;
  font-family: "Microsoft YaHei", Droid Sans, Arial, Helvetica, sans-serif;
  position: fixed;
  top: 50%;
  left: 50%;
  margin-left: -40px;
  margin-top: -20px;
  /*text-shadow: 0 0 0 #494949;
  color: #03478B;*/
}

html, body
{
	 font-family: "Microsoft YaHei", Droid Sans, Arial, Helvetica, sans-serif;
	background: url('images/bg2.jpg') no-repeat center center fixed; 
	-webkit-background-size: 100% 100%;
	-moz-background-size: 100% 100%;
	-o-background-size: 100% 100%;
	overflow:hidden;
	/*color:#BB2626;*/
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

.head
{
	display:inline-block;
	width: 23%;
	height: 64px;
	text-align: center;
	vertical-align: middle; 
}

.text
{
	display:inline-block;
	width: 48%;
	height: 64px;
	text-align: center;
	vertical-align: middle; 
}

.score
{
	display:inline-block;
	width: 23%;
	height: 64px;
	text-align: center;
	font-size: 30px;
	padding: 0;
	vertical-align: middle; 
	line-height: 64px;
	color: rgb(208, 29, 29);
}

li
{
	border-bottom: 1px rgba(231, 82, 96, 0.05) solid;
	border-top: 1px rgba(231, 82, 96, 0.05) solid;
	padding: 0;
	  list-style: none;
}

ul
{
	list-style: none;
	padding: 0;
	margin:0px;
	width:100%;
}

p {
  display: block;
  -webkit-margin-before: 2px;
  -webkit-margin-after: 2px;
  -webkit-margin-start: 0px;
  -webkit-margin-end: 0px;
  font-size:14px;
  /*text-shadow: 1px 1px 1px #EBC3C3;*/
  color: rgb(221, 74, 74);
  
}

#pname
{
	font-size: 16px;
	padding: 5px 0 0 0;
	font-weight: bold;
	color:rgb(208, 29, 29);
	
}

#ptext, #ptext2
{
	padding: 0 0 0 5px;
	font-size: 13px;
}

#box_title p
{
	text-align:center;
	margin-top: 20px;
	font-size: 25px;
	font-weight: bold;
}

#userinfo p
{
	text-align:left;
	margin-top: 10px;
	margin-left: 15%;
	font-size: 16px;
}

#total p
{
	margin-top: 20px;
	font-size: 18px;
	font-weight: bold;
}

#health , #love , #career  , #public, #study
{
	font-size: 18px;
	color: rgb(221, 74, 74);
}

.listcontent
{
	padding: 5 0 0 0;
}

.color0
{
	
}

.color1
{
	color:rgb(186, 74, 221);
}

.color2
{
	color:rgb(224, 79, 200);
}
.color3
{
	color:rgb(46, 202, 60);
}
.color4
{
	color:rgb(255, 0, 0);;
}
.color5
{
	color:rgb(255, 110, 50);
}

</style>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?59b0c7a6d98bc64bc9102e0f40698474";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>



</head>

<body>
	<!--div id = "userinfo2" style="">
        </div>
	</div-->
	<div>
		<a href="http://vnewcd.com/mobi/adv.html"><img src="images/title.png" width="100%"></img></a>
	</div>
	
	<div style= "  text-align: center; height: 80px; margin-top: 10px; margin-bottom:10px">
			<span style="height:80px; display:inline-block; width:30%; text-align:center; vertical-align:middle">
				<div style="width:100%; height:80px; text-align:center">
				<p><img src="<?=$picurl?>" height="64px" onclick="" style="padding:0px 0 0 0;"></img></p>
				<p><?=$nickname?></p>
				</div>
			</span>
			<span style="height:80px; display:inline-block; width:66%; vertical-align:middle">
				<div style="width:100%; height:80px; background-image:url(images/textbox.png); background-size: 100% 100%;">
				<p id="pname"><?=$nickname?>:</p>
				<p id="ptext">您还没找到自己的转运星!</p>
				<p id="ptext2">转发朋友圈,让小伙伴为您转运！</p>
				</div>
			</span>
			<!--span style="margin-top:20px"><p></p></span-->
	</div>
	
	<div style="width:100%;height:60px; margin-top:10px; margin-bottom:10px">
		<span style="display:inline-block; width:100%; text-align:center"><img src="images/zhuanyun.png" height="60px" onclick="zhuanyun(this)"></img></span>
		<!--span style="display:inline-block; width:48%; text-align:center"><img src="images/sharefriend.png" height="33px" onclick="share(this)"></img></span-->
	</div>
	
	<div style="margin-bottom:5px; margin-top:10px">
		<a href="http://vnewcd.com/mobi/adv.html"><img src="images/split.png" width="100%"></img></a>
	</div>
	
	<div id="calscore" class="sharemcover" style=" display:none;">
		<div id="userinfo" >
		    <span id=""><p style="font-size:22px; font-weight:bold; text-align:center; margin-left:0px">转运分计算</p></span>
			<p id="span6" style="font-weight:bold; text-align:center;margin-left:0">
				<span id="total" style="font-size:50px">0</span>
			</p>
			<p id="span1">星座合盘: <span id="health"></span></p>
			<p id="span2" style="display:none">生肖合盘: <span id="love"></span></p>
			<p id="span3" style="display:none">生日合盘: <span id="career"></span></p>
			<p id="span4" style="display:none">上升星座: <span id="public"></span></p>
			<p id="span5" style="display:none">昵称拆解: <span id="study"></span></p>
		</div>
	</div>
	
	<ul id = "words">
	</ul>
	
	<div style="margin-top:10px; text-align:center">
		<a href="http://vnewcd.com/mobi/adv.html"><img src="images/vnewwechat.png" width="100%"></img></a>
	</div>
	
	<div id="sharemcover0" class="sharemcover" style=" display:none;">
		<div style=""><img src="images/share.png" style="width:100%;"></div>
    </div>
	
	<div id="tip1" class="sharemcover" style=" display:none;">
		<div style="margin-top: 30%; width: 80%; margin-left: 10%;"><img src="images/tip.png" style="width:100%;"></div>
    </div>

</body>

<script type="text/javascript" src="js/vnewbase.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/countUp.js"></script>

<script type="text/javascript">
	function writeNext(i, range, control, type, speed )
	{
		if(i >= range - 1)
			return;
			
		//$("#health").html("#"+control);
		$("#"+control).html('<p>'+type+i+'</p>');
		setTimeout(function()
		{
			writeNext(i + 1, range, control, type, speed);

		}, speed);
	}
	
	$(document).ready ( function(){
		var justshow = parseInt(<? echo $justshow?>);
		
		//$("#health").html('justshow: '+ justshow);
		if(justshow == 1)
		{
			showlist();
		}
		else
		{
			$("#tip1").show();	
		}
	});
	
	function showlist()
	{
		var submit_data = {'ownerid': "<?echo $pid?>"
			};
		
		//alert(dump(submit_data));
		$.ajax({
         url: 'query_words.php',
         type: "POST",
         data: submit_data,
         dataType: "json",
         success:function(data) {
			
				//change json
				//alert(dump(data));
				var total = 0;
				for(var i = 0; i < data.length; ++i)
				{
					/*
					<li>
						<span id="headid" class ="head"> <img src="images/share.png" width="60px" height="60px"></img></span>
						<span id= "textid" class ="text"><p>nickname<br>学业</p> </span>
						<span id= "scoreid" class ="score">99</span>
					</li>*/
					if(i == 0 && parseInt(data[i]['score']) > 50)
					{
						$('#pname').text(data[i]['usernick']);
						$('#ptext').text ('你站住不要跑！(⊙０⊙)');
						$('#ptext2').text ('你就是我在寻找的转运星❤！');
					}
					else if(i == 0)
					{
						$('#ptext').text ('缘分未到(┬＿┬)');
						$('#ptext2').text ('');
					}
					
					var text_color = " color" + parseInt(data[i]['color']);

					var link = 'looking.php?pid='+data[i]['userid'];
					var content = '<span id="headid" class ="head"><a href="'+ link +'"><img src="'+data[i]['userpic']+'" width="50px" height="50px" style="padding: 7 0 0 0"/></span>';
					content += '<span id= "textid" class ="text"><div class="listcontent"><p class="listname"><b>';
					content += data[i]['usernick'] + '</b><p class="listwords ' + text_color + '">'+ data[i]['words']+'</p> </div></span>';
					content += '<span id= "scoreid" class ="score">'+ data[i]['score'] + '</span>';
					
					var li = document.createElement('li');
					li.innerHTML = content;
					document.querySelector('#words').appendChild(li);
				}
			},
		 error:function(){
				alert("读取信息错误！");
				return;
			}
         });
	}
	
	function zhuanyun()
	{
		var sid = "<?echo $sid?>";
		var pid = "<?echo $pid?>";
		if(sid == pid)
		{
			alert("当前正在您的转运页面！转发到朋友圈寻找您的转运星吧！");
			return;
		}
		window.location.href = "looking.php?pid="+sid;
	}
	
	$("#sharemcover0").click(function () {
			$("#sharemcover0").hide();
			//_hmt.push(['_trackEvent', 'share', 'share']);
	});
	
	function share()
	{
		var sid = "<?echo $sid?>";
		var pid = "<?echo $pid?>";
		if(sid != pid)
		{
			alert('记得要先点“前往我的转运页面”哦！');
			return;
		}
		$("#sharemcover0").show();
		
	}

	var total_score = 0, total_score_sum = 0;
	var range1, range2, range3, range4, range5;
	$("#tip1").click(function () {
			$("#tip1").hide();
			$("#calscore").show();
			 range1 = randomRange(1,20);
			 range2 = randomRange(1,20);
			 range3 = randomRange(1,20);
		     range4 = randomRange(1,20);
			 range5 = randomRange(1,20);
			total_score = range1+range2+range3+range4+range5;
			var words = '缘分未到(┬＿┬)';
			var words_arr = ['事业转运星❤','学习转运星❤','恋爱转运星❤','健康转运星❤','人际转运星❤'];
			var color = 5;
			if(total_score > 50)
			{
				var color = randomRange(0, 4);
				words = words_arr[color];
			}
			var submit_data={'ownerid' : "<?echo $pid?>", 
                             'toid': "<?echo $sid?>",
							 'score': total_score,
							 'words': words,
							 'color': color}; 
						
            setTimeout(function () {
                // 发送到后端
                $.ajax({ type: 'POST', 
                        url: "save_words.php", 
                        data: submit_data, 
                        success: function(data) 
						        {
									showlist();
								},
                        complete: function() {}, 
                        error:function(){
						alert("网页发生错误");
						}, 
                        dataType: "json" });
            }, 1000);
			
			var numAnim = new countUp("health", 0, range1);
			numAnim.start(calllove);
			total_score_sum += range1;
			var numAnim_sum = new countUp("total", 0, range1);
			numAnim_sum.start();
			//numAnim.start(calllove());
			//_hmt.push(['_trackEvent', 'share', 'share']);
			/*var range1 = randomRange(1, 20);
			var score = 0;
			writeNext(0, range1, "health", "星座匹配程度: ", 1);
			var range2 = randomRange(1, 20);
			score = 0;
			setTimeout(function () {writeNext(0, range2, "love", "生日相冲分析: ", 1);}, 1000);
			var range3 = randomRange(1, 20);
			score = 0;
			setTimeout(function () {writeNext(0, range3, "career", "名字拆解解析: ", 1);}, 1000);
			var range4 = randomRange(1, 20);
			score = 0;
			setTimeout(writeNext(0, range4, "public", "上升星座分析: ", 1), 1000);

			var total = parseInt(range1) + parseInt(range2) +parseInt(range3) +parseInt(range4);
			var submit_data={'ownerid' : "<?echo $pid?>", 
                             'toid': "<?echo $sid?>",
							 'score': total}; 
						
            setTimeout(function () {
                // 发送到后端
                $.ajax({ type: 'POST', 
                        url: "save_words.php", 
                        data: submit_data, 
                        success: function(data) 
						        {
								},
                        complete: function() {}, 
                        error:function(){
						alert("网页发生错误");
						}, 
                        dataType: "json" });
            }, 1000);
			
			setTimeout(function () {writeNext(0, total, "total", "转运指数:", 50);}, 3000);*/
	});
	
	function calllove()
	{
		$("#span2").show();
		
		var numAnim2 = new countUp("love", 0, range2);
		numAnim2.start(callcareer);
		
		var numAnim2_sum = new countUp("total", total_score_sum, total_score_sum+range2);
		total_score_sum += range2;
		numAnim2_sum.start();
	}
	
	function callcareer()
	{
		$("#span3").show();
		var numAnim3 = new countUp("career", 0, range3);
		numAnim3.start(callpublic);
		
		var numAnim3_sum = new countUp("total", total_score_sum, total_score_sum+range3);
		total_score_sum += range3;
		numAnim3_sum.start();
	}
	
	function callpublic()
	{
		$("#span4").show();
		var numAnim4 = new countUp("public", 0, range4);
		numAnim4.start(callstudy);
		
		var numAnim4_sum = new countUp("total", total_score_sum, total_score_sum+range4);
		total_score_sum += range4;
		numAnim4_sum.start();
	}
	
	function callstudy()
	{
		$("#span5").show();
		var numAnim5 = new countUp("study", 0, range5);
		numAnim5.start(finishcal);
		
		var numAnim5_sum = new countUp("total", total_score_sum, total_score_sum+range5);
		total_score_sum += range5;
		numAnim5_sum.start();
	}
	
	function calltotal()
	{	
		$("#span6").show();
		var numAnim6 = new countUp("total", 0, total_score);
		numAnim6.start(finishcal);
	}
	
	function finishcal()
	{
		$("#calscore").hide();
		//showlist();
	}
</script>
</html>

