<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Type_Model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }

    public function  add($data){

        $this->db->insert('t_type', $data);

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

    public function getTypeList()
    {
        $this->db->order_by('sort', 'DESC');
        $query = $this->db->get('t_type');
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('t_type', array('_id' => $id));
        if(isset($query) && !empty($query) && is_array($query->result_array()) && count($query->result_array(),COUNT_NORMAL)>0 )
        {
          return $query->result_array()[0];
        }

        return "";
    }


    public function deleteById($id)
    {
        $this->db->delete('t_type', array('_id' => $id));
        $data["success"] = true;
        $data["message"] = 'succeeded!';
        return $data;
    }
}
