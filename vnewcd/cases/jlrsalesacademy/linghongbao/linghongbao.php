<?
$phone = $_REQUEST['phone'];
$name = $_REQUEST['name'];
$mysql = new SaeMysql();

if(!$phone || !$name)
{
	$arr = array('status'=>'3','msg'=>"领取失败!");
	 $mysql->closeDB();
	 echo json_encode($arr);
	 exit;
}

$sql = "select count(*) from  `linghongbao`";
$result = $mysql->getVar($sql);
if($result >= 165)
{
 $arr = array('status'=>'4','msg'=>"您来晚了！红包已经抢光!");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$sql = "INSERT INTO `linghongbao`( `phone`, `name`) VALUES ('".$phone."','".$name."')";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'1','msg'=>"您已经领取过饮品券了!一个手机只能领一次哦！");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('status'=>'0','msg'=>"米芝莲免费饮品券领取成功！请于5月3日前往成都群光广场负一楼领取免费饮品券！");
 echo json_encode($arr);
?>