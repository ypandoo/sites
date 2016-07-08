<?
$phone = $_REQUEST['phone'];
$type = $_REQUEST['type'];

/*$phone = '6666';
$type = 'fastquestion';*/

$date =date("Y-m-d");

$mysql = new SaeMysql();

//query access exist if not insert
$sql = "select * from `access` where `phone` = '".$phone."' and `type` = '".$type."' and `date` = '".$date."'";
$result = $mysql->getData($sql);
if(!$result)
{
	//insert a record
	$sql = "INSERT INTO `access` (`phone`, `type`, `date`, `times`) VALUES ('". $phone."','".$type."','".$date."', 1)";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
	 $arr = array('status'=>'0','msg'=>"更新失败".$sql);
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
	}
	exit;
}

$sql = "update `access` set `times` = `times` + 1 where `phone` = '".$phone."' and `date` = '".$date."'";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"更新失败".$sql);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}
?>