<?
$phone = $_REQUEST['phone'];
//$phone = '6666';

$date = intval(date("d"));
//print_r($date);

$interval = 1;
if($date >= 14 and $date < 21)
	$interval = 2;
else if($date >= 21 and $date < 28)
	$interval = 3;
else if($date >= 28)
	$interval = 4;
	
//print_r($date.$interval);

$mysql = new SaeMysql();	
$data =array();
for($i = 0; $i < $interval; $i++)
{
	$sql = "SELECT SUM(  `bonus_score` ) FROM  `bonus` WHERE YEARWEEK( DATE_FORMAT(  `bonus_date` ,  '%Y-%m-%d' ) ) = YEARWEEK( NOW( ) ) -".$i." and `phone` = '".$phone."' AND `bonus_type` = '答题赠送积分'  LIMIT 0,60000";
	//print_r($sql);
	$result = $mysql->getVar($sql);
	if(!$result)
		$result = 0;
	$object = new stdClass();
	if($i == 0)
	{
		$object->week = "本周";
	}
	else
	{
		$object->week = "上".($i)."周";
	}
	
	$object->bonus_score = $result;
	$data[] = $object;
}

$mysql->closeDB();
echo json_encode($data);
?>