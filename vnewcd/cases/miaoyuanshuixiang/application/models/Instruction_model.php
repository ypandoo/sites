<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Instruction_model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }


    public function  updateInfo($dataArry){
        $this->db->replace('T_INSTRUCTION', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function getInfo()
    {
        $query = $this->db->get('T_INSTRUCTION');
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'getInfo succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }
}
