<?
$phone = $_REQUEST['phone'];
$content = $_REQUEST['content'];
/*$bonus_type = $_REQUEST['type'];
$name = $_REQUEST['name'];
$bonus_score = $_REQUEST['bonus_score'];*/


/*$bonus_score = 400;
$phone = '6666';
$content = '后台加分-恭喜你获得活动积分6666';
$bonus_type = '后台加分';
$name = '666666';*/

$mysql = new SaeMysql();
$order_date = date("Y-m-d H:i:s");
$usr_name = '消息';
$sql = "INSERT INTO `message` (`msg_date`, `phone`, `name`, `msg_content`, `msg_unread`)
	VALUES ('". $order_date."','".$phone."','".$usr_name."','".$content."', '1')";
//print_r($sql);
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"发送消息失败");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('status'=>'1','msg'=>"发送消息成功");
 echo json_encode($arr);
?>