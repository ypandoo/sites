<?php

$phone = $_REQUEST['phone'];

//数据库连接
$mysql = new SaeMysql();

$IsAllCorrect = true;
$constAns = array("", "A", "B", "C", "D", "E", "F", "G", "H");

for ($i= 0; $i < 10; $i++)
{
	$qid = $_REQUEST["qid".$i];
	$aid = $_REQUEST["aid".$i];// A B C D
	$Answ = $constAns[$aid];
	
	// update score
	$sql="SELECT * FROM fastquestion where qid='".$qid."'";
	$result=$mysql->getData($sql);
	if(strtoupper(trim($result[0]['que_answer']))==strtoupper(trim($Answ)))
	{
	}
	else
	{
		// has wrong answer
		$IsAllCorrect = false;
	}
}

//add bonus record
if ($IsAllCorrect)
{
	//insert record to bonus
	$bonus_date =date("Y-m-d");
	$bonus_type = $_REQUEST['bonus_type'];
	$bonus_score = 20;
	$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."')";
	$mysql->runSql($sql);
	$mysql->closeDb();
	$msg_back =array('score'=>$bonus_score,'msg'=>"答题结果成功保存导数据!");
	echo json_encode($msg_back);
}
else
{
	$msg_back =array('score'=>0,'msg'=>"未能完成答题!请再接再厉！");
	echo json_encode($msg_back);
}

?>