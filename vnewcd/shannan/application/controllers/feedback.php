<?php
class Feedback extends CI_Controller {

    public function add()
    {
       $this->load->model('Feedback_Model');
       $data['name'] = $this->input->post('name');
       $data['address'] = $this->input->post('address');
       $data['tel'] = $this->input->post('tel');
       $data['contact'] = $this->input->post('contact');
       $data['sex'] = $this->input->post('sex');
       $data['email'] = $this->input->post('email');
       $data['description'] = $this->input->post('description');
       $data['department'] = $this->input->post('department');
       $data['title'] = $this->input->post('title');

       $result = $this->Feedback_Model->add($data);

       echo json_encode($result);
    }

    public function getById($id)
    {
      $this->load->model('Feedback_Model');
      $data = $this->Feedback_Model->getById($id);
      $result["success"] = 0;
      $result['message'] = "Post failed!";
      if (isset($result) && !empty($result)) {
        $result["success"] = 1;
        $result["data"] = $data;
        $result['message'] = "Post sucessed!";
      }
      echo json_encode($result);
    }

    public function update()
    {
       $id = $this->input->post('id');
       $comment = $this->input->post('comment');

       $this->load->model('Feedback_Model');
       $data['comment'] = $comment;

       $result = $this->Feedback_Model->update($id, $data);

       //$this->load->view('admin_type_list');
       redirect('/admin/feedback?id='.$id, 'refresh');
    }

    public function delete($id)
    {
      // $id = $this->input->post('id');

      $this->load->model('Type_Model');
      $result = $this->Type_Model->deleteById($id);

      echo json_encode($result);
    }

    public function getAPage()
    {
      $page = $this->input->post('page');
      if (!isset($page) || empty($page)) {
        $page = 0;
      }

      $this->load->model('Feedback_Model');
      $data = $this->Feedback_Model->getListWithLimit($page);

      $result["success"] = 1;
      $result["data"] = $data;
      $result['message'] = "get page succeeded!";
      $result['page_count'] = $this->Feedback_Model->getPageCount();

      echo json_encode($result);
    }



}
