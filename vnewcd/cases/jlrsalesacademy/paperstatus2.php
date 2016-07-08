<?php

	//Get request
	$phone  = $_REQUEST['phone'];
	// qdate (0 为星期天, 1 为星期一, 2 位星期2, 以此类推，8为今日)
	$qdate  = $_REQUEST['date'];
	
	//
	$phone  = '6666';
	// qdate (0 为星期天, 1 为星期一, 2 位星期2, 以此类推，8为今日)
	$qdate  = 1;
	
	// 取得当天日期
	$expectDate = date('Y-m-d');
	$date=date('Y-m-d');  //今天日期
	$w=date('w',strtotime($date));  //计算今天星期几(0 为星期天, 1 为星期一, 2 位星期2, 以此类推）
	print_r("w:".$w);

	// qdate = 8时，表示取得当前答卷。
	if ($qdate != 8) // 通过qdate， 取得日期。
	{
		if($w != 0)
		{
			$expectDate=date('Y-m-d',strtotime("$date -".($w ? $w - $qdate : ($w==0?0:$w-$qdate+7)).' days'));
		}
		else
		{
			$expectDate=date('Y-m-d',strtotime("$date -".(7 - $qdate).' days'));
		}
	}
	print_r("expect date:".$expectDate);
	
	$datestatus = 0;
	if ($qdate == $w)
	{
		// 当日
		$datestatus = 0;
	}
	else if ($qdate > $w)
	{
		// 未来
		$datestatus = 1;
	}
	else
	{
		$datestatus = 2;
	}
	
	if($w == 0)
	{
		// 往期
		$datestatus = 2;
	}
	

	// 0 可以答
	// 1 正确
	//未开始
	$mysql = new SaeMysql();
	$sql = "SELECT COUNT(*) FROM question where que_date='".$expectDate."'";
	$count =$mysql->getVar ($sql);

	// 判断今日答卷是否已经答完
	$sql = "SELECT * FROM users WHERE phone='".$phone."'";
	$row = $mysql->getData($sql);
	
	$sql = "SELECT COUNT(*) FROM answers where uid='".$row[0]['uid']."' and que_date='".$expectDate."'";
	$count =$mysql->getVar ($sql);
	
	if(0 != $count)//Already answered
	{
		$msg_back = array(
		'state'=>0,
		'msg'=>"已答."
		);
		echo json_encode($msg_back);
	}
	else //未答题
	{	
		// 当日和往期，可答题
		if ($datestatus == 0 || $datestatus == 2)
		{
			$msg_back = array(
			'state'=>1,
			'msg'=>"可答."
			);
			echo json_encode($msg_back);
		}
		else
		{
			$msg_back = array(
			'state'=>2,
			'msg'=>"未开始."
			);
			echo json_encode($msg_back);
		}
	}	
?>