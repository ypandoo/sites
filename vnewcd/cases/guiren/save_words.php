<?php
header("Content-Type: text/html;charset=utf-8"); 
  
$ownerid = $_REQUEST['ownerid'];
$toid   = $_REQUEST['toid'];
$score = $_REQUEST['score'];
$words =  $_REQUEST['words'];
$color =  $_REQUEST['color'];

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
$sql = "INSERT INTO `guiren_score` (ownerid, toid, score, words, color) 
VALUES('".$ownerid."','".$toid."','".$score."','".$words."','".$color."')";
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