<?php
//header("Content-Type:text/html;charset=utf-8"); 
$phone = $_REQUEST['phone'];

//$phone = '18615707058';
//$name = '杨雷';*/

$mysql = new SaeMysql();
$sql = "select * from  `users` where `phone` = '".$phone."'";
$result = $mysql->getData($sql);
if($result)
{	
	$uid = $result[0]['uid'];
    $showtime=date("Y-m-d");
	$sql = "select * from  `answers` where `uid` = '".$uid."' and `que_date` = '".$showtime."'";
    $result = $mysql->getData($sql);
	if($result)
	{
			
		$prize_arr =array('code'=>0,
						  'msg'=>$uid.$showtime); 
		$mysql->closeDb();
		echo json_encode($prize_arr);
	}	
	else
	{
		$prize_arr =array('code'=>1001, 'msg'=>$uid.$showtime);
		$mysql->closeDb();
		echo json_encode($prize_arr);
	}	
	
}
else
{
	$prize_arr =array('code'=>1002, '用户未答题！' );
	$mysql->closeDb();
	echo json_encode($prize_arr);
}	
?>