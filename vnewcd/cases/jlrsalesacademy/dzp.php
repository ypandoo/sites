<?php

$phone = $_REQUEST['phone'];
$bonus_score = $_REQUEST['bonus_score'];
$bonus_date =date("Y-m-d");
$bonus_type = $_REQUEST['bonus_type'];

if(!$phone)
{
	$msg_back =array('status'=>0,'msg'=>"帐号异常!请重新登陆！");
	echo json_encode($msg_back);
	exit;
}
//$bonus_type  = '大转盘';

//数据库连接
$mysql = new SaeMysql();

//check if 3 records
$sql = "SELECT count(*) from `bonus` WHERE `phone` = '".$phone."' AND `bonus_type` = '大转盘' AND `bonus_date` = '".$bonus_date."'";
$sum_access = $mysql->getVar($sql);
if($sum_access >= 3)
{
	$mysql->closeDB();
	$msg_back =array('status'=>3,'msg'=>"今日大转盘已达上限!");
	echo json_encode($msg_back);
	exit;
}

//insert record to bonus
$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
	$mysql->closeDb();
	$msg_back =array('status'=>0,'msg'=>"上传分数失败!");
	echo json_encode($msg_back);
	exit;
}
else
{
	$mysql->closeDb();
	$msg_back =array('status'=>1,'msg'=>"上传分数成功");
	echo json_encode($msg_back);
	exit;
}

?>