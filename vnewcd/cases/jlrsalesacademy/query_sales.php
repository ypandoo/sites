<?php

$department= $_REQUEST['department'];
$region= $_REQUEST['region'];

/* $department= "捷豹";
$region= "北京"; */

$mysql = new SaeMysql();
if($department == "捷豹")
{
	//$department = "jb";
	$sql = "select distinct `sales` from  `jaguar` where `state` = '".$region."'";
	$result = $mysql->getData($sql);

	if($result)
	{
		$regionArr =array();
		$regionArr["status"] = 1;
	    $num = 0;
		foreach( $result as $row )
		{
			$regionArr["sales".$num] = $row["sales"];
			$num++;
		}
		$regionArr["salessize"] = $num;
		echo json_encode($regionArr);
	}
	else
	{
		$json_arr =array('status'=>0, 'msg'=>'查询信息失败');//注册失败!未查到该销售人员信息！
		$mysql->closeDB();
		echo json_encode($json_arr);
	}
}
else if($department == "路虎")
{
	$sql = "select distinct `sales` from  `landover` where `state` = '".$region."'";
	$result = $mysql->getData($sql);

	if($result)
	{
		$regionArr =array();
		$regionArr["status"] = 1;
	    $num = 0;
		foreach( $result as $row )
		{
			$regionArr["sales".$num] = $row["sales"];
			$num++;
		}
		$regionArr["salessize"] = $num;
		echo json_encode($regionArr);
	}
	else
	{
		$json_arr =array('status'=>0, 'msg'=>'查询信息失败');//注册失败!未查到该销售人员信息！
		$mysql->closeDB();
		echo json_encode($json_arr);
	}
}
else
{
		$json_arr =array('status'=>0, 'msg'=>'查询信息失败');//注册失败!未查到该销售人员信息！
		$mysql->closeDB();
		echo json_encode($json_arr);
}
?>