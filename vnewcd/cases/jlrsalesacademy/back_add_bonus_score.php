<?
$phone = $_REQUEST['phone'];
$content = $_REQUEST['content'];
$bonus_type = $_REQUEST['type'];
$name = $_REQUEST['name'];
$bonus_score = $_REQUEST['bonus_score'];


/*$bonus_score = 400;
$phone = '6666';
$content = '后台加分-恭喜你获得活动积分6666';
$bonus_type = '后台加分';
$name = '666666';*/

$mysql = new SaeMysql();

//Update week honer
$order_date = date("Y-m-d H:i:s"); 
$sql = "INSERT INTO `message` (`msg_date`, `phone`, `name`, `msg_content`, `msg_unread`)
	VALUES ('". $order_date."','".$phone."','".$name."','".$content."', '1')";
//print_r($sql);
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"发送消息失败");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//insert bonus record
$bonus_date =date("Y-m-d");
$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"增加积分失败");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('status'=>'1','msg'=>"增加积分成功");
 echo json_encode($arr);
?>