<?
$begin_date = $_REQUEST['begin_date'];
$end_date = $_REQUEST['end_date'];
$month = $_REQUEST['month'];
$department = $_REQUEST['department'];

/* $begin_date = '2015-02-16';
$end_date = '2015-02-22';
$month = '2';
$department = 'jb'; */

$mysql = new SaeMysql();
/*SELECT a.phone, b.usr_name, SUM( a.bonus_score ) 
FROM  `bonus` AS a,  `users` AS b
WHERE a.phone = b.phone
AND a.bonus_neg =0
AND a.bonus_type =  '每日答题'
AND b.department =  'jb'
AND a.bonus_date >=  '2015-2-24'
AND a.bonus_date <=  '2015-2-25'
GROUP BY a.phone
ORDER BY SUM( a.bonus_score ) DESC 
LIMIT 0 , 20*/

/*$sql = "SELECT a.phone, b.usr_name, SUM(a.bonus_score) as total_score
FROM  `bonus` AS a,  `users` AS b
WHERE a.phone = b.phone
AND a.bonus_neg =0 AND a.bonus_type = '每日答题'
AND b.department = '".$department."'
AND a.bonus_date >= '".$begin_date."'  
AND a.bonus_date <= '".$end_date."'
GROUP BY a.phone ORDER BY total_score DESC LIMIT 0 , 60";*/

$sql = "SELECT a.phone, b.usr_name, SUM( a.daily_score ) AS total_score, SUM( a.bonus_score ) AS extra_score, b.dealer as dealer
FROM bonus_month AS a, users AS b
WHERE a.phone = b.phone
AND b.department ='".$department."'
AND a.bonus_neg != '1'
GROUP BY  `phone` 
ORDER BY total_score DESC , extra_score DESC  ";
$result1 = $mysql->getData($sql);
if(!$result1)
{
 $arr = array('status'=>'0','msg'=>"查询积分信息失败！".$sql);
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}
////print_r($result1);

$mysql->closeDB();
echo json_encode($result1);
	
//print_r("After change:");
//print_r($result1);

?>