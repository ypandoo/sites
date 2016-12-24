<?php
class User extends CI_Controller {

  public function update()
  {
     $name = $this->input->post('name');
     $password = $this->input->post('password');

     $this->load->model('User_Model');
     $data['password'] = $password;
     $data['name'] = $name;

     $result = $this->User_Model->update($data);

     $result['success'] = 1;
     $result['message'] = '更新管理员资料成功！';
    echo json_encode($result);
  }

  public function getList(){
    $this->load->model('User_Model');
    $result = $this->User_Model->getList();

    $result['success'] = 1;
    $result['message'] = '获取管理员资料成功！';
   echo json_encode($result);
  }

  public function valid(){
    $name = $this->input->post('name');
    $password = $this->input->post('password');

    $this->load->model('User_Model');
    $result = $this->User_Model->valid($name, $password);

    if (isset($result) && !empty($result)) {
      $this->load->library('session');
      $this->session->set_userdata('admin', $result['name']);
      $result['success'] = 1;
      $result['message'] = '获取管理员资料成功！';
      echo json_encode($result);
      die;
    }

    $result['success'] = 0;
    $result['message'] = '用户名或密码不正确!';
    echo json_encode($result);
  }

  public function logout()
  {
    $this->load->library('session');
    $this->session->unset_userdata('admin');
    // $this->load->view('admin_login');
    $result['success'] = 1;
    $result['message'] = '';
    echo json_encode($result);
  }


    // public function add()
    // {
    //    $type_name = $this->input->post('name');
    //    $id = $this->input->post('_id');
    //
    //    $this->load->model('Type_Model');
    //    $result = $this->Type_Model->getById($id);
    //    if (isset($result) && !empty($result)) {
    //      $result['success'] = 0;
    //      $result['message'] = '已经有相同的分类简称了，请更改！';
    //      echo json_encode($result);
    //      die;
    //    }
    //
    //    $data['type_name'] = $type_name;
    //    $data['_id'] = $id;
    //    $result = $this->Type_Model->add($data);
    //
    //    //$this->load->view('admin_type_list');
    //    //redirect('/admin/typelist', 'refresh');
    //    $result['success'] = 1;
    //    $result['message'] = '增加分类成功！';
    //    echo json_encode($result);
    // }

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
