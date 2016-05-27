<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Layout_model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }


    public function  updateLayout($dataArry){
        $this->db->replace('T_LAYOUT', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function getLayout()
    {
        $query = $this->db->get('T_LAYOUT');
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'getLayout succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }
}
