<?
$phone = $_REQUEST['phone'];
//$phone = '6666';
$mysql = new SaeMysql();
$sql = "SELECT usr_name from users where phone = '".$phone."'";
$result = $mysql->getData($sql);
if($result)
{
	$json_arr =array('status'=>1,'name'=>$result[0]['usr_name']);
	$mysql->closeDB();
	echo json_encode($json_arr);
}
else
{
	$json_arr =array('status'=>0,'msg'=>'提取信息错误!');
	$mysql->closeDB();
	echo json_encode($json_arr);
}
?>