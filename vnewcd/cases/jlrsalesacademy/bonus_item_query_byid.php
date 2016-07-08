<?php
    $item_id = $_REQUEST['item_id'];
	$mysql = new SaeMysql();
	$sql = "select * from `bonus_item` where `item_id` = '".$item_id."'";
	$result = $mysql->getData($sql);

	echo json_encode($result);  
  ?>