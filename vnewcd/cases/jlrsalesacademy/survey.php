<?
$answer1 = $_REQUEST['answer1'];
$answer2 = $_REQUEST['answer2'];
$answer3 = $_REQUEST['answer3'];
$answer4 = $_REQUEST['answer4'];
$phone = $_REQUEST['phone'];

if(!$phone)
{
	$msg_back =array('no'=>103,'msg'=>"提交失败!");
	echo json_encode($msg_back);
	exit;
}

$mysql = new SaeMysql();
$sql = "INSERT INTO `survey` (`answer1`, `answer2`, `answer3`, `answer4`, `phone`)
VALUES ('". $answer1."','".$answer2."','".$answer3."','".$answer4."','".$phone."')";
//print_r($sql);
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('no'=>101,'msg'=>"你已经提交过问卷了！");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$mysql->closeDB();
$arr = array('no'=>100,'msg'=>"提交成功!");
 echo json_encode($arr);
?>