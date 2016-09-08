<?php
class Instruction extends CI_Controller {
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

    public function update_info()
    {
         $html = $this->input->post('html');
         $text = $this->input->post('text');

         $insertdata['TEXT'] = $text;
         $insertdata['HTML'] = $html;
         $insertdata['ID'] = 1;

         $this->load->model('Instruction_model');
         $result = $this->Instruction_model->updateInfo($insertdata);

         if ($result['success'] == 1) {
           $data_result["success"] = 1;
           $data_result["errorCode"] = 0;
           $data_result['message'] = "update_info succeeded!";
           $data_result['data'] = 0;
         }
         else {
           $data_result["success"] = 0;
           $data_result["errorCode"] = 1;
           $data_result['message'] = "update_info failed![err=1]";
           $data_result['data'] = 0;
         }

         $data_result["success"] = 1;
         $data_result["errorCode"] = 0;
         $data_result['message'] = "update_info success";
         $data_result["data"] = 0;
         echo json_encode($data_result);
         exit;
    }

    public function get_info()
    {
      $this->load->model('Instruction_model');
      $result = $this->Instruction_model->getInfo();

      if ($result['success'] == 1) {
        echo json_encode($result);
        exit;
      }
      else {
        $data_result["success"] = 0;
        $data_result["errorCode"] = 1;
        $data_result['message'] = "get_info failed![err=1]";
        $data_result['data'] = 0;
        exit;
      }
    }

}
