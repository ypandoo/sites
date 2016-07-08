<?php

$phone = $_REQUEST['phone'];
$bonus_score = 20;
$bonus_type  = '每日签到';

//数据库连接
$mysql = new SaeMysql();

//check if exist
$date =date("Y-m-d");
$sql = "select * from  `bonus` where `bonus_date` = '".$date."' AND `bonus_type` = '每日签到' AND `phone` = '".$phone."'";
$result = $mysql->getData($sql);
if($result)
{
	$json_arr =array('status'=>0,'msg'=>'您今天已经签过到啦!');
	$mysql->closeDB();
	echo json_encode($json_arr);
	exit;
}

//add bonus record
	//insert record to bonus
$bonus_date =date("Y-m-d");
$bonus_type = $_REQUEST['bonus_type'];
$bonus_score = 20;
$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";

if($mysql->runSql($sql))
{
	$mysql->closeDb();
	$msg_back =array('status'=>1,'msg'=>"签到成功!");
	echo json_encode($msg_back);
}
else
{
	$mysql->closeDb();
	$msg_back =array('status'=>0,'msg'=>"签到失败！");
	echo json_encode($msg_back);
}

?>