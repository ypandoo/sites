<?
$start_date = $_REQUEST['start_date'];
$end_date = $_REQUEST['end_date'];
$month = $_REQUEST['month'];
$department = $_REQUEST['department'];
$name = $_REQUEST['name'];
$phone = $_REQUEST['phone'];
$score = 400;

/*$start_date = '2015-02-16';
$end_date = '2015-02-22';
$month = '2';
$department = 'jb'; 
$name = '6666';
$phone = '666666';*/

$mysql = new SaeMysql();

//insert week honer list
//print_r($result1);
$honer_date = date("Y-m-d H:i:s");
	//print_r($item);
$sql = "INSERT INTO `honer_month` (`start_date`, `end_date`, `month`, `phone`, `name`, `department`, `bonus_score`, `honer_date`, `prized`) VALUES ('". $start_date."','".$end_date."','".$month."','".$phone."','".$name."','".$department."','".$score."','".$honer_date."',0)";
//print_r($sql);
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"插入月冠信息失败".$sql);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//insert msg record
$link = '<a data-ajax="false" href="http://www.jlrsalesacademy.com/get_month_honer.html?m='.$month.'&bd='.$start_date.'&ed='.$end_date.'&p='.$phone.'&name='.$name.'">点击我分享</a>';
//print_r($link);
$order_date = date("Y-m-d H:i:s"); 
$content = "恭喜您获得月冠军！请".$link."将该页面分享到朋友圈，即可获得400积分。赶快分享吧！";
$sql = "INSERT INTO `message` (`msg_date`, `phone`, `name`, `msg_content`, `msg_unread`)
VALUES ('". $order_date."','".$phone."','".$name."','".$content."', '1')";
//print_r($sql);
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"生成月冠消息失败");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('status'=>'1','msg'=>"生成月冠成功");
 echo json_encode($arr);
?>