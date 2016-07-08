<?php
	
	$mysql = new SaeMysql();
	
	$record_id = $_REQUEST['record_id'];
	$score = $_REQUEST['score'];
	$phone = $_REQUEST['phone'];
	
	$bonus_date =date("Y-m-d");
	
	if(!$phone)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"未登陆!");
		echo json_encode($msg_back);
		exit;
	}
	
	//less than 5, insert record
	$sql = "SELECT count(phone) from `daily_add_num` where `phone` = '".$phone."' 
	        and `record_id` = '".$record_id."' and`bonus_date` = '".$bonus_date."'";
	$limitcount = $mysql->getVar($sql);
	if($limitcount > 0)
	{
	 $arr = array('status'=>'0','msg'=>"您已经给这张照片点过赞啦！");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}
	
	
	//item_num + 1
	/*$sql = "UPDATE `share_pic` SET `number` = `number` + 1 WHERE `record_id` = '".$record_id."'";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"点赞失败!");
		echo json_encode($msg_back);
		exit;
	}*/
	
	//check number > 10
	$sql = "SELECT count(*) from `daily_add_num` WHERE `phone` = '".$phone."' AND `bonus_date` = '".$bonus_date."'";
	$sum_access = $mysql->getVar($sql);
	if($sum_access >= 10)
	{
		$sql = "INSERT INTO `daily_add_num`( `phone`, `record_id`, `bonus_date`) VALUES ('".$phone."','".$record_id."','".$bonus_date."')";
		$mysql->runSql($sql);
		if($mysql->errno() != 0)
		{
		 $arr = array('status'=>'0','msg'=>"您已经给这张照片点过赞啦！");
		 $mysql->closeDB();
		 echo json_encode($arr);
		 exit;
		}
		
		$mysql->closeDB();
		$msg_back =array('status'=>2,'msg'=>"今日点赞已达上限!");
		echo json_encode($msg_back);
		exit;
	}
	
	$sql = "INSERT INTO `daily_add_num`( `phone`, `record_id`, `bonus_date`) VALUES ('".$phone."','".$record_id."','".$bonus_date."')";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"您已经给这张照片点过赞啦！");
	 $mysql->closeDB();
	 echo json_encode($arr);
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
	
	//Add score
	//insert bonus record
	$bonus_type = "晒照点赞";
	$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$score."','".$bonus_date."', 0)";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"领取积分失败");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}

	$mysql->closeDB();
	$arr = array('status'=>'1','msg'=>"点赞成功");
	echo json_encode($arr);
?>