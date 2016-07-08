<?
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$month = $_REQUEST['month'];
$phone = $_REQUEST['phone'];

/* $start_date = '2015-02-24';
$end_date = '2015-02-25';
$month = '2';
$phone = '6666'; */

$mysql = new SaeMysql();

//Update week honer
$sql = "UPDATE `honer_month` SET `prized` = 1 WHERE `start_date` = '".$start_date."' and `end_date` = '".$end_date."' and `month` = '".$month."' and `phone` = '".$phone."'";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"更新月冠信息失败".$sql);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}


//insert bonus record
$bonus_date =date("Y-m-d");
$bonus_type = "月冠奖励";
$bonus_score = 400;
$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"领取积分失败");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('status'=>'1','msg'=>"领取积分成功");
 echo json_encode($arr);
?>