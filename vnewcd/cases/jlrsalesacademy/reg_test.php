<?php
$name = $_REQUEST['name'];
$zhuoyue   = $_REQUEST['zhuoyue'];
$department= $_REQUEST['department'];
$region   = $_REQUEST['region'];
$dealer= $_REQUEST['dealer'];
$phone   = $_REQUEST['phone'];
$pwd= $_REQUEST['pwd'];

/* $name = '吴昊';
$zhuoyue   = '182206';
$department= "捷豹";
$region   = '天津';
$dealer= '天津惠通陆华汽车销售有限公司';
$phone   = '18615707058';
$pwd= '111111';  */

$mysql = new SaeMysql();
if($department == "捷豹")
{
	$department = "jb";
	$table ="jaguar";
}
else if($department == "路虎")
{
	$department = "lh";
	$table ="landover";
}
else
{
	$json_arr =array('code'=>9999,'name'=>$name, 'msg'=>'上传信息错误！');//注册失败!未查到该销售人员信息！
	$mysql->closeDB();
	echo json_encode($json_arr);
}


$sql = "select * from `".$table."`where `name` = '".$name."'";
$result = $mysql->getData($sql);
$iscorrect = false;
if($result)
{
	foreach($result as $row)
	{
		if($row['state'] == $region && $row['sales'] == $dealer && $row['number'] == $zhuoyue)
		{
			$iscorrect = true;
			break;
		}
	}

	if($iscorrect == false)
	{
		$json_arr =array('code'=>1001,'name'=>$name, 'msg'=>$result[0]['region'].$result[0]['dealer'].'与公司注册信息不匹配!');//
		$mysql->closeDB();
		echo json_encode($json_arr);
	}
}
else
{
	$json_arr =array('code'=>1002,'name'=>$name, 'msg'=>'注册失败!未查到该销售人员信息！', 'sql'=>$sql);//注册失败!未查到该销售人员信息！
	$mysql->closeDB();
	echo json_encode($json_arr);
}


if($iscorrect == true)
{
	$query = "INSERT INTO users (phone,usr_passwd,usr_name,zhuoyue,region,dealer,department) VALUES('".$phone."','".$pwd."','".$name."','".$zhuoyue."','".$region."','".$dealer."','".$department."')";
	if (!$mysql->runSql($query))
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
}
?>