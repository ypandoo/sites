<?php
class Item extends CI_Controller {

    public function view($item_id)
    {
      $data['item_id'] = $item_id;
      if ( ! file_exists(APPPATH.'/views/item_list.php') || !  $data['item_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('item_detail', $data);
    }


    public function add_pic()
    {
         $id = $this->input->post('id');
         if(!$id)
         {
             $data_result["success"] = 0;
             $data_result["errorCode"] = 1;
             $data_result['message'] = "Upload failed![err=1]. id = ".$id;
             $data_result["data"] = 0;
             echo json_encode($data_result);
             exit;
         }

        $original_name = iconv('UTF-8', 'GBK', $_FILES['file']['name']);
        $fileParts = pathinfo($original_name);
        $file_id = md5(uniqid(rand()));
        $namewithoutpath = $file_id.'.'.$fileParts['extension'];
        if ($namewithoutpath) {
             move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/museum/uploads/img/".$namewithoutpath);
        }
        else {
            $data_result["success"] = 0;
            $data_result["errorCode"] = 2;
            $data_result['message'] = "Upload failed![err=2]";
            $data_result["data"] = 0;
            echo json_encode($data_result);
            exit;
        }

       $insertdata['ITEM_ID'] = $id;
       $insertdata['PIC_ID'] = $file_id;
       $insertdata['PATH'] = $namewithoutpath;

       $tableName = 'T_PIC';
       $this->load->model('Item_model');
       $result = $this->Item_model->addPic($insertdata,$tableName);

       if ($result['success'] == 1) {
         $data_result["success"] = 1;
         $data_result["errorCode"] = 0;
         $data_result['message'] = "Upload succeeded!";
         $data_result['data'] = ['file_id'=>$file_id, 'file_path'=>$namewithoutpath, 'database_info'=>$result];
       }
       else {
         $data_result["success"] = 0;
         $data_result["errorCode"] = 3;
         $data_result['message'] = "Upload failed![err=3]";
         $data_result['data'] = ['file_id'=>$file_id, 'file_path'=>$namewithoutpath, 'database_info'=>$result];
       }

       echo json_encode($data_result);
    }

    public function add_video()
    {
         $id = $this->input->post('id');
         if(!$id)
         {
             $data_result["success"] = 0;
             $data_result["errorCode"] = 1;
             $data_result['message'] = "Upload failed![err=1][id=".$id."]";
             $data_result["data"] = 0;
             echo json_encode($data_result);
             exit;
         }

        $original_name = iconv('UTF-8', 'GBK', $_FILES['file']['name']);
        if ($original_name) {
             move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/museum/uploads/video/".$original_name);
        }
        else {
            $data_result["success"] = 0;
            $data_result["errorCode"] = 2;
            $data_result['message'] = "Upload failed![err=2]";
            $data_result["data"] = 0;
            echo json_encode($data_result);
            exit;
        }

        $data_result["success"] = 1;
        $data_result["errorCode"] = 0;
        $data_result['message'] = "uploadfile success";
        $data_result['data'] = ['file_name'=>$original_name];

         echo json_encode($data_result);
    }

    public function save_item()
    {
         $id = $this->input->post('id');
         if(!$id)
         {
             $data_result["success"] = 0;
             $data_result["errorCode"] = 1;
             $data_result['message'] = "Upload failed![err=1][id=".$id."]";
             $data_result["data"] = 0;
             echo $callback.'('.json_encode($data_result).')';
             exit;
         }

         $item_name = $this->input->post('item_name');
         $video = $this->input->post('video');
         $item_priority = $this->input->post('item_priority');
         $item_description = $this->input->post('item_description');
         $pics = $this->input->post('pics');

         $insertdata['ITEM_ID'] = $id;
         $insertdata['ITEM_NAME'] = $item_name;
         if ($video) {
           $insertdata['ITEM_VIDEO'] = $video;
         }
         $insertdata['ITEM_PRIORITY'] = $item_priority;
         $insertdata['ITEM_DESCRIPTION'] = $item_description;

         $this->load->model('Item_model');
         $result = $this->Item_model->addItem($insertdata);

         if ($result['success'] == 1) {
           $data_result["success"] = 1;
           $data_result["errorCode"] = 0;
           $data_result['message'] = "save_item succeeded!";
           $data_result['data'] = 0;
         }
         else {
           $data_result["success"] = 0;
           $data_result["errorCode"] = 3;
           $data_result['message'] = "save_item failed![err=3]";
           $data_result['data'] = 0;
         }

         $data_result["success"] = 1;
         $data_result["errorCode"] = 0;
         $data_result['message'] = "save_item item success";
         $data_result["data"] = 0;
         echo json_encode($data_result);
         exit;
    }

    public function update_item()
    {
         $id = $this->input->post('id');
         if(!$id)
         {
             $data_result["success"] = 0;
             $data_result["errorCode"] = 1;
             $data_result['message'] = "update_item failed![err=1][id=".$id."]";
             $data_result["data"] = 0;
             echo json_encode($data_result);
             exit;
         }

         $item_name = $this->input->post('item_name');
         $video = $this->input->post('video');
         $item_priority = $this->input->post('item_priority');
         $item_description = $this->input->post('item_description');
         $pics = $this->input->post('pics');

         $insertdata['ITEM_ID'] = $id;
         $insertdata['ITEM_NAME'] = $item_name;
         if ($video) {
           $insertdata['ITEM_VIDEO'] = $video;
         }
         $insertdata['ITEM_PRIORITY'] = $item_priority;
         $insertdata['ITEM_DESCRIPTION'] = $item_description;

         $this->load->model('Item_model');
         $result = $this->Item_model->updateItem($insertdata);

         if ($result['success'] == 1) {
           $data_result["success"] = 1;
           $data_result["errorCode"] = 0;
           $data_result['message'] = "update_item item succeeded!";
           $data_result['data'] = 0;
         }
         else {
           $data_result["success"] = 0;
           $data_result["errorCode"] = 1;
           $data_result['message'] = "update_item failed![err=1]";
           $data_result['data'] = 0;
         }

         $data_result["success"] = 1;
         $data_result["errorCode"] = 0;
         $data_result['message'] = "update_item success";
         $data_result["data"] = 0;
         echo json_encode($data_result);
         exit;
    }

    public function get_items()
    {
      $tableName = 'T_ITEM';
      $this->load->model('Item_model');
      $result = $this->Item_model->getItems();

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "get_items failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
    }

    public function get_items_with_pic()
    {
      $tableName = 'T_ITEM';
      $this->load->model('Item_model');
      $result = $this->Item_model->getItemsWithPic();

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "get_items failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
    }

    public function get_items_with_pic_all()
    {
      $tableName = 'T_ITEM';
      $this->load->model('Item_model');
      $item_id = $this->input->post('item_id');
      if (!$item_id) {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "get_items_with_pic_all failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
      $result = $this->Item_model->getItemsWithPicAll($item_id);

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 2;
        $data_result['message'] = "get_items_with_pic_all failed![err=2]";
        $data_result['data'] = 0;
        exit;
      }
    }

    public function delete_item()
    {
      $item_id = $this->input->post('item_id');
      if(!$item_id)
      {
          $data_result["success"] = 0;
          $data_result["errorCode"] = 1;
          $data_result['message'] = "delete_item failed![err=1]";
          $data_result['data'] = 0;
          echo json_encode($data_result);
          exit;
      }

      $this->load->model('Item_model');
      $result = $this->Item_model->deleteItem($item_id);

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "delete_item failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
    }

    public function get_pics()
    {
      $this->load->model('Item_model');
      $item_id = $this->input->post('item_id');
      if(!$item_id)
      {
          $data_result["success"] = 0;
          $data_result["errorCode"] = 1;
          $data_result['message'] = "get_pics failed![err=1]";
          $data_result['data'] = 0;
          echo json_encode($data_result);
          exit;
      }


      $result = $this->Item_model->getPics($item_id);

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "get_pics failed![err=1]";
        $data_result['data'] = 0;
        echo json_encode($data_result);
        exit;
      }
    }

    public function delete_pic()
    {
      $this->load->model('Item_model');
      $pic_id = $this->input->post('pic_id');
      if(!$pic_id)
      {
          $data_result["success"] = 0;
          $data_result["errorCode"] = 1;
          $data_result['message'] = "delete_pic failed![err=1]";
          $data_result['data'] = 0;
          echo json_encode($data_result);
          exit;
      }

      $result = $this->Item_model->deletePic($pic_id);

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "delete_pic failed![err=1]";
        $data_result['data'] = 0;
        echo json_encode($data_result);
        exit;
      }
    }


}
