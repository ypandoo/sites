<?php
	$sort = $_REQUEST['sort'];
	if(!$sort)
	{
		$sort = 0;
	}
	
	$mysql = new SaeMysql();
	if($sort == 0)
	{
		$sql = "select * from `bonus_item` ORDER BY `item_num` DESC";
	}
	else
	{
		$sql = "select * from `bonus_item` ORDER BY `item_value` DESC";
	}
	$result = $mysql->getData($sql);

	echo json_encode($result);  
  ?>