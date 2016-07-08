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
$sql = "SELECT count(*) from `bonus` WHERE `phone` = '".$phone."' AND `bonus_type` = '快问快答' AND `bonus_date` = '".$bonus_date."'";
$sum_access = $mysql->getVar($sql);
if($sum_access >= 3)
{
	$mysql->closeDB();
	$msg_back =array('status'=>3,'msg'=>"今日已达上限!");
	echo json_encode($msg_back);
	exit;
}
?>