<?php

	$item_id = $_REQUEST['item_id'];;
	$phone = $_REQUEST['phone'];
	
	if(!$item_id || !$phone)
	{
		$msg_back =array('status'=>0,'msg'=>"查询商品信息出错!");
		echo json_encode($msg_back);
		exit;
	}
	
	$mysql = new SaeMysql();	
	//query already buy
	$sql = "SELECT count(*) from `bonus_exchange` WHERE `phone` = '".$phone."' AND `item_id` = '".$item_id."'";
	$sum_buy = $mysql->getVar($sql);
	if($sum_buy >= 1)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"您已经购买过此商品!");
		echo json_encode($msg_back);
		exit;
	}
	
	//already buy two times one day
	$sql = "SELECT count(*) from `bonus_exchange` WHERE `phone` = '".$phone."' AND date(`order_date`) =  curdate()";
	$sum_buy_day = $mysql->getVar($sql);
	if($sum_buy_day >= 2)
	{
		$mysql->closeDB();
		$msg_back =array('status'=>0,'msg'=>"您今天已经购买2次商品!");
		echo json_encode($msg_back);
		exit;
	}
	
	//query item info
	$sql = "SELECT * FROM `bonus_item` WHERE `item_id`='".$item_id."'";
	$data = $mysql->getData($sql);
	//print_r($data);
	if(!$data)
	{
		$msg_back =array('status'=>0,'msg'=>"查询商品信息失败!");
		echo json_encode($msg_back);
		$mysql->closeDB();
		exit;
	}
	
	//check stock
	$item_num = intval($data[0]['item_num']);
	$item_value = intval($data[0]['item_value']);
	$item_name = $data[0]['item_name'];
	//print_r("item info: ".$item_name.$item_num.$item_value);
	if($item_num <= 0)
	{
		$msg_back =array('status'=>0,'msg'=>"商品库存不足!");
		echo json_encode($msg_back);
		$mysql->closeDB();
		exit;
	}
	
    //check user score
	$sql = "SELECT SUM(`bonus_score`) FROM `bonus` WHERE `phone`='".$phone."' and `bonus_type` != '每日答题' limit 0, 100";
	$user_bonus = $mysql->getVar($sql);
	//print_r("user total score:".$user_bonus);
	if($user_bonus < $item_value)
	{
		$msg_back =array('status'=>0,'msg'=>"积分不足!");
		echo json_encode($msg_back);
		$mysql->closeDB();
		exit;
	}
	
	
	//item_num - 1
	$sql = "UPDATE `bonus_item` SET `item_num` = `item_num` - 1 WHERE `item_id` = '".$item_id."'";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
	{
		$msg_back =array('status'=>0,'msg'=>"库存计算出错!");
		echo json_encode($msg_back);
		exit;
	}
	
	//buy item insert negtive record to bonus
	$bonus_date =date("Y-m-d");
	$bonus_type = "积分兑换";
	$bonus_score = -intval($item_value);
	$sql = "INSERT INTO `bonus`( `phone`, `bonus_type`, `bonus_score`, `bonus_date`, `bonus_neg`) VALUES ('".$phone."','".$bonus_type."','".$bonus_score."','".$bonus_date."', 1)";
	$mysql->runSql($sql);
	if($mysql->errno() != 0)
      {
		 $arr = array('status'=>'0','msg'=>"插入交易记录失败");
		 echo json_encode($arr);
		 exit;
	  }
	
	//insert record to bonus exchange detail
	$order_date = date("Y-m-d H:i:s"); 
	$sql = "INSERT INTO `bonus_exchange`( `order_date`, `item_id`, `item_name`, `item_value`, `phone`) VALUES ('".$order_date."','".$item_id."','".$item_name."','".$item_value."','".$phone."')";
	$mysql->runSql($sql);
	//print_r($sql);
	if($mysql->errno() != 0)
	{
		$arr = array('status'=>'0','msg'=>"插入交易记录失败2");
		echo json_encode($arr);
		exit;
	}
	
	$arr = array('status'=>'1','msg'=>"礼品兑换成功！");
	echo json_encode($arr);
?>