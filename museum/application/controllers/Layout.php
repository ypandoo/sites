<?php
class Layout extends CI_Controller {
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

    public function update_layout()
    {
         $html = $this->input->post('html');
         $text = $this->input->post('text');

         $insertdata['TEXT'] = $text;
         $insertdata['HTML'] = $html;
         $insertdata['ID'] = 1;

         $this->load->model('Layout_model');
         $result = $this->Layout_model->updateLayout($insertdata);

         if ($result['success'] == 1) {
           $data_result["success"] = 1;
           $data_result["errorCode"] = 0;
           $data_result['message'] = "update_layout succeeded!";
           $data_result['data'] = 0;
         }
         else {
           $data_result["success"] = 0;
           $data_result["errorCode"] = 1;
           $data_result['message'] = "update_layout failed![err=1]";
           $data_result['data'] = 0;
         }

         $data_result["success"] = 1;
         $data_result["errorCode"] = 0;
         $data_result['message'] = "update_layout success";
         $data_result["data"] = 0;
         echo json_encode($data_result);
         exit;
    }

    public function get_layout()
    {
      $this->load->model('Layout_model');
      $result = $this->Layout_model->getLayout();

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "get_layout failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
    }

}
