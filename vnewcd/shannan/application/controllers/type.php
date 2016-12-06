<?php
class Type extends CI_Controller {

    public function add()
    {
       $type_name = $this->input->post('type_name');

       $this->load->model('Type_Model');
       $data['type_name'] = $type_name;
       $result = $this->Type_Model->add($data);

       //$this->load->view('admin_type_list');
       redirect('/admin/typelist', 'refresh');
    }

    // public function getById()
    // {
    //   $id = $this->input->post('id');
    //   if(!$item_id)
    //   {
    //       $data_result["success"] = 0;
    //       $data_result["errorCode"] = 1;
    //       $data_result['message'] = "get_pics failed![err=1]";
    //       $data_result['data'] = 0;
    //       echo json_encode($data_result);
    //       exit;
    //   }
    //
    //   $this->load->model('Type_model');
    //   $result = $this->Item_model->getPics($item_id);
    //
    //   if ($result['success'] == 1) {
    //     echo json_encode($result);
    //     exit;
    //   }
    //   else {
    //     $data_result["success"] = 0;
    //     $data_result["errorCode"] = 1;
    //     $data_result['message'] = "get_pics failed![err=1]";
    //     $data_result['data'] = 0;
    //     echo json_encode($data_result);
    //     exit;
    //   }
    // }

    public function delete($id)
    {
      // $id = $this->input->post('id');

      $this->load->model('Type_Model');
      $result = $this->Type_Model->deleteById($id);

      echo json_encode($result);
    }


}
