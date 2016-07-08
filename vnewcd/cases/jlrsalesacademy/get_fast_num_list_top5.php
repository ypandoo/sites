<?php
$mysql = new SaeMysql();
$phone  = $_REQUEST['phone'];
//$phone = '6666';
if(!$phone)
{
	$arr = array('status'=>0, 'msg'=>'请重新登陆!');
	$mysql->closeDB();
	echo json_encode($arr);
	exit;
}

$sql = "SELECT * FROM users where phone ='".$phone."'";
$result = $mysql->getData($sql);
if(!$result)
{
	$arr = array('status'=>0, 'msg'=>'查询信息失败!'.$sql);
	$mysql->closeDB();
	echo json_encode($arr);
	exit;
} 

//
$department = $result[0]['department'];

//Check if first place
$sql = "SELECT usr_name, correct_num
FROM  `fast_num_list` AS a,  `users` AS b
WHERE a.phone = b.phone
AND b.department = '".$department."'
ORDER BY correct_num DESC 
LIMIT 0 , 5";
$result = $mysql->getData($sql);
echo json_encode($result);
?>