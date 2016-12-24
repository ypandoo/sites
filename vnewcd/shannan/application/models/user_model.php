<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class User_Model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }

    public function  add($data){

        $this->db->insert('t_user', $data);

        $data["success"] = true;
        $data["message"] = 'succeeded!';

        return  $data;
    }

    public function  update($dataArry){
        $this->db->replace('t_user', $dataArry);
        $data["success"] = true;
        $data["message"] = 'succeeded!';

        return  $data;
    }

    public function getList()
    {
        $query = $this->db->get('t_user');
        return $query->result_array();
    }

    public function getByName($name)
    {
        $query = $this->db->get_where('t_user', array('name' => $name));
        if(isset($query) && !empty($query) && is_array($query->result_array()) && count($query->result_array(),COUNT_NORMAL)>0 )
        {
          return $query->result_array()[0];
        }

        return "";
    }

    public function valid($name, $password)
    {
        $query = $this->db->get_where('t_user', array('name' => $name, 'password' => $password));
        if(isset($query) && !empty($query) && is_array($query->result_array()) && count($query->result_array(),COUNT_NORMAL)>0 )
        {
          return $query->result_array()[0];
        }

        return "";
    }
    //
    //
    // public function deleteById($id)
    // {
    //     $this->db->delete('t_user', array('_id' => $id));
    //     $data["success"] = true;
    //     $data["message"] = 'succeeded!';
    //     return $data;
    // }
}
