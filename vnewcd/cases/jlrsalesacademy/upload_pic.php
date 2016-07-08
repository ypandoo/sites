<?php
	  $phone = $_POST['phone'];
	  if(!$phone)
	  {
		$arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败");
        echo json_encode($arr);
		exit;
	  }
	  
	  $pic = $_POST['pic'];
	  if(!$pic)
	  {
		$arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败");
        echo json_encode($arr);
		exit;
	  }
	  
      //save img  
      $ex = explode(",", $pic);//分割data-url数据
      $filter=explode('/', trim($ex[0],';base64'));//获取文件类型
      $ss = base64_decode(str_replace($filter[1] , '', $ex[1]));//图片解码
	  $picname = md5(uniqid(rand())).'.'.$filter[1];
	  
      //$picname =  $item_id.'.'.$filter[1];//生成文件名
      $s = new SaeStorage();//实例化SeaStorage类
      $photo_id = $s->write("pic",$picname,$ss);//把解码后的图片写入创建的imagefile里，成功返回图片的url
  
	  if(!$s->fileExists("pic", $picname))
	  {
          $arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败");
			echo json_encode($arr);
			exit;
	  }
	  
      if($photo_id){  //返回json数据到浏览器端
      }
	  else
	  {
          $arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败");
			echo json_encode($arr);
			exit;
	  }
	  
	  //insert data
	  $msg = $_POST['msg'];
      $upload_time = date("Y-m-d H:i:s");;
	  
	  /* $item_desp = "说明文字";
		$item_id = "111111";
		$item_name = "商品1";
		$item_num = "1";
		$item_value ="200"; */

	  $mysql = new SaeMysql();
	  $sql = "INSERT INTO `share_pic` (`upload_time`, `phone`, `msg`, `pic_name`, `number`) VALUES('".$upload_time."','".$phone."','".$msg."','".$picname."', 0 )";
	  $mysql->runSql($sql);
	  if($mysql->errno() == 0)
      {
		 $arr = array(
            'status'=>'1',
            'msg'=>"图片上传成功");
			echo json_encode($arr);
			exit;
	  }
	  else
	  {
          $arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败！Error Code:".$sql);
			echo json_encode($arr);
			exit;
	  }
	  
  ?>