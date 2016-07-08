<?php
// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
{
	echo "mc init failed\n";
}
else
{
    $f=file_get_contents('func.php');
    memcache_set($mmc,"func.php", $f);
    //echo memcache_get($mmc,"func.php");
}
file_put_contents('saemc://func.php','');
require_once 'saemc://func.php';

$phone = xss($_POST['phone']);
$pass = xss($_POST['pass']);

$link = conn_db();
$query = "SELECT uid,usr_name FROM users WHERE phone='".$phone."' AND usr_passwd = '".$pass."'";
$row=getaline($query, $link);
if (!$row){
	closedb($link);
	$msg_back =array('status'=>0,'msg'=>'手机号或密码错误!');
	echo json_encode($msg_back);
	//goback();
}
else
{
	$usr_name = $row['usr_name'];
	$uid=$row['uid'];
	session_begin();
	$ses = array(
		'uid' => $uid,
		'usr_name' => $usr_name,
		'phone' => $phone,
		'pass' => $pass,
	);
	create_session($ses);
	
	closedb($link);
	$msg_back =array('status'=>1,'msg'=>'登陆成功!');
	echo json_encode($msg_back);
}
?>