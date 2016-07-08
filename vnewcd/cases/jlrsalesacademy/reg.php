<?php

$name = $_REQUEST['name'];
$zhuoyue   = $_REQUEST['zhuoyue'];
$department= $_REQUEST['department'];
$region   = $_REQUEST['region'];
$dealer= $_REQUEST['dealer'];
$phone   = $_REQUEST['phone'];
$pwd= $_REQUEST['pwd'];

/*$name = '程小嫚';
$zhuoyue   = 'yoyo';
$department= "路虎";
$region   = '安徽';
$dealer= '安徽骏虎汽车销售有限公司';
$phone   = '18615707058';
$pwd= '111111';*/

$mysql = new SaeMysql();
if($department == "捷豹")
{
	$department = "jb";
	$sql = "select * from  `jaguar` where `name` = '".$name."'";
	$result = $mysql->getData($sql);

	if($result)
	{
		if($result[0]['state'] == $region && $result[0]['sales'] == $dealer && $result[0]['number'] == $zhuoyue)
		{
		}
		else
		{
			$json_arr =array('code'=>1001,'name'=>$name, 'msg'=>$result[0]['region'].$result[0]['dealer'].'与公司注册信息不匹配!');//
			$mysql->closeDB();
			echo json_encode($json_arr);
		}
	}
	else
	{
		$json_arr =array('code'=>1002,'name'=>$name, 'msg'=>'注册失败!未查到该销售人员信息！');//注册失败!未查到该销售人员信息！
		$mysql->closeDB();
		echo json_encode($json_arr);
	}
}
else if($department == "路虎")
{
	$department = "lh";
	$sql = "select * from  `landover` where `name` = '".$name."'";
	$result = $mysql->getData($sql);

	if($result)
	{
		if($result[0]['state'] == $region && $result[0]['sales'] == $dealer && $result[0]['number'] == $zhuoyue)
		{
		}
		else
		{
			$json_arr =array('code'=>1003,'name'=>$name, 'msg'=>$result[0]['region'].$result[0]['dealer'].'与公司注册信息不匹配!');//
			$mysql->closeDB();
			echo json_encode($json_arr);
		}
	}
	else
	{
		$json_arr =array('code'=>1004,'name'=>$name, 'msg'=>'注册失败!未查到该销售人员信息！');//注册失败!未查到该销售人员信息！
		$mysql->closeDB();
		echo json_encode($json_arr);
	}
}
else
{
		$json_arr =array('code'=>9999,'name'=>$name, 'msg'=>'未查到该销售人员信息！');//注册失败!未查到该销售人员信息！
		$mysql->closeDB();
		echo json_encode($json_arr);
}

// Include func.php file from memory cache
$mmc=memcache_init();
if($mmc==false)
    echo "mc init failed\n";
else
{
    $f=file_get_contents('func.php');
    memcache_set($mmc,"func.php", $f);
    //echo memcache_get($mmc,"func.php");
}
file_put_contents('saemc://func.php','');
require_once 'saemc://func.php';

/*$name = '杨雷';
$zhuoyue   = 'zhuoyue';
$department= 'department';
$region   = 'region';
$dealer= 'dealer';
$phone   = 'phone';
$pwd= 'pwd';*/

//To do: check exist
$link = conn_db();
$query = "INSERT INTO users (phone,usr_passwd,usr_name,zhuoyue,region,dealer,department) VALUES('".$phone."','".$pwd."','".$name."','".$zhuoyue."','".$region."','".$dealer."','".$department."')";
if (!runquery($query,$link))
{
	$json_arr =array('code'=>1005,'name'=>$name, 'msg'=>'注册失败!手机或姓名已注册!');
	echo json_encode($json_arr);
}
else
{
	//insert bonus record
	$bonus_date =date("Y-m-d");
	$bonus_type = '注册赠送积分';
	$bonus_score = 50;
	$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 0)";
	$mysql->runSql($sql);

	$json_arr =array('code'=>0,'name'=>$name, 'msg'=>'注册成功');
	echo json_encode($json_arr);
}
?>