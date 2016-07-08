<?
$begin_date = $_REQUEST['begin_date'];
$end_date = $_REQUEST['end_date'];

/*$begin_date = '2015-03-09';
$end_date = '2015-03-15';
$month = '2';
$department = 'jb'; */

if(!$begin_date || !$end_date )
{
	 $arr = array('status'=>'0','msg'=>"时间参数不正确!");
	 echo json_encode($arr);
	 exit;
}

$mysql = new SaeMysql();

//clear table
$sql = "TRUNCATE TABLE  `checkin_list`";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"生成失败！请联系供应商");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//generate data
$sql = "INSERT INTO checkin_list (phone, checkin_times)
SELECT phone, count(distinct bonus_date) as times
FROM bonus
where bonus_date >= '".$begin_date."' and bonus_date <= '".$end_date."' group by phone having times >= 7";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"生成失败！请联系供应商");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

 $arr = array('status'=>'1','msg'=>"生成数据成功！");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
?>