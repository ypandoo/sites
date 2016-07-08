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

//数据库连接
$link = conn_db();

$IsAllCorrect = true;
$score = 0;
$constAns = array("", "A", "B", "C", "D", "E", "F", "G", "H");

$test = "test";
for ($i= 0; $i < 5; $i++)
{
	$qid = $_REQUEST["qid".$i];
	$aid = $_REQUEST["aid".$i];// 1 to n for each  question
	$Answ = $constAns[$aid];
	$test = $test.$qid.$aid.$Answ;
	
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
		$test= $test."[T]";
		$score = $score + 20;
	}
	else
	{
		// has wrong answer
		$IsAllCorrect = false;
	}
}


if ($IsAllCorrect)
{
	$score = $score * 2;
}

$msg_back =array('score'=>$score,'msg'=>$test);
echo json_encode($msg_back);
/*$sql="select que_score FROM users WHERE phone='".$phone."'";
$row=runquery($sql,$link);
$score=intval($row['que_score']) + $score;  // 需要做一个公式规则计算总分(包含答题分数+签到分数+赞分)
$sql="UPDATE users SET que_score='".$score."' WHERE uid='".$row['uid']."'";
runquery($sql,$link);
	
$msg_back =array('score'=>$score,'msg'=>"答题结果成功保存导数据!");
echo json_encode($msg_back); */

?>