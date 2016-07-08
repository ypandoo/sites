<?
$phone = $_REQUEST['tel'];
$name = $_REQUEST['name'];
$mail = $_REQUEST['mail'];
$level = $_REQUEST['prize_name'];
$mysql = new SaeMysql();

if(!$phone || !$name || !$mail || !$level)
{
	$arr = array('status'=>'0','msg'=>"无效数据!");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
}

$sql = "select count(*) from  `hkc_fanpai` where level = '".$level."'";
$result = $mysql->getVar($sql);
if($level == 1 && $result == 5)
{
	$arr = array('status'=>'0','msg'=>"1等奖已抢光!");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
}
else if($level == 2 && $result == 20)
{
	$arr = array('status'=>'0','msg'=>"2等奖已抢光!");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
}
else if($level == 3 && $result >= 80)
{
	$arr = array('status'=>'0','msg'=>"3等奖已抢光!");
    $mysql->closeDB();
	echo json_encode($arr);
	exit;
}

$sql = "INSERT INTO `hkc_fanpai`( `phone`, `name`, `level`, `mail`) VALUES ('".$phone."','".$name."','".$level."','".$mail."')";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"您已经领取过奖品了!一个手机只能领一次哦！");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('status'=>'1','msg'=>"领取成功稍后会有专人与您联系!");
 echo json_encode($arr);
?>