<?php
	  $item_id = $_POST['item_id'];
	  if(!$item_id)
	  {
		$arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败");
        echo json_encode($arr);
		exit;
	  }
	  
	  /*submit_data={'item_id' : item_id, 'item_name': item_name, 
                             'item_desp': item_desp, 'item_value': item_value, 
                             'item_num': item_num, 
							 'pic_name': pic_name, 'pic_name1':pic_name1, 'pic_name2':pic_name2,'pic_name3':pic_name3}; */
							 
	  //insert data
	  $item_name = $_POST['item_name'];
      $item_desp = $_POST['item_desp'];
	  $item_value = $_POST['item_value'];
      $item_num = $_POST['item_num'];
	  $picname = $_POST['pic_name'];
	  $picname1 = $_POST['pic_name1'];
	  $picname2 = $_POST['pic_name2'];
	  $picname3 = $_POST['pic_name3'];
	  $picname4 = $_POST['pic_name4'];
	  
	  
	  /* $item_desp = "说明文字";
		$item_id = "111111";
		$item_name = "商品1";
		$item_num = "1";
		$item_value ="200"; */

	  $mysql = new SaeMysql();
	  $sql = "INSERT INTO `bonus_item` (`item_id`, `item_name`, `item_num`, `item_value`, `item_desp`, `item_pic`, `item_pic1`, `item_pic2`, `item_pic3`, `item_pic4`) VALUES('".$item_id."','".$item_name."','".intval($item_num)."','"
	  .intval($item_value)."','".$item_desp."','".$picname."','".$picname1."','".$picname2."','".$picname3."','".$picname4."')";
	  $mysql->runSql($sql);
	  if($mysql->errno() == 0)
      {
		 $arr = array(
            'status'=>'1',
            'msg'=>"商品上传成功");
			echo json_encode($arr);
			exit;
	  }
	  else
	  {
          $arr = array(
            'status'=>'0',
            'msg'=>"商品上传失败！Error Code:".$sql);
			echo json_encode($arr);
			exit;
	  }
	  
  ?>