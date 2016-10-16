<?php
header("Content-Type: text/html;charset=utf-8");

$start = $_REQUEST['START'];
require_once('vnewMysql.php');
$dbobj = new db_mysql;
$dbhost = '114.55.112.244:3306';
$dbuser = 'vnewcd';
$dbpw = 'bK4cJqcVx5cvcXQ5';
$dbname='customer';
$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);

$sql = "select * from `t_hawaii`";
$result = $dbobj->query($sql);

while($rows[] = $dbobj->fetch_assoc($result));
{
	array_pop($rows);
}

$json_arr =array('status'=>1, 'data'=>$rows);
echo json_encode($json_arr);
die;

?>
