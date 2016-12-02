<?php
header("Content-Type: text/html;charset=utf-8");

$phone = $_REQUEST['TEL'];
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
	$sql = "update `t_hawaii` set `VOTE` = `VOTE` + 1 where `TEL` = '".$phone."'";
	$result = $dbobj->query($sql);
	
	$json_arr =array('status'=>1, 'msg'=>'投票成功！');
	echo json_encode($json_arr);
	die;
}

$json_arr =array('status'=>0, 'msg'=>'Sorry,我们无法查到该手机对应的参赛作品！');
echo json_encode($json_arr);
die;

?>
