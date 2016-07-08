<?php
//header("Content-Type:text/html;charset=utf-8"); 
$phone = $_REQUEST['phone'];

//$phone = '18615707058';
/*$name = '杨雷';*/

$mysql = new SaeMysql();
$sql = "select * from  `users` where `phone` = '".$phone."'";
$result = $mysql->getData($sql);
if($result)
{	
	$prize_arr =array('code'=>0,
                   	  'joyo'=>$result[0]['zhuoyue'],
					  'name'=> $result[0]['usr_name'],
					  'sales'=> $result[0]['dealer'],
					  'region' => $result[0]['region'],
					  'msg'=>'查询用户信息成功'); 
	$mysql->closeDb();
	echo json_encode($prize_arr);
}
else
{
	$prize_arr =array('code'=>1, 'joyo'=> '未查询', 'name'=>'未查询', 'sales'=> '未查询', 'region' => '未查询','msg'=>'查询用户信息成功' );
	$mysql->closeDb();
	echo json_encode($prize_arr);
}	
?>