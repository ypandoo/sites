<?php
header("Content-Type: text/html;charset=utf-8"); 
  
$ownerid = $_REQUEST['ownerid'];
//$ownerid = "oCCoMuKY5VY2v-w14jw6aBhxTlMo";
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
$sql = 'select * from `guiren_score` as tabel1, `guiren_user` as table2 where ownerid = "'.$ownerid.'" and toid = userid order by score DESC';
//print_r($sql);
$result = $dbobj->query($sql);

while($rows[] = $dbobj->fetch_assoc($result));
{
	array_pop($rows);
}	

//print_r($rows);
if(!$rows)
{
	$json_arr =array('status'=>0, 'msg'=>'记录数据失败!');
	echo json_encode($json_arr);
	exit;
}

echo json_encode($rows);

?>