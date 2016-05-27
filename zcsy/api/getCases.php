<?php
   /*
   * Collect all Details from Angular HTTP Request.
   */ 
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$type = $request->type;

    require_once('dbconnect.php');

    if($type == 'all' || null == $type)
    {
      $sql = "select `id`, `imageUrl`, `priority` from `dev` where `type` != 'design' order by `priority` DESC";
    }
    else
    {
      $sql = 'select `id`, `imageUrl`, `priority` from `dev` where type = "'.$type.'" order by `priority` DESC';
    }
    //print_r($sql);
    $result = $dbobj->query($sql);

    while($rows[] = $dbobj->fetch_assoc($result));
    {
      array_pop($rows);
    } 

    //print_r($rows);
    if(!$rows)
    {
      $json_arr =array('status'=>0, 'msg'=>'记录数据失败!');
      echo json_encode($json_arr);
      exit;
    }

    echo json_encode($rows);    
?>