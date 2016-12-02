<?php
header("Content-Type: text/html;charset=utf-8"); 
 
 $type="h5game"; 
require_once('dbconnect.php');
$sql = 'select * from `dev` where `type` = "'.$type.'"';
//print_r($sql);
$result = $dbobj->query($sql);

while($rows[] = $dbobj->fetch_assoc($result));
{
	array_pop($rows);
}	

//print_r($rows);
if(!$rows)
{
	$json_arr =array('status'=>0, 'msg'=>'记录数据失败!');
	echo json_encode($json_arr);
	exit;
}

echo json_encode($rows);

?>