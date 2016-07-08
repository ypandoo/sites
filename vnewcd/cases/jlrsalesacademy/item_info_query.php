<?
$item_id = $_REQUEST['item_id'];
//$item_id = '123456';
$date = date("Y-m-d");

$mysql = new SaeMysql();
$sql = "SELECT  *FROM `bonus_item` WHERE  `item_id` = '". $item_id."'";
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