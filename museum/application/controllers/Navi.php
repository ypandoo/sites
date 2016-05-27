<?php
class Navi extends CI_Controller {

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

    public function save_item()
    {
         $id = $this->input->post('item_code');
         if(!$id)
         {
             $data_result["success"] = 0;
             $data_result["errorCode"] = 1;
             $data_result['message'] = "Upload failed![err=1][id=".$id."]";
             $data_result["data"] = 0;
             echo json_encode($data_result);
             exit;
         }

         $item_name = $this->input->post('item_name');
         $item_html = $this->input->post('item_html');

         $insertdata['NAVI_CODE'] = $id;
         $insertdata['NAVI_NAME'] = $item_name;
         $insertdata['NAVI_HTML'] = $item_html;

         $this->load->model('Navi_model');
         $result = $this->Navi_model->addItem($insertdata);
         $data_result=  $result;

         echo json_encode($data_result);
    }

    public function update_item()
    {
         $id = $this->input->post('item_code');
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
         $item_html = $this->input->post('item_html');

         $insertdata['NAVI_CODE'] = $id;
         $insertdata['NAVI_NAME'] = $item_name;
         $insertdata['NAVI_HTML'] = $item_html;

         $this->load->model('Navi_model');
         $result = $this->Navi_model->updateItem($insertdata);
         $data_result = $result;

         echo json_encode($data_result);
         exit;
    }

    public function get_items()
    {
      $tableName = 'T_NAVI';
      $this->load->model('Navi_model');
      $result = $this->Navi_model->getItems();

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

    public function delete_item()
    {
      $item_id = $this->input->post('navi_code');
      if(!$item_id)
      {
          $data_result["success"] = 0;
          $data_result["errorCode"] = 1;
          $data_result['message'] = "delete_item failed![err=1]";
          $data_result['data'] = 0;
          echo json_encode($data_result);
          exit;
      }

      $this->load->model('Navi_model');
      $result = $this->Navi_model->deleteItem($item_id);

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

}
