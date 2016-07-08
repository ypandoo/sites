<?
$phone = $_REQUEST['phone'];
//$msg_id = '8';

$mysql = new SaeMysql();
$sql = "update `message` set `msg_unread` = 0 where `phone` = '".$phone."'";
$mysql->runSql($sql);
?>