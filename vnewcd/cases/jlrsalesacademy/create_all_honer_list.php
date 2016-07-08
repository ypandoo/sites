<?
$mysql = new SaeMysql();

//clear table
$sql = "TRUNCATE TABLE  `all_candidate`";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"errorcode1:生成失败！请联系供应商");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//generate data
$sql = "INSERT INTO `all_candidate` (phone)
SELECT DISTINCT  `phone` FROM `honer_month`";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"errorcode2:".$sql);
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//clear table
$sql = "TRUNCATE TABLE  `bonus_all`";
$mysql->runSql($sql);
if($mysql->errno() != 0)
{
 $arr = array('status'=>'0','msg'=>"生成失败！请联系供应商");
 $mysql->closeDB();
 echo json_encode($arr);
 exit;
}

//generate data
$sql = "INSERT INTO bonus_all (phone, bonus_score, daily_score)
SELECT a.phone, sum(bonus_score), sum(daily_score) FROM `bonus` as a, `all_candidate` as b where a.phone = b.phone
and a.bonus_neg != '1' group by a.phone";
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