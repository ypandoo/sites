<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function view($page)
	{
		//echo APPPATH.'/views/'.$page.'.php';
		if ( ! file_exists(APPPATH.'/views/'.$page.'.php'))
		 {
				 // Whoops, we don't have a page for that!
				 show_404();
		 }

		 $this->load->view($page);
	}
}
