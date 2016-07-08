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

$sql = "SELECT a.phone, b.usr_name, b.department, a.answer1, a.answer2, a.answer3, a.answer4 
FROM  `survey` AS a,  `users` AS b
WHERE a.phone = b.phone";
$result1 = $mysql->getData($sql);
if(!$result1)
{
 $arr = array('status'=>'0','msg'=>"查询失败");
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

echo json_encode($result1);
$mysql->closeDB();
?>