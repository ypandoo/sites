<?php
header("Content-Type: text/html;charset=utf-8");

$phone = $_REQUEST['TEL'];
$name   = $_REQUEST['NAME'];
$age = $_REQUEST['AGE'];
$des = $_REQUEST['DESCRIPTION'];
$pic = $_REQUEST['PIC'];

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
	$sql = "UPDATE `t_hawaii` set `NAME` ='".$name."', `AGE` = '".$age."',`DESCRIPTION`='".$des."' where `TEL` = '".$phone."'";
	$result = $dbobj->query($sql);
	$json_arr =array('status'=>1, 'msg'=>'修改资料成功!');
	echo json_encode($json_arr);
	exit;
}

$ex = explode(",", $pic);//分割data-url数据
$filter=explode('/', trim($ex[0],';base64'));//获取文件类型
$ss = base64_decode(str_replace($filter[1] , '', $ex[1]));//图片解码
$picname = md5(uniqid(rand())).'.'.$filter[1];

if ( !isset($picname) || is_null($picname)) {
	# code...
	$json_arr =array('status'=>1005, 'msg'=>'照片存储失败！请联系开发商！');
	echo json_encode($json_arr);
	die;
}

//move file
$result = file_put_contents("uploads/" . $picname, $ss);

if ($result) {
	# code...
}
else{
	$json_arr =array('status'=>1005, 'msg'=>'照片存储失败！请联系开发商！');
	echo json_encode($json_arr);
	die;
}

$sql = "INSERT INTO `t_hawaii` (TEL, NAME,AGE, DESCRIPTION, PIC)
VALUES('".$phone."','".$name."','".$age."','".$des."','".$picname."')";
$result = $dbobj->query($sql);
//print_r($sql);
if(!$result)
{
	$json_arr =array('status'=>0, 'msg'=>'记录数据失败!');
	echo json_encode($json_arr);
	exit;
}

$json_arr =array('status'=>1, 'msg'=>'上传参赛作品成功!');
echo json_encode($json_arr);

?>
