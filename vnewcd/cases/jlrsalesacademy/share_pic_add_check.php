<?php
	
	$mysql = new SaeMysql();
	
	$record_id = $_REQUEST['record_id'];
	$phone = $_REQUEST['phone'];
	
	if(!$phone)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"未登陆!");
		echo json_encode($msg_back);
		exit;
	}
	
	//check number > 5
	$bonus_date =date("Y-m-d");
	$sql = "SELECT count(*) from `daily_add_num` WHERE `phone` = '".$phone."' AND `bonus_date` = '".$bonus_date."'";
	$sum_access = $mysql->getVar($sql);
	if($sum_access >= 5)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"今日点赞已达上限!");
		echo json_encode($msg_back);
		exit;
	}
	
	//less than 5
	$sql = "SELECT count(*) from `daily_add_num` WHERE `phone` = '".$phone."' AND `bonus_date` = '".$bonus_date."' AND `record_id` = '".$record_id."'";
	$access = $mysql->getVar($sql);
	if($access >= 1)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"您已经给这张照片点过赞啦！!");
		echo json_encode($msg_back);
		exit;
	}
	
	//check number 
	$bonus_date =date("Y-m-d");
	$sql = "SELECT SUM(`bonus_score`) from `bonus` WHERE `phone` = '".$phone."' AND `bonus_type` = '晒照点赞' AND `bonus_date` = '".$bonus_date."'";
	$sum_score = $mysql->getVar($sql);
	//print_r("SUM('bonus_score'):".$sum_score);
	if($sum_score >= 20)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"今日点赞分数已达上限!");
		echo json_encode($msg_back);
		exit;
	}
	
	$mysql->closeDB();
	$arr = array('status'=>'1','msg'=>"点赞成功");
	echo json_encode($arr);
?>