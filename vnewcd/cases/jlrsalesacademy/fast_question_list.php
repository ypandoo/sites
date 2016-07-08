<?php

$phone = $_REQUEST['phone'];
$correct_num = $_REQUEST['correct_num'];

/* $phone = '6666';
$correct_num = '1'; */

//数据库连接
$mysql = new SaeMysql();
if(!$phone)
{
	$arr = array('status'=>0, 'msg'=>'请重新登陆!');
	$mysql->closeDB();
	echo json_encode($arr);
	exit;
}

//get department
$sql = "SELECT * FROM users where phone ='".$phone."'";
$result = $mysql->getData($sql);
if(!$result)
{
	$arr = array('status'=>0, 'msg'=>'查询信息失败!'.$sql);
	$mysql->closeDB();
	echo json_encode($arr);
	exit;
} 
$department = $result[0]['department'];

//Check if first place
$sql = "SELECT MAX(`correct_num`) FROM `fast_num_list` as a, `users` as b where a.phone = b.phone and b.department = '".$department."'";
$max_num = $mysql->getVar($sql);

//check if record exists;
$sql = "SELECT count(*) FROM `fast_num_list` where `phone` = '".$phone."'";
$record_num = $mysql->getVar($sql);
if($record_num > 0)
{
		//check current record number
	$sql = "SELECT `correct_num` FROM `fast_num_list` where `phone` = '".$phone."'";
	$current_num = $mysql->getVar($sql);

	if($correct_num > $current_num)
	{
		//update
		$sql = "UPDATE `fast_num_list` SET `correct_num` = '".$correct_num."' where `phone` = '".$phone."'";
		$mysql->runSql($sql);
		if($mysql->errno() != 0)
		{
			$mysql->closeDb();
			$msg_back =array('status'=>0,'msg'=>"更新记录失败!");
			echo json_encode($msg_back);
			exit;
		}
	}
}
else 
{

	//insert a new record
	$date = date("Y-m-d H:i:s");
	//insert record to bonus
	$sql = "INSERT INTO `fast_num_list`( `phone`, `correct_num`, `date_time`) VALUES ('".$phone."','".$correct_num."','".$date."')";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
		$mysql->closeDb();
		$msg_back =array('status'=>0,'msg'=>"插入记录失败!");
		echo json_encode($msg_back);
		exit;
	}
}

//add bonuse
//insert bonus record
$bonus_date =date("Y-m-d");
$bonus_type = "快问快答";
$bonus_score = 5;
if($correct_num > $max_num)
{
	$bonus_score = 30;
}

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

$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"领取积分失败");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}
	
if($correct_num > $max_num)
{
	$arr = array('status'=>'2','msg'=>"恭喜你进入排行榜第一名，获得30积分！");
	echo json_encode($arr);
	$mysql->closeDB();
}
else
{
	$arr = array('status'=>'1','msg'=>"恭喜你获得5积分！");
	echo json_encode($arr);
	$mysql->closeDB();
	exit;
}

?>