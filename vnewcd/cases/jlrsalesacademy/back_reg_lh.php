<?php
	
	$mysql = new SaeMysql();
	
	$sales = $_REQUEST['sales'];
	$city = $_REQUEST['city'];
	$state = $_REQUEST['state'];
	$first_name = $_REQUEST['first_name'];
	$last_name = $_REQUEST['last_name'];
	$name = $_REQUEST['name'];
	$number = $_REQUEST['number'];
	$position = $_REQUEST['position'];
	$regdate = $_REQUEST['regdate'];
	
	
	if(!$sales || !$city || !$state || !$position || !$name ||!$number)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"数据不正确!");
		echo json_encode($msg_back);
		exit;
	}
	
	
	$sql = "INSERT INTO `landover`( `sales`, `city`, `state`, `first_name`, `last_name`,`name`, `number`, `position`, `regdate`) VALUES 
	                            ('".$sales."','".$city."','".$state."','".$first_name."','".$last_name."','".$name."','".$number."','".$position."','".$regdate."')";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"添加不成功！".$sql);
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}
	

	$mysql->closeDB();
	$arr = array('status'=>'1','msg'=>"添加成功");
	echo json_encode($arr);
?>