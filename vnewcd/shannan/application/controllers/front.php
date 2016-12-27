<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

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
		$this->load->view('index');
	}

	public function news()
	{
		$this->load->view('news');
	}

  public function detail(){
      $this->load->view('news_detail');
  }

  public function news_pics()
  {
    $this->load->view('news_pics');
  }

  public function detail_pics(){
      $this->load->view('news_detail_pics');
  }

  public function zwbm(){
      $this->load->view('zwbm');
  }

  public function shbm(){
      $this->load->view('shbm');
  }

  public function feedback(){
      $this->load->view('feedback');
  }

  public function wechat(){
      $this->load->view('wechat');
  }

  public function links(){
      $this->load->view('links');
  }

  public function service(){
      $this->load->view('service');
  }

  public function views(){
      $this->load->view('views');
  }

  public function news_service(){
      $this->load->view('news_service');
  }

  public function service_detail(){
      $this->load->view('service_detail');
  }
}
