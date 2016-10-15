<?php
header("Content-Type: text/html;charset=utf-8");

$phone = $_REQUEST['TEL'];
$name   = $_REQUEST['NAME'];
$age = $_REQUEST['AGE'];
$des = $_REQUEST['DESCRIPTION'];
/*$to = '陈坤';
$from   = '杨雷';
$userid = 'userid';
$nickname= 'nickname';
$text1 = 'text1';
$text2 = 'text2';*/

require_once('vnewMysql.php');
$dbobj = new db_mysql;
$dbhost = '114.55.112.244:3306';
$dbuser = 'vnewcd';
$dbpw = 'bK4cJqcVx5cvcXQ5';
$dbname='customer';
$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);

$sql = "select * from `t_hawaii` where `TEL` = '".$phone."'";
$result = $dbobj->query($sql);
// not allow drawing
if( $dbobj->num_rows($result) > 0)
{
	$json_arr =array('status'=>1001, 'msg'=>'您提交的手机号已经中过奖了！请重新提交新号码！');
	echo json_encode($json_arr);
	exit;
}

$sql = "INSERT INTO `t_hawaii` (TEL, NAME,AGE, DESCRIPTION)
VALUES('".$phone."','".$name."','".$age."','".$des."')";
$result = $dbobj->query($sql);
//print_r($sql);
if(!$result)
{
	$json_arr =array('status'=>0, 'msg'=>'记录数据失败!');
	echo json_encode($json_arr);
	exit;
}

$json_arr =array('status'=>1, 'msg'=>'Success!');
echo json_encode($json_arr);

?>
