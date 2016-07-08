<?
$phone = $_REQUEST['phone'];
//$phone = '1111';

$mysql = new SaeMysql();
$sql = "SELECT *  FROM `message` WHERE  `phone` = '". $phone."' ORDER BY `msg_date` DESC";
$result = $mysql->getData($sql);
if($result)
{
	$mysql->closeDB();
	echo json_encode($result);
}
else
{
	$json_arr =array();
	$mysql->closeDB();
	echo json_encode($json_arr);
}
?>