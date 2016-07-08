<?
$phone = $_REQUEST['phone'];
//$phone = '6666';

$mysql = new SaeMysql();
$sql = "SELECT count(*)  FROM `message` WHERE  `phone` = '". $phone."' and `msg_unread` = 1";
$result = $mysql->getVar($sql);
if($result)
{
	$json_arr =array('status'=>1,'msg'=>'有未读信息!'.$result);
	$mysql->closeDB();
	echo json_encode($json_arr);
}
else
{
	$json_arr =array('status'=>0,'msg'=>'无未读信息!');
	$mysql->closeDB();
	echo json_encode($json_arr);
}
?>