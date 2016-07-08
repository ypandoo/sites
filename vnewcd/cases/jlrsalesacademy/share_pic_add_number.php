<?php
	
	$mysql = new SaeMysql();
	
	$record_id = $_REQUEST['record_id'];

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

	$mysql->closeDB();
	$arr = array('status'=>'1','msg'=>"点赞成功");
	echo json_encode($arr);
?>