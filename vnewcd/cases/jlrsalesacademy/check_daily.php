<?
$phone = $_REQUEST['phone'];
$date = date("Y-m-d");

$mysql = new SaeMysql();
$sql = "select * from  `bonus` where `bonus_date` = '".$date."' AND `bonus_type` = '每日签到' AND `phone` = '".$phone."'";
$result = $mysql->getData($sql);
if($result)
{
	$json_arr =array('status'=>0,'msg'=>'您今天已经签过到啦!');
	$mysql->closeDB();
	echo json_encode($json_arr);
}
else
{
	$json_arr =array('status'=>1,'msg'=>'您今天还没签过到!');
	$mysql->closeDB();
	echo json_encode($json_arr);
}
?>