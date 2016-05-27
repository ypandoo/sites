 <?php
  $filename = $_FILES['file']['name'];
  $errors = array(); 
  $data = array(); 
  if (empty($filename) || null == $filename) 
  {
  	$errors['file'] = '上传文件名不存在！';
  	$data['success'] = false;
  	$data['errors']  = $errors;
  }
  else
  {
    $newfile = md5(uniqid(rand())).'.jpg';
  	$destination = '../upload/img/'.$newfile;
	  $moved = move_uploaded_file( $_FILES['file']['tmp_name'] , $destination );
	  if( $moved ) {
		  $data['success'] = true;
  		  $data['message'] = '上传图片成功！';
  		  $data['file_name'] = $newfile;
		} else {
		  $data['success'] = false;
		  $errors['file'] = '上传文件出错！.';
  		  $data['error'] = $errors;
	  }
  }

  echo json_encode($data);
  ?>