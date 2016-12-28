<?php
class Content extends CI_Controller {
    public function view($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/content_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('content_detail', $data);

    }

    public function view_expo_new($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/pc/new_expo_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('Pc/new_expo_detail', $data);
    }

    public function view_expo_review($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/pc/expo_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('pc/expo_detail', $data);
    }


    public function view_dynamic($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/pc/dynamic_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('pc/dynamic_detail', $data);
    }

    public function view_lesson($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/pc/lesson_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('pc/lesson_detail', $data);
    }

    public function view_basic($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/pc/basic_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('pc/basic_detail', $data);
    }

    public function view_construction($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/pc/construction_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('pc/construction_detail', $data);
    }

    public function view_protect($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/pc/protect_detail.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('pc/protect_detail', $data);
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
             move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT']."/uploads/img/".$namewithoutpath);
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

    public function new_content()
    {
         $content_id = $this->input->post('content_id');
         if(!$content_id)
         {
             $data_result["success"] = 0;
             $data_result["errorCode"] = 1;
             $data_result['message'] = "new_content failed![err=1][id=".$content_id."]";
             $data_result["data"] = 0;
             echo $callback.'('.json_encode($data_result).')';
             exit;
         }

        //  'content_id': content_ctrl.content_id,
        //  'content_title':  content_ctrl.content_title,
        //  'content_html':  ue.getContent(),
        //  'content_text':  ue.getContentTxt(),
        //  'content_author': content_ctrl.content_author,
        //  'content_type': content_ctrl.content_type
         $content_type = $this->input->post('content_type');
         $content_title = $this->input->post('content_title');
         $content_html = $this->input->post('content_html');
         $content_text = $this->input->post('content_text');
         $content_author = $this->input->post('content_author');
         $content_cover = $this->input->post('content_cover');

         $insertdata['CONTENT_ID'] = $content_id;
         $insertdata['CONTENT_TITLE'] = $content_title;
         $insertdata['CONTENT_TEXT'] = $content_text;
         $insertdata['CONTENT_HTML'] = $content_html;
         $insertdata['PUBLISH_TIME'] = date("Y-m-d H:i:s");
         $insertdata['AUTHOR'] = $content_author;
         $insertdata['CONTENT_TYPE'] = $content_type;
         $insertdata['CONTENT_COVER'] = $content_cover;

         $this->load->model('Content_model');
         $result = $this->Content_model->addItem($insertdata);

         if ($result['success'] == 1) {
           $data_result["success"] = 1;
           $data_result["errorCode"] = 0;
           $data_result['message'] = "new content succeeded!";
           $data_result['data'] = 0;
         }
         else {
           $data_result["success"] = 0;
           $data_result["errorCode"] = 3;
           $data_result['message'] = "new content failed![err=3]";
           $data_result['data'] = 0;
         }

         $data_result["success"] = 1;
         $data_result["errorCode"] = 0;
         $data_result['message'] = "new content item success";
         $data_result["data"] = 0;
         echo json_encode($data_result);
         exit;
    }

    public function update_content()
    {
         $content_id = $this->input->post('content_id');
         if(!$content_id)
         {
             $data_result["success"] = 0;
             $data_result["errorCode"] = 1;
             $data_result['message'] = "update_content failed![err=1][content_id=".$content_id."]";
             $data_result["data"] = 0;
             echo json_encode($data_result);
             exit;
         }

         $content_type = $this->input->post('content_type');
         $content_title = $this->input->post('content_title');
         $content_html = $this->input->post('content_html');
         $content_text = $this->input->post('content_text');
         $content_author = $this->input->post('content_author');
         $content_cover = $this->input->post('content_cover');

         $insertdata['CONTENT_ID'] = $content_id;
         $insertdata['CONTENT_TITLE'] = $content_title;
         $insertdata['CONTENT_TEXT'] = $content_text;
         $insertdata['CONTENT_HTML'] = $content_html;
         $insertdata['PUBLISH_TIME'] = date("Y-m-d H:i:s");
         $insertdata['AUTHOR'] = $content_author;
         $insertdata['CONTENT_TYPE'] = $content_type;
         $insertdata['CONTENT_COVER'] = $content_cover;

         $this->load->model('Content_model');
         $result = $this->Content_model->updateContent($insertdata);

         if ($result['success'] == 1) {
           $data_result["success"] = 1;
           $data_result["errorCode"] = 0;
           $data_result['message'] = "content_id item succeeded!";
           $data_result['data'] = 0;
         }
         else {
           $data_result["success"] = 0;
           $data_result["errorCode"] = 1;
           $data_result['message'] = "content_id failed![err=1]";
           $data_result['data'] = 0;
         }

         $data_result["success"] = 1;
         $data_result["errorCode"] = 0;
         $data_result['message'] = "update_item success";
         $data_result["data"] = 0;
         echo json_encode($data_result);
         exit;
    }

    public function get_list()
    {
      $tableName = 'T_CONTENT';
      $this->load->model('Content_model');
      $list_type = $this->input->post('list_type');
      $page_start = $this->input->post('page_start');
      $result = $this->Content_model->getList($list_type, $page_start);

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "getList failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
    }

    public function delete_content()
    {
      $content_id = $this->input->post('content_id');
      if(!$content_id)
      {
          $data_result["success"] = 0;
          $data_result["errorCode"] = 1;
          $data_result['message'] = "delete_content failed![err=1]";
          $data_result['data'] = 0;
          echo json_encode($data_result);
          exit;
      }

      $this->load->model('Content_model');
      $result = $this->Content_model->deleteContent($content_id);

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "delete_content failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
    }

    public function get_content_detail()
    {
      $tableName = 'T_CONTENT';
      $this->load->model('Content_model');
      $content_id = $this->input->post('content_id');
      if (!$content_id) {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "get_content_detail failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
      $result = $this->Content_model->getContentDetail($content_id);

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 2;
        $data_result['message'] = "get_content_detail failed![err=2]";
        $data_result['data'] = 0;
        exit;
      }
    }


    public function view_yuequ($content_id)
    {
      $data['content_id'] = $content_id;
      if ( ! file_exists(APPPATH.'/views/content_detail_yuequ.php') || !  $data['content_id'])
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('content_detail_yuequ', $data);
    }
}
