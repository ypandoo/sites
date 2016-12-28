<?php
class Back extends CI_Controller {
  public function index()
  	{
  		$data['tree_item'] = 0;
  		$this->load->view('back/index', $data);
  	}

    public function about()
  	{
  		$data['tree_item'] = 1;
  		$this->load->view('back/about', $data);
  	}

    public function item()
    {
      $data['tree_item'] = 2;
      $this->load->view('back/item', $data);
    }

    public function content()
    {
      $data['tree_item'] = 3;
      $this->load->view('back/content', $data);
    }

  	public function instruction()
  	{
  		$data['tree_item'] = 4;
  		$this->load->view('back/instruction', $data);
  	}

    public function user()
    {
      $data['tree_item'] = 5;
      $this->load->model('User_Model');
      $data['adminlist'] = $this->User_Model->getList();
      $this->load->view('admin_user', $data);
    }

    public function login()
    {
      $this->load->view('admin_login');
    }


}
