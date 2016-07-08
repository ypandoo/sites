<?php
require_once('vnewMysql.php');
$dbobj = new db_mysql;
$dbhost = 'qdm123993354.my3w.com:3306';
$dbuser = 'qdm123993354';
$dbpw = 'lei000lei';
$dbname='qdm123993354_db';
$dbobj->connect($dbhost, $dbuser, $dbpw, $dbname);

$sql = 'select * from `msl_hkc_monkey`';
$result = $dbobj->query($sql);
while($rows[] = $dbobj->fetch_assoc($result));
{
	array_pop($rows);
}	
echo json_encode($rows);

?>