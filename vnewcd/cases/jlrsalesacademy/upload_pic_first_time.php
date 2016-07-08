<?
$phone = $_REQUEST['phone'];

/* $start_date = '2015-02-24';
$end_date = '2015-02-25';
$month = '2';
$phone = '6666'; */

$mysql = new SaeMysql();

//Update week honer
$first_time = 0;
$sql = "SELECT count(*) FROM `bonus` WHERE phone='".$phone."' and `bonus_type` = '首次晒照' LIMIT 0,30";
$first_time = $mysql->getVar($sql);
if($first_time > 0)
{
 $arr = array('status'=>'0','msg'=>"Already prized");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//insert bonus record
$bonus_date =date("Y-m-d");
$bonus_type = "首次晒照";
$bonus_score = 50;
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