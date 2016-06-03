<?php
class Pc extends CI_Controller {

    public function view($page)
    {
      if ( ! file_exists(APPPATH.'/views/pc/'.$page.'.php'))
       {
           // Whoops, we don't have a page for that!
           show_404();
       }

       $this->load->view('pc/'.$page);
    }
}
