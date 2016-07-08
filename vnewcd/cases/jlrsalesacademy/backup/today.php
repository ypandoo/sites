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
    jump('login.html');
}

// 判断是否周末, 周末不答卷
$week=date('w');

/* should be checked again
if($week==0)
{
	echo "<br/>周日不答卷,请下周一再来, <a href='index.php'>返回首页</a> <br/>";
}
else if($week==6)
{
	echo "<br/>周六不答卷,请下周一再来, <a href='index.php'>返回首页</a><br/>";
}
else
*/
{
	$link = conn_db();
	$today=date("Y-m-d");	
	$sql = "SELECT qid FROM question where que_date='$today'";
	$ret=runquery($sql,$link);
	$qcount=mysql_num_rows($ret); 
	if($qcount==0)
	{
		echo "<br/> 几天没有出题目哦, <a href='index.php'>返回首页</a><br/>";
	}
	else
	{
		// 显示今日答卷
		$weekarray=array("日","一","二","三","四","五","六");  
		$paper='星期'.$weekarray[$week].'答卷'; 
		// 判断今日答卷是否已经答完
		$query = "SELECT uid FROM users WHERE phone='".$phone."' AND usr_passwd = '".$pass."'";
		$row=getaline($query,$link);
		$sql = "SELECT qid FROM answers where uid='".$row['uid']."' and que_date='$today'";
		$ret=runquery($sql,$link);
		$acount=mysql_num_rows($ret); 
		if($qcount==$acount)
		{
			echo "<br/> 今日答卷已经完成, <a href='index.php'>返回首页</a><br/>";
		}
		else 
		{
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>快问快答比赛</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/page.css" />
<style type="text/css">
/*
#pagecount{margin:10px auto 2px auto; padding-bottom:20px; text-align:center}
#pagecount span{margin:4px; font-size:14px}
*/
</style>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
var curPage = 1; //当前页码
var total,pageSize,totalPage;
var queid, answer;
//获取数据
function getData(page){ 
	var pagenum;
	if(page<=totalPage) pagenum=page-1;
	$.ajax({
		type: 'POST',
		url: 'pages.php',
		data: {'pageNum':pagenum,'queid':queid,'answer': answer},
		dataType:'json',
		beforeSend:function(){
			$("#list ul").append("<li id='loading'>loading...</li>");
		},
		success:function(json){
			$("#list ul").empty();
			total = json.total; //总记录数
			pageSize = json.pageSize; //每页显示条数
			curPage = page; //当前页
			totalPage = json.totalPage; //总页数
			var li = "";
			var ti=page;
			var rel;
			var list = json.list;
			//处理下一题
			if(curPage<=totalPage)
			{			
				rel=(parseInt(curPage)+1);
				$.each(list,function(index,array){ //遍历json数据列
				li += "<li>"+(ti++)+"  ."+array['title']
				+"<br/><input rel='"+rel+"' type='radio' name='"+array['qid']+"' value='A'>"+array['A']+"</input>"
				+"<br/><input rel='"+rel+"' type='radio' name='"+array['qid']+"' value='B'>"+array['B']+"</input>"
				+"<br/><input rel='"+rel+"' type='radio' name='"+array['qid']+"' value='C'>"+array['C']+"</input>"
				+"<br/><input rel='"+rel+"' type='radio' name='"+array['qid']+"' value='D'>"+array['D']+"</input>"
				+"</li><br/>";			
				});
			}
			else
			{
				li="已经是最后一题,谢谢! <a href='index.php'>返回首页</a>";
			}
			$("#list ul").append(li);
		},
		complete:function(){ //生成分页条
			//页码大于最大页数
			if(curPage>totalPage) curPage=totalPage;
			//页码小于1
			if(curPage<1) curPage=1;
			getPageBar();
		},
		error:function(){
			alert("数据加载失败");
		}
	});
}

//获取分题条
function getPageBar(){
	//题码大于最大题数
	if(curPage>totalPage) curPage=totalPage;
	//题码小于1
	if(curPage<1) curPage=1;
	pageStr = "<span align='bottom'>"+curPage+"/"+totalPage+"</span>";
	//pageStr = "<span>"+curPage+"/"+totalPage+"</span>";
		
	$("#pagecount").html(pageStr);
}

$(function(){
	getData(1);
	$("#list ul li input").live('click',function(){
		var rel = $(this).attr("rel");
		if(rel){
			queid= $(this).attr("name");
			answer= $(this).attr("value");
			getData(rel);
		}
	});
});
</script>
</head>

<body>

<div align='center' style="margin:10px auto 2px auto; padding-bottom:20px; text-align:center">
<table align='center'>
<tr>
<td><span><?echo $paper;?> </span></td> <td id="pagecount"> </td>
</tr>
</table>
</div>

<div align='center' id="list">
	<ul></ul>
</div>

<div align='center' style="margin-top:30px;"><a href='index.php'>返回首页</a></div>
<div align="center" style="margin-top:30px;">Copyright PataApp Studio 2015</div>

</body>
</html>
<? 
	}
	}
}
?>