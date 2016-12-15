<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Feedback_Model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }

    public function  add($data){

        $this->db->insert('t_feedback', $data);

        $data["success"] = true;
        $data["message"] = 'succeeded!';

        return  $data;
    }

    public function  update($id, $data){
      $this->db->where('_id', $id);
      $this->db->update('t_feedback', $data);
      $data["success"] = true;
      $data["message"] = 'succeeded!';

      return  $data;
    }

    public function getTypeList()
    {
        $query = $this->db->get('t_feedback');
        return $query->result_array();
    }


    public function deleteById($id)
    {
        $this->db->delete('t_feedback', array('_id' => $id));
        $data["success"] = true;
        $data["message"] = 'succeeded!';
        return $data;
    }

    public function getPageCount()
    {
      $interval = $this->config->item('page_interval');
      $page_count =  $this->db->count_all('t_feedback');
      return intval($page_count / $interval);
    }

    public function getListWithLimit($page = 0)
    {
        $interval = $this->config->item('page_interval');
        //$query = $this->db->get_where('T_CONTENT', array('CONTENT_TYPE' => $list_type), $interval, $page_start);
        $query = $this->db->get('t_feedback', $interval, $page*$interval);
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('t_feedback', array('_id' => $id));
        if(isset($query) && !empty($query))
        {
          return $query->result_array()[0];
        }

        return "";
    }
}
