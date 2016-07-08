<?php
//header("Content-Type:text/html;charset=utf-8"); 
$mysql = new SaeMysql();

/*$password = '084511';
$newpassword = '111111';
$phone = '18615707058';*/

$newpassword = $_REQUEST['newpassword'];
$phone = $_REQUEST['phone'];


$mysql = new SaeMysql();
$sql = "select * from  `users` where `phone` = '".$phone."'";
$result = $mysql->getData($sql);
if($result)
{	
	//change password
	$sql = "update `users` set `usr_passwd` = '".$newpassword."' where `phone` = '".$phone."'";
	$mysql->runSql($sql);
	
	$prize_arr =array('code'=>0,
					  'msg'=>'修改密码成功'); 
	$mysql->closeDb();
	echo json_encode($prize_arr);
}
else
{
	$prize_arr =array('code'=>1,'msg'=>'修改密码失败！' );
	$mysql->closeDb();
	echo json_encode($prize_arr);
}	
?>