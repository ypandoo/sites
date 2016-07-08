<?
$phone = $_REQUEST['phone'];
//$phone = '6666';
$date = date("Y-m-d");

$mysql = new SaeMysql();
$sql = "SELECT  *FROM `users` WHERE  `phone` = '". $phone."'";
$result = $mysql->getData($sql);
if($result)
{
	$mysql->closeDB();
	echo json_encode($result[0]);
}
else
{
	$json_arr =array();
	$mysql->closeDB();
	echo json_encode($json_arr);
}
?>