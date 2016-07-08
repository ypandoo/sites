<?php

$department= $_REQUEST['department'];

$mysql = new SaeMysql();
if($department == "捷豹")
{
	//$department = "jb";
	$sql = "select distinct `state` from  `jaguar` ";
	$result = $mysql->getData($sql);

	if($result)
	{
		$regionArr =array();
		$regionArr["status"] = 1;
	    $num = 0;
		foreach( $result as $row )
		{
			$regionArr["region".$num] = $row["state"];
			$num++;
		}
		$regionArr["regionsize"] = $num;
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
	//$department = "jb";
	$sql = "select distinct `state` from  `landover` ";
	$result = $mysql->getData($sql);

	if($result)
	{
		$regionArr =array();
		$regionArr["status"] = 1;
	    $num = 0;
		foreach( $result as $row )
		{
			$regionArr["region".$num] = $row["state"];
			$num++;
		}
		$regionArr["regionsize"] = $num;
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