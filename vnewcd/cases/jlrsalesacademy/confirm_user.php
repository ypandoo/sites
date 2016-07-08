<?
$name = $_REQUEST['name'];
$zhuoyue   = $_REQUEST['zhuoyue'];
$department= $_REQUEST['department'];
$region   = $_REQUEST['region'];
$dealer= $_REQUEST['dealer'];
$phone   = $_REQUEST['phone'];
$pwd= $_REQUEST['pwd'];

/*$name = '程小嫚';
$zhuoyue   = 'yoyo';
$department= "捷豹";
$region   = '四川';
$dealer= '安徽骏虎汽车销售有限公司';
/*$phone   = '18615707058';
$pwd= '111111';*/

$mysql = new SaeMysql();
if($department == "捷豹")
{
	$sql = "select * from  `jaguar` where `name` = '".$name."'";
	$result = $mysql->getData($sql);

	if($result)
	{
		if($result[0]['state'] == $region && $result[0]['sales'] == $dealer && $zhuoyue == $result[0]['number'])
		{
			$json_arr =array('code'=>0,'name'=>$name, 'msg'=>'查找用户信息成功!');//
			$mysql->closeDB();
			echo json_encode($json_arr);
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
	$sql = "select * from  `landover` where `name` = '".$name."'";
	$result = $mysql->getData($sql);

	if($result)
	{
		if($result[0]['state'] == $region && $result[0]['sales'] == $dealer && $zhuoyue == $result[0]['number'])
		{
			$json_arr =array('code'=>0,'name'=>$name, 'msg'=>'查找用户信息成功!');//
			$mysql->closeDB();
			echo json_encode($json_arr);
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
		$json_arr =array('code'=>9999,'name'=>$name, 'msg'=>'未知错误');//注册失败!未查到该销售人员信息！
		$mysql->closeDB();
		echo json_encode($json_arr);
}
?>