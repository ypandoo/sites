<?
$phone = $_REQUEST['phone'];
//$phone = '1111';

$date = intval(date("m"));
//print_r($date);

$mysql = new SaeMysql();	
$data =array();
for($i = 0; $i < $date; $i++)
{
	$sql = "SELECT SUM(  `daily_score` ) FROM  `bonus` WHERE YEARWEEK( DATE_FORMAT(  `bonus_date` ,  '%Y-%m-%d' ) ) = YEARWEEK( NOW( ) ) - ".$i." and `phone` = '".$phone."' AND `bonus_type` = '每日答题' LIMIT 0,60000";
	//print_r($sql);
	$result = $mysql->getVar($sql);
	if(!$result)
		$result = 0;
	$object = new stdClass();
	$object->month = ($date - $i)."月";
	$object->daily_score = $result;
	$data[] = $object;
}

$mysql->closeDB();
echo json_encode($data);
?>