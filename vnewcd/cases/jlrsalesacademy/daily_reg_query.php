<?
/*$begin_date = '2015-02-16';
$end_date = '2015-02-22';
$month = '2';
$department = 'jb'; */

$mysql = new SaeMysql();
/*SELECT a.phone, SUM( a.bonus_score ) 
FROM  `bonus` AS a,  `users` AS b
WHERE a.phone = b.phone
AND a.bonus_neg =0
AND b.department =  'lh'
AND a.bonus_date >=  '2015-02-16'
AND a.bonus_date <=  '2015-02-22'
GROUP BY a.phone
LIMIT 0 , 20*/

$sql = "SELECT count(*) FROM `users` where `department` = 'lh'";
$lh = $mysql->getVar($sql);
if(!$lh)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

$sql = "SELECT count(*) FROM `users` where `department` = 'jb'";
$jb = $mysql->getVar($sql);
if(!$jb)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

//dzp
$sql = "SELECT COUNT( DISTINCT a.phone ) 
FROM `bonus` AS a, `users` AS b
WHERE a.phone = b.phone
AND b.department = 'jb'
AND `bonus_type` = '大转盘'
LIMIT 0,60000";
$dzp_jb = $mysql->getVar($sql);
if(!$dzp_jb)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

$sql = "SELECT COUNT( DISTINCT a.phone ) 
FROM `bonus` AS a, `users` AS b
WHERE a.phone = b.phone
AND b.department = 'lh'
AND `bonus_type` = '大转盘'
LIMIT 0,60000";
$dzp_lh = $mysql->getVar($sql);
if(!$dzp_lh)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

//pic
$sql = "SELECT COUNT( DISTINCT a.phone ) 
FROM `bonus` AS a, `users` AS b
WHERE a.phone = b.phone
AND b.department = 'jb'
AND `bonus_type` = '晒照点赞'
LIMIT 0,60000";
$pic_jb = $mysql->getVar($sql);
if(!$pic_jb)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

$sql = "SELECT COUNT( DISTINCT a.phone ) 
FROM `bonus` AS a, `users` AS b
WHERE a.phone = b.phone
AND b.department = 'lh'
AND `bonus_type` = '晒照点赞'
LIMIT 0,60000";
$pic_lh = $mysql->getVar($sql);
if(!$pic_lh)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

//fast
$sql = "SELECT COUNT( DISTINCT a.phone ) 
FROM `bonus` AS a, `users` AS b
WHERE a.phone = b.phone
AND b.department = 'jb'
AND `bonus_type` = '快问快答'
LIMIT 0,60000";
$fast_jb = $mysql->getVar($sql);
if(!$fast_jb)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

$sql = "SELECT COUNT( DISTINCT a.phone ) 
FROM `bonus` AS a, `users` AS b
WHERE a.phone = b.phone
AND b.department = 'lh'
AND `bonus_type` = '快问快答'
LIMIT 0,60000";
$fast_lh = $mysql->getVar($sql);
if(!$fast_lh)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}


$arr = array('status'=>'1', 'jb'=>$jb, 'lh'=>$lh,
 'dzp_jb'=>$dzp_jb, 'dzp_lh'=>$dzp_lh,
 'pic_jb'=>$pic_jb, 'pic_lh'=>$pic_lh,
'fast_jb'=>$fast_jb, 'fast_lh'=>$fast_lh, 'msg'=>"查询成功！");
echo json_encode($arr);
$mysql->closeDB();
 exit;
?>