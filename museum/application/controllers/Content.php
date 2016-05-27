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

         $insertdata['CONTENT_ID'] = $content_id;
         $insertdata['CONTENT_TITLE'] = $content_title;
         $insertdata['CONTENT_TEXT'] = $content_text;
         $insertdata['CONTENT_HTML'] = $content_html;
         $insertdata['PUBLISH_TIME'] = date("Y-m-d H:i:s");
         $insertdata['AUTHOR'] = $content_author;
         $insertdata['CONTENT_TYPE'] = $content_type;

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

         $insertdata['CONTENT_ID'] = $content_id;
         $insertdata['CONTENT_TITLE'] = $content_title;
         $insertdata['CONTENT_TEXT'] = $content_text;
         $insertdata['CONTENT_HTML'] = $content_html;
         $insertdata['PUBLISH_TIME'] = date("Y-m-d H:i:s");
         $insertdata['AUTHOR'] = $content_author;
         $insertdata['CONTENT_TYPE'] = $content_type;

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
      $result = $this->Content_model->getList($list_type);

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

}
