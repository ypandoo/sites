<?php
// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
{
	echo "mc init failed\n";
}
else
{
    $f=file_get_contents('func.php');
    memcache_set($mmc,"func.php", $f);
    //echo memcache_get($mmc,"func.php");
}
file_put_contents('saemc://func.php','');
require_once 'saemc://func.php';

session_begin();

$phone = $_REQUEST['phone'];

//数据库连接
$link = conn_db();

$IsAllCorrect = true;
$score = 0;
$constAns = array("", "A", "B", "C", "D", "E", "F", "G", "H");


for ($i= 0; $i < 5; $i++)
{
	$qid = $_REQUEST["qid".$i];
	$aid = $_REQUEST["aid".$i];// 1 to n for each  question
	$Answ = $constAns[$aid];
	
	// 查找qid
	$sql = "SELECT que_date FROM `question` where qid='".$qid."'";
	$quest=getaline($sql,$link);
	
	// find uid
	$sql = "SELECT uid FROM users WHERE phone='".$phone."'";
	$user=getaline($sql,$link);
	
	// add answers
	$sql="insert INTO answers (qid, uid, anwser, que_date) VALUES ('".$qid."', '".$user['uid']."', '".$Answ."', '".$quest['que_date']."')";
	runquery($sql,$link);
	
	// update score
	$sql="SELECT * FROM question where qid='".$qid."'";
	$row=getaline($sql,$link);
	if(strtoupper(trim($row['que_answer']))==strtoupper(trim($Answ)))
	{
		$score = $score + 20;
	}
	else
	{
		// has wrong answer
		$IsAllCorrect = false;
	}
}

$bonus_score = $score;
if ($IsAllCorrect)
{
	$bonus_score = $bonus_score * 2;
}

$sql = "SELECT * FROM users WHERE phone='".$phone."'";
$row=getaline($sql,$link);
$score_db = intval($row['que_score']) + $score;  // 需要做一个公式规则计算总分(包含答题分数+签到分数+赞分)
$sql="UPDATE `users` SET que_score='".$score_db."' WHERE uid='".$row['uid']."'";
runquery($sql,$link);
closedb($link);

//insert 2 records
$mysql = new SaeMysql();
$bonus_date =date("Y-m-d");
$bonus_type = '每日答题';
$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `daily_score`, `bonus_date`, `bonus_neg`) VALUES('".$phone."','".$bonus_type."','".$score."','".$bonus_date."', 0)";
$mysql->runSql($sql);


$bonus_type = '答题赠送积分';
$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
$mysql->runSql($sql);

$mysql->closeDb();

$msg_back =array('score'=>$score,'msg'=>"答题结果成功保存导数据!");
echo json_encode($msg_back);

?>