<?
	//store events
	$date = $_REQUEST['date'];
	
	//$date = '2015-2-28';
	
	//$phone = '6666';
	$mysql = new SaeMysql();
	
	$sql = "SELECT count(a.phone) as aphone FROM `bonus` as a, `users` as b WHERE a.phone = b.phone and a.`bonus_type` = '每日答题' and `bonus_date` = '".$date."' and b.department = 'jb'";
	//print_r($sql);
	$data = $mysql->getData($sql);
	//print_r($data);
	$jb_daily_total = $data[0]['aphone'];
	
	
	$sql = "SELECT count(a.phone) as aphone FROM `bonus` as a, `users` as b WHERE a.phone = b.phone and a.`bonus_type` = '每日答题' and `bonus_date` = '".$date."' and b.department = 'lh'";
	//print_r($sql);
	$data = $mysql->getData($sql);
	$lh_daily_total = $data[0]['aphone'];
	
	$sql = "SELECT count(a.phone) as aphone FROM `bonus` as a, `users` as b WHERE a.phone = b.phone and a.`bonus_type` = '每日答题' and `bonus_date` = '".$date."' and `daily_score` = '100' and b.department = 'jb'";
	//print_r($sql);
	$data = $mysql->getData($sql);
	$jb_daily_full_score = $data[0]['aphone'];
	
	
	$sql = "SELECT count(a.phone) as aphone FROM `bonus` as a, `users` as b WHERE a.phone = b.phone and a.`bonus_type` = '每日答题' and `bonus_date` = '".$date."' and `daily_score` = '100' and b.department = 'lh'";
	//print_r($sql);
	$data = $mysql->getData($sql);
	$lh_daily_full_score = $data[0]['aphone'];
	
	
	$arr = array('jb_daily_total'=>$jb_daily_total, 'lh_daily_total'=>$lh_daily_total,
	             'jb_daily_full_score'=>$jb_daily_full_score, 'lh_daily_full_score'=>$lh_daily_full_score,
				 'daily_all' => $jb_daily_total+$lh_daily_total
	            );
	
	
	echo json_encode($arr);
	$mysql->closeDB();
?>