<?php
// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
    echo "mc init failed\n";
else
{
    $f=file_get_contents('func.php');
    memcache_set($mmc,"func.php", $f);
    //echo memcache_get($mmc,"func.php");
}
file_put_contents('saemc://func.php','');
require_once 'saemc://func.php';

session_begin();
$link = conn_db();
$sql = "SELECT * FROM users";
$ret = runquery($sql,$link);
$row=getresult($ret);
echo '<br/>if you see info (not empty, say - uid: 1 phone: 12 name: 12 etc.) in uid, phone or name, that means the query is working.';
echo '<br/>select user uid by mysql_fetch_array: '.$row['uid'];
echo '<br/>uid:'.$row['uid'];
echo '<br/>phone:'.$row['phone'];
echo '<br/>name:'.$row['usr_name'];
echo '<br/>que_score:'.$row['que_score'];
echo '<br/>';
echo '<br/>';

$sql = "SELECT * FROM answers";
$ret = runquery($sql,$link);
echo '<br/>if you see info (not empty, say - uid: 1 phone: 12 name: 12 etc.) in uid, phone or name, that means the query is working.';
while($row=getresult($ret)){
echo '<br/>uid:'.$row['uid'];
echo '<br/>que_score:'.$row['que_score'];
echo '<br/>qid:'.$row['qid'];
echo '<br/>answer:'.$row['answer'];
echo '<br/>';
echo '<br/>';
}

//header("Content-type: text/html; charset=gb2312");
echo 'test if the chinese character can be shown.';
echo "ºº×Ö";
?>