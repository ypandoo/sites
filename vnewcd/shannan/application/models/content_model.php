<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Content_Model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }

    public function  add($data){

        $this->db->insert('t_content', $data);

        $data["success"] = true;
        $data["message"] = 'succeeded!';

        return  $data;
    }

    public function  updateType($dataArry){
        $this->db->replace('t_type', $dataArry);
        $data["success"] = true;
        $data["message"] = 'succeeded!';

        return  $data;
    }

    public function getContentList()
    {
        $query = $this->db->get('t_content');
        return $query->result_array();
    }


    public function deleteById($id)
    {
        $this->db->delete('t_content', array('_id' => $id));
        $data["success"] = true;
        $data["message"] = 'succeeded!';
        return $data;
    }
}
