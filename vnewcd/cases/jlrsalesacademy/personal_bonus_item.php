<?
$phone = $_REQUEST['phone'];
//$phone = '1111';
$date = date("Y-m-d");

$mysql = new SaeMysql();
$sql = "SELECT `item_name` , `order_date`, `item_value`  FROM `bonus_exchange` WHERE  `phone` = '". $phone."' ORDER BY `order_date` DESC";
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