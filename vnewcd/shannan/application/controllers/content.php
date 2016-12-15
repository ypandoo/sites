<?php
class Content extends CI_Controller {

    public function add()
    {
       $id = md5(uniqid(rand()));
       $data['_id'] = $id;
       $data['plain_text'] = $this->input->post('plain_text');
       $data['html'] = $this->input->post('html');
       $data['author'] = $this->input->post('author');
       $data['type'] = $this->input->post('type');
       $data['cover'] = $this->input->post('cover');
       $data['title'] = $this->input->post('title');
       $data['pics'] = $this->input->post('pics');
       $this->load->model('Content_Model');
       $result = $this->Content_Model->add($data);

       echo json_encode($result);
       die;
    }

    public function update()
    {
      //deal with data
      $id = $this->input->post('id');
      if ($id == '' || !isset($id) || empty($id)) {

        $result["success"] = 0;
        $result['message'] = "Upload failed!";
        echo json_encode($result);
        die;
      }

      $data['plain_text'] = $this->input->post('plain_text');
      $data['html'] = $this->input->post('html');
      $data['author'] = $this->input->post('author');
      $data['type'] = $this->input->post('type');
      $data['pics'] = $this->input->post('pics');
      $cover = $this->input->post('cover');
      if(isset($cover) && !empty($cover))
      {
        $data['cover'] = $cover;
      }
      $data['title'] = $this->input->post('title');
      $data['update_time'] = date("Y-m-d H:i:s");
      $this->load->model('Content_Model');
      $result = $this->Content_Model->update($id, $data);
      $result["success"] = 1;
      $result['message'] = "Update success!";
      echo json_encode($result);
    }

    public function add_pic()
    {
      //deal with image
      $image_id = md5(uniqid(rand()));
      $original_name = iconv('UTF-8', 'GBK', $_FILES['file']['name']);
      if (!isset($original_name) || empty($original_name)) {
        $result["success"] = 0;
        $result['message'] = "Empty file!";
        echo json_encode($result);
        die;
      }

      $fileParts = pathinfo($original_name);
      $namewithoutpath = $image_id.'.'.$fileParts['extension'];
      if ($namewithoutpath) {
        $full_path = $_SERVER['DOCUMENT_ROOT']."/vnewcd/shannan/uploads/cover/".$namewithoutpath;
        move_uploaded_file($_FILES["file"]["tmp_name"], $full_path);
        $result["success"] = 1;
        $result['message'] = "Upload success!";
        $result['data'] = $namewithoutpath;
        echo json_encode($result);
        die;
      }
      else {
        $result["success"] = 0;
        $result['message'] = "Upload failed!";
        echo json_encode($result);
        die;
      }
    }

    public function delete($id)
    {
      // $id = $this->input->post('id');

      $this->load->model('Content_Model');
      $result = $this->Content_Model->deleteById($id);

      echo json_encode($result);
    }

    public function getById($id)
    {
      $this->load->model('Content_Model');
      $data = $this->Content_Model->getById($id);
      $result["success"] = 0;
      if (isset($result) && !empty($result)) {
        $result["success"] = 1;
        $result["data"] = $data;
        $result['message'] = "Upload sucessed!";
      }
      $result['message'] = "Upload failed!";
      echo json_encode($result);
    }

    public function getAPageByCategory()
    {
      $page = $this->input->post('page');
      if (!isset($page) || empty($page)) {
        $page = 0;
      }

      $category = $this->input->post('category');

      $this->load->model('Content_Model');
      $data = $this->Content_Model->getListByCategoryWithLimit($page, $category);

      $result["success"] = 1;
      $result["data"] = $data;
      $result['message'] = "get page succeeded!";
      $result['page_count'] = $this->Content_Model->getPageCount($category);

      echo json_encode($result);
    }


}
