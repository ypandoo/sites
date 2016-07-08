<?
$begin_date = $_REQUEST['begin_date'];
$end_date = $_REQUEST['end_date'];
$department = $_REQUEST['department'];

/*$begin_date = '2015-3-9';
$end_date = '2015-3-15';
$department = 'jb'; */

$mysql = new SaeMysql();

$sql = "SELECT a.usr_name,a.dealer, a.phone, SUM(b.bonus_score) as extra_score, SUM(b.daily_score) as total_score , c.checkin_times as checkin
FROM  users as a, bonus as b, checkin_list as c
WHERE bonus_neg = 0  AND bonus_date >= '".$begin_date."' AND bonus_date <= '".$end_date."' AND a.department = '".$department."' AND a.phone = b.phone AND b.phone = c.phone 
GROUP BY a.phone ORDER BY c.checkin_times DESC, total_score DESC, extra_score DESC limit 0,20";

$result = $mysql->getData($sql);
if(!$result)
{
 $arr = array('status'=>'0','msg'=>"查询失败".$sql);
 echo json_encode($arr);
 $mysql->closeDB();
 exit;
}

$mysql->closeDB();
echo json_encode($result);
?>