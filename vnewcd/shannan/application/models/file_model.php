<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class File_Model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }

    public function  add($data){

        $this->db->insert('t_file', $data);

        $data["success"] = true;
        $data["message"] = 'succeeded!';

        return  $data;
    }
}
