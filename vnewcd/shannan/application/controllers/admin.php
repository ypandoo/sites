<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['tree_item'] = 0;
		$this->load->view('admin', $data);
	}

	public function contentlist()
	{
		$data['tree_item'] = 2;
        $this->load->model('Type_Model');
        $data['typelist'] = $this->Type_Model->getTypeList();
		$this->load->view('admin_content_list', $data);
	}

	public function content()
	{
		$data['tree_item'] = 2;
		$this->load->model('Type_Model');
		$data['typelist'] = $this->Type_Model->getTypeList();
		$this->load->view('admin_content', $data);
	}

	public function typelist()
	{
		$data['tree_item'] = 1;
		$this->load->model('Type_Model');
		$data['typelist'] = $this->Type_Model->getTypeList();
		$this->load->view('admin_type_list', $data);
	}
}
