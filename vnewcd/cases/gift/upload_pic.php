<?php
      $id = $_POST['id'];
      if(!$id)
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
      $picname =  'img/upload/'.$id.'.'.$filter[1];//生成文件名
      base64_to_jpeg($_POST['pic'], $picname);

      $arr = array(
            'status'=>'1',
            'pic_name' => $id.'.'.$filter[1],
            'msg'=>"图片上传成功！");
     echo json_encode($arr);


    function base64_to_jpeg($base64_string, $output_file) {
        $ifp = fopen($output_file, "wb"); 

        $data = explode(',', $base64_string);

        fwrite($ifp, base64_decode($data[1])); 
        fclose($ifp); 

        return $output_file; 
    }
  ?>