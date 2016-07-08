<?
//$phone = $_REQUEST['phone'];
//$content = $_REQUEST['content'];
/*$bonus_type = $_REQUEST['type'];
$name = $_REQUEST['name'];
$bonus_score = $_REQUEST['bonus_score'];*/


/*$bonus_score = 400;
$phone = '6666';
$content = '后台加分-恭喜你获得活动积分6666';
$bonus_type = '后台加分';
$name = '666666';*/

$mysql = new SaeMysql();

$sql = "select `phone` from `addscore_people`";
$result = $mysql->getData($sql);
if(!$result)
{
	 $arr = array('status'=>'0','msg'=>"查询消息失败".$sql);
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
}

//Update week honer
$order_date = date("Y-m-d H:i:s");
foreach($result as $row) 
{
//insert bonus record
$bonus_date =date("Y-m-d");
$bonus_score = 50;
$bonus_type = '爆料奖励积分';
$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$row['phone']."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
$mysql->runSql($sql);
}

$mysql->closeDB();
$arr = array('status'=>'1','msg'=>"发送消息成功");
 echo json_encode($arr);
?>