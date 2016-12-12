<?php
class File extends CI_Controller {

    public function upload()
    {
      //  $type_name = $this->input->post('type_name');
       //
      //  $this->load->model('Type_Model');
      //  $data['type_name'] = $type_name;
      //  $result = $this->Type_Model->add($data);
       //
      //  //$this->load->view('admin_type_list');
      //  redirect('/admin/typelist', 'refresh');

      // $this->load->add_package_path(APPPATH.'third_party', FALSE);
      $this->load->library('UploadHandler');
      $content = $this->uploadhandler->initialize();

      //save result to data
      if (isset($content) && !empty($content)) {
        $data['_id'] = uniqid();
        $data['name'] = $content['files'][0]->name;
        $data['size'] = $content['files'][0]->size;
        $data['type'] = $content['files'][0]->type;
        $data['url'] = $content['files'][0]->url;
        $data['thumbnail_url'] = $content['files'][0]->thumbnailUrl;
        $data['delete_url'] = $content['files'][0]->deleteUrl;
        $data['delete_type'] = $content['files'][0]->deleteType;

        $this->load->model('File_Model');
        $result = $this->File_Model->add($data);

        $this->uploadhandler->generate_response($content);
      }

    }

    public function getAll()
    {
      $this->load->model('File_Model');
      $data = $this->File_Model->getAll();
      echo json_encode($data);
    }

    public function getAPage()
    {
      $page = $this->input->post('page');
      if (!isset($page) || empty($page)) {
        $page = 0;
      }

      $this->load->model('File_Model');
      $data = $this->File_Model->getListWithLimit($page);

      $result["success"] = 1;
      $result["data"] = $data;
      $result['message'] = "get page succeeded!";
      $result['page_count'] = $this->File_Model->getPageCount();

      echo json_encode($result);
    }
}
