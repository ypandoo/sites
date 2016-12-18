<?php
class Type extends CI_Controller {

    public function add()
    {
       $type_name = $this->input->post('name');
       $id = $this->input->post('_id');

       $this->load->model('Type_Model');
       $result = $this->Type_Model->getById($id);
       if (isset($result) && !empty($result)) {
         $result['success'] = 0;
         $result['message'] = '已经有相同的分类简称了，请更改！';
         echo json_encode($result);
         die;
       }

       $data['type_name'] = $type_name;
       $data['_id'] = $id;
       $result = $this->Type_Model->add($data);

       //$this->load->view('admin_type_list');
       //redirect('/admin/typelist', 'refresh');
       $result['success'] = 1;
       $result['message'] = '增加分类成功！';
       echo json_encode($result);
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
