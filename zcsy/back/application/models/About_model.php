<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class About_model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }


    public function  updateAbout($dataArry){
        $this->db->replace('T_ABOUT', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function getAbout()
    {
        $query = $this->db->get('T_ABOUT');
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'getAbout succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }
}
