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
if (!isset($_SESSION['phone'])|| !isset($_SESSION['pass'])){
	jump('login.html');
}
$link = conn_db();

// 更新答案
$queid=intval($_POST['queid']);
$uid=intval($_POST['uid']);
$answer=xss($_POST['answer']);
$today=date("Y-m-d");	
if(!empty($queid)&&!empty($answer))
{
	// 记录用户答案
	$sql="Replace INTO answers (qid, uid, anwser, que_date) VALUES ('".$queid."', '".$uid."', '".$answer."', '".$today."')";
	runquery($sql,$link);
	
	// 答题正确则更新分数
	$sql="SELECT * FROM question where qid='".$queid."'";
	$row=runquery($sql,$link);
	if(strtoupper(trim($row['que_answer']))==strtoupper(trim($answer)))
	{
		$sql="select que_score from users where uid='".$uid."'";
		$row=runquery($sql,$link);
		$score=intval($row['que_score'])+20;  // 需要做一个公式规则计算总分(包含答题分数+签到分数+赞分)
		$sql="UPDATE users SET que_score='".$score."' WHERE uid='".$uid."'";
		runquery($sql,$link);
	}
}

// 准备显示下一题
$page = intval($_POST['pageNum']);
$sql = "SELECT * FROM question where que_date='$today' ";
$result = runquery($sql,$link);
$total = mysql_num_rows($result);//总记录数

$pageSize = 1; //每页显示数
$totalPage = ceil($total/$pageSize); //总页数

$startPage = $page*$pageSize;
$arr['total'] = $total;
$arr['pageSize'] = $pageSize;
$arr['totalPage'] = $totalPage;
$sql = "SELECT * FROM question where que_date='$today' limit $startPage,$pageSize";
$query = runquery($sql,$link);
while($row=mysql_fetch_array($query)){
$qid=$row["qid"];
$title=$row['que_name'];
$sql = "SELECT * FROM options where qid='$qid'limit 1";
$option=runquery($sql,$link);
$qrow=mysql_fetch_array($option);
	 $arr['list'][] = array(
		'qid'=>$qid,
		'title' =>$title,
		'A' =>$qrow["A"],
		'B' =>$qrow["B"], 
		'C' =>$qrow["C"], 
		'D' =>$qrow["D"], 
	 );
}
//print_r($arr);
echo json_encode($arr);

/////////////////////////////////////////
?>