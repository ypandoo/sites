<?php
	$record_id = $_REQUEST['record_id'];
	//$record_id = 6;
	//
	$mysql = new SaeMysql();
	//sort by hot
	$sql = "SELECT b.record_id, b.number, a.phone, a.usr_name, a.dealer, b.msg, b.pic_name, b.upload_time
			FROM  `users` AS a,  `share_pic` AS b
			WHERE a.phone = b.phone
			AND b.record_id = '".$record_id."'";
	$result = $mysql->getData($sql);
	$mysql->closeDB();
	echo json_encode($result); 
 ?>