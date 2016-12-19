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

    public function getAll()
    {
        $query = $this->db->get('t_file');
        $data["success"] = true;
        $data["message"] = 'succeeded!';
        $data["data"] = $query->result_array();
        return $data;
    }

    public function getListWithLimit($page = 0)
    {
        $interval = $this->config->item('page_interval');
        //$query = $this->db->get_where('T_CONTENT', array('CONTENT_TYPE' => $list_type), $interval, $page_start);
        $this->db->order_by('update_time', 'DESC');
        $query = $this->db->get('t_file', $interval, $page*$interval);

        return $query->result_array();
    }

    public function getPageCount()
    {
      $interval = $this->config->item('page_interval');
      $page_count =  $this->db->count_all('t_file');
      return intval($page_count / $interval);
    }


}
