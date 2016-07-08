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
$sql = "TRUNCATE TABLE  `month_candidate`";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"errorcode1:生成失败！请联系供应商");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}



//generate data
$sql = "INSERT INTO month_candidate (phone)
SELECT DISTINCT  `phone` FROM honer_week where start_date >= '".$begin_date."' and end_date <= '".$end_date."'";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"errorcode2:".$sql);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//clear table
$sql = "TRUNCATE TABLE  `bonus_month`";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"生成失败！请联系供应商");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//generate data
$sql = "INSERT INTO bonus_month (phone, bonus_score, daily_score)
SELECT a.phone, sum(bonus_score), sum(daily_score) FROM `bonus` as a, `month_candidate` as b where a.phone = b.phone
and a.bonus_neg != '1' and a.bonus_date >= '".$begin_date."' and a.bonus_date <= '".$end_date."' group by a.phone";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"errorcode3:".$sql);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

 $arr = array('status'=>'1','msg'=>"生成数据成功！");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
?>