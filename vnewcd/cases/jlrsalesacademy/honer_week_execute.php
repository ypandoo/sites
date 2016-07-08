<?
$begin_date = $_REQUEST['begin_date'];
$end_date = $_REQUEST['end_date'];
$month = $_REQUEST['month'];
$department = $_REQUEST['department'];

/*$begin_date = '2015-02-16';
$end_date = '2015-02-22';
$month = '2';
$department = 'jb'; */

$mysql = new SaeMysql();
/*SELECT a.phone, SUM( a.bonus_score ) 
FROM  `bonus` AS a,  `users` AS b
WHERE a.phone = b.phone
AND a.bonus_neg =0
AND b.department =  'lh'
AND a.bonus_date >=  '2015-02-16'
AND a.bonus_date <=  '2015-02-22'
GROUP BY a.phone
LIMIT 0 , 20*/

$sql = "SELECT a.phone, b.usr_name, SUM(a.bonus_score) 
FROM  `bonus` AS a,  `users` AS b
WHERE a.phone = b.phone
AND a.bonus_neg =0 AND a.bonus_type = '每日答题'
AND b.department = '".$department."'
AND a.bonus_date >= '".$begin_date."'  
AND a.bonus_date <= '".$end_date."'
GROUP BY a.phone ORDER BY a.phone DESC LIMIT 0 , 20";
$result1 = $mysql->getData($sql);
if(!$result1)
{
 $arr = array('status'=>'0','msg'=>"查询积分信息失败！");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}
////print_r($result1);

foreach ($result1 as &$value)
{
	$sql = "SELECT SUM(bonus_score) FROM  `bonus` WHERE bonus_neg = 0 AND bonus_type != '每日答题' 
	AND bonus_date >= '".$begin_date."' AND bonus_date <= '".$end_date."' AND phone='".$value['phone']."'";

	$result2 = $mysql->getData($sql);
	////print_r("value:".$sql);

	if(!$result2 || !$result2[0]['SUM(bonus_score)'])
	{
		$value['extra_score'] = 0;
	}
	else
	{
		$value['extra_score'] = $result2[0]['SUM(bonus_score)'];
	}
	$result2 ="";
}


//insert week honer list
//print_r($result1);
$honer_date = date("Y-m-d H:i:s");
foreach ($result1 as $item)
{
	//print_r($item);
	$sql = "INSERT INTO `honer_week` (`start_date`, `end_date`, `month`, `phone`, `name`, `department`, `score`, `bonus_score`, `honer_date`) 
	VALUES ('". $begin_date."','".$end_date."','".$month."','".$item['phone']."','".$item['usr_name']."','".$department."','".$item['SUM(a.bonus_score)']."','".$item['extra_score']."','".$honer_date."')";
	//print_r($sql);
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"插入周冠信息失败".$sql);
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}
}

//insert msg record
$order_date = date("Y-m-d H:i:s"); 
$content = "恭喜你获得周冠军奖励400积分！";
foreach ($result1 as $item2)
{	
	$sql = "INSERT INTO `message` (`msg_date`, `phone`, `name`, `msg_content`, `msg_unread`)
	VALUES ('". $order_date."','".$item2['phone']."','".$item2['usr_name']."','".$content."', '1')";
	//print_r($sql);
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"生成周冠消息失败");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}
}

//insert bonus record
foreach ($result1 as $item3)
{
	$bonus_date =date("Y-m-d");
	$bonus_type = "周冠奖励";
	$bonus_score = 400;
	$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$item3['phone']."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"插入交易周冠奖励信息失败");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}
}

$mysql->closeDB();
$arr = array('status'=>'1','msg'=>"生成周冠成功");
 echo json_encode($arr);
?>