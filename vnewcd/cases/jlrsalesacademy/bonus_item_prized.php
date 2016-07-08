<?
/*$begin_date = '2015-02-16';
$end_date = '2015-02-22';
$month = '2';
$department = 'jb'; */
$id = $_REQUEST['item_id'];
$mysql = new SaeMysql();

$sql = "update `bonus_exchange` set prized = 1 where order_id = '".$id."'";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"修改信息失败".$sql);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

$arr = array('status'=>'1','msg'=>"修改信息成功");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
 
?>