<?
$phone = $_REQUEST['phone'];
//$phone = '1111';
$date = date("Y-m-d");

$mysql = new SaeMysql();
$sql = "SELECT DAYOFWEEK(`bonus_date`) , `bonus_date`, daily_score FROM bonus WHERE YEARWEEK( DATE_FORMAT( `bonus_date`,  '%Y-%m-%d' ) ) = YEARWEEK( NOW( ) )
AND `phone` = '". $phone."' AND `bonus_type` = '每日答题' LIMIT 0,60000";
$result = $mysql->getData($sql);
if($result)
{
	$mysql->closeDB();
	echo json_encode($result);
}
else
{
	$json_arr =array('status'=>1,'msg'=>'提取信息错误!');
	$mysql->closeDB();
	echo json_encode($json_arr);
}
?>