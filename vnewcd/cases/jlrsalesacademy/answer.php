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

session_begin();
if (!isset($_SESSION['phone'])|| !isset($_SESSION['pass'])){
	jump('login.html');
}
$uid = (int)xss($_POST['uid']);
$qid = (int)xss($_POST['qid']);
$key = xss($_POST['key']);
$que_score=xss($_POST['que_score']);
$time = date("Y-m-d h:i:s",time());

$link = conn_db();
$query = "SELECT que_answer FROM question WHERE qid='".$qid."'";
$ret = runquery($query,$link);
$row = getresult($ret);
$right = $row['que_answer'];

//更新用户分数if
if ($right == $key){
$sql="select usr_score from users where uid='$uid'";
$user=runquery($sql, $link);
$score=$user['usr_score']+$que_score;
$sql="UPDATE users SET usr_score='$score' WHERE uid='$uid'";
$ret = runquery($sql, $link);
if(!$ret){
	echo "答案分数失败";
	closedb($link);
	exit;
}
}

// 更新用户答案
$sql = "INSERT INTO usr_ques (qid,uid,fin_time,usr_answer)values('".$qid."','".$uid."','".$time."','".$key."')";
$ret = runquery($sql, $link);
if(!$ret){
	echo "答案更新失败";
	closedb($link);
	exit;
}
closedb($link);
/*
if ($right == $key){
	$sql = "INSERT INTO usr_ques (qid,uid,fin_time)values('".$qid."','".$uid."','".$time."')";
	$ret = runquery($sql, $link);
	if(!$ret){
		echo "答案更新失败";
		closedb($link);
		exit;
	}
	closedb($link);
}else{
	alert('答案不正确，请继续答题');
}
*/
goback();
?>