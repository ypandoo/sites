<?php
	  $pic_name = $_POST['pic_name'];
	  if(!$pic_name)
	  {
		$arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败");
        echo json_encode($arr);
		exit;
	  }
	  
      //save img  
      $ex = explode(",",$_POST['pic']);//分割data-url数据
      $filter=explode('/', trim($ex[0],';base64'));//获取文件类型
      $ss = base64_decode(str_replace($filter[1] , '', $ex[1]));//图片解码
      $picname =  $pic_name.'.'.$filter[1];//生成文件名
      $s = new SaeStorage();//实例化SeaStorage类
      $photo_id = $s->write("item",$picname,$ss);//把解码后的图片写入创建的imagefile里，成功返回图片的url
	  if(!$photo_id)
	  {
		$arr = array(
            'status'=>'0',
            'msg'=>"图片上传失败");
        echo json_encode($arr);
		exit;
	  }
	  $arr = array(
            'status'=>'1',
			'pic_name'=>$picname,
            'msg'=>"图片上传成功");
        echo json_encode($arr);
		
	  
  ?>