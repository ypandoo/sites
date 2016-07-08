<?
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$month = $_REQUEST['month'];
$phone = $_REQUEST['phone'];

/* $start_date = '2015-02-24';
$end_date = '2015-02-25';
$month = '2';
$phone = '6666'; */

$mysql = new SaeMysql();

//Update week honer
$sql = "select * from `honer_month` WHERE `start_date` = '".$start_date."' and `end_date` = '".$end_date."' and `month` = '".$month."' and `phone` = '".$phone."' and `prized` = 1";
$result = $mysql->getData($sql);
if($result)
{
 $arr = array('status'=>'1','msg'=>"已经领奖");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('status'=>'0','msg'=>"未领奖");
echo json_encode($arr);
?>