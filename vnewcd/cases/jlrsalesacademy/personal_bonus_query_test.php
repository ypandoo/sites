<?
	//store events
	$phone = $_REQUEST['phone'];
	$phone = '6666';
	$mysql = new SaeMysql();
	$sql = "SELECT `bonus_date`, `bonus_type`, `bonus_score` FROM `bonus` where `phone` = '".$phone."' and `bonus_type` != '每日答题' LIMIT 0,60000 ";
	print_r($sql);
	$data = $mysql->getData($sql);
	
	echo json_encode($data);
	$mysql->closeDB();
?>