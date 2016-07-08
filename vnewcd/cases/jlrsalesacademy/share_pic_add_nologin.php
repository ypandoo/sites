<?php
	
	$mysql = new SaeMysql();
	
	$record_id = $_REQUEST['record_id'];
	$score = 1;

	$sql = "SELECT phone from `share_pic` WHERE `record_id` = '".$record_id."'";
	$phone = $mysql->getVar($sql);
	if(!$phone)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"点赞失败!");
		echo json_encode($msg_back);
		exit;
	}
	
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
	
	//print_r("SUM('bonus_score'):".$sum_score);
	//item_num + 1
	$sql = "UPDATE `share_pic` SET `number` = `number` + 1 WHERE `record_id` = '".$record_id."'";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"点赞失败!");
		echo json_encode($msg_back);
		exit;
	}
	
	//Add score
	//insert bonus record
	$bonus_type = "晒照点赞";
	$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$score."','".$bonus_date."', 0)";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"点赞积分获得失败");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}

	$mysql->closeDB();
	$arr = array('status'=>'1','msg'=>"点赞成功");
	echo json_encode($arr);
?>