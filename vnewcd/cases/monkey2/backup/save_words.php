<?php
header("Content-Type: text/html;charset=utf-8"); 

$phone = $_REQUEST['phone'];
$user_name   = $_REQUEST['name'];
$item_name = $_REQUEST['gift'];
$telecom = $_REQUEST['telecom'];
/*$to = '陈坤';
$from   = '杨雷';
$userid = 'userid';
$nickname= 'nickname';
$text1 = 'text1';
$text2 = 'text2';*/

require_once('vnewMysql.php');
$dbobj = new db_mysql;
$dbhost = 'qdm123993354.my3w.com:3306';
$dbuser = 'qdm123993354';
$dbpw = 'lei000lei';
$dbname='qdm123993354_db';
$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);

$sql = "select * from msl_hkc_monkey where `phone` = '".$phone."'";
$result = $dbobj->query($sql);
// not allow drawing
if( $dbobj->num_rows($result) > 0) 
{
	$json_arr =array('status'=>1001, 'msg'=>'您提交的手机号已经中过奖了！请重新提交新号码！');
	echo json_encode($json_arr);
	exit;
}

$sql = "INSERT INTO `msl_hkc_monkey` (phone, user_name,item_name, telecom) 
VALUES('".$phone."','".$user_name."','".$item_name."','".$telecom."')";
$result = $dbobj->query($sql);
//print_r($sql);
if(!$result)
{
	$json_arr =array('status'=>0, 'msg'=>'记录数据失败!');
	echo json_encode($json_arr);
	exit;
}

$json_arr =array('status'=>1, 'msg'=>'记录数据成功!');
echo json_encode($json_arr);

?>