<?php
	$sort = $_REQUEST['sort'];
	$limit = $_REQUEST['limit'];
	
	//
	//$sort = 0;
	//$limit = 10;
	
	//
	$mysql = new SaeMysql();
	//sort by hot
	if($sort == 0)
	{
		$sql = "SELECT b.record_id, a.phone, a.usr_name, a.dealer, b.msg, b.pic_name, b.upload_time, b.msg, b.number
				FROM  `users` AS a,  `share_pic` AS b
				WHERE a.phone = b.phone ORDER BY b.number DESC LIMIT 0,".$limit;
		$result = $mysql->getData($sql);
		$mysql->closeDB();
		echo json_encode($result); 
	}
	else
	{
		$sql = "SELECT b.record_id, a.phone, a.usr_name, a.dealer, b.msg, b.pic_name, b.upload_time, b.msg, b.number
				FROM  `users` AS a,  `share_pic` AS b
				WHERE a.phone = b.phone ORDER BY b.upload_time DESC LIMIT 0,".$limit;
		$result = $mysql->getData($sql);
		$mysql->closeDB();
		echo json_encode($result); 
	}
 ?>