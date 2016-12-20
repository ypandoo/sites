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

    public function  update($id, $data){
      $this->db->where('_id', $id);
      $this->db->update('t_content', $data);
      $data["success"] = true;
      $data["message"] = 'succeeded!';

      return  $data;
    }

    public function getContentList()
    {
        $query = $this->db->get('t_content');
        return $query->result_array();
    }

    public function getListByCategoryWithLimit($page = 0, $category)
    {
        $interval = $this->config->item('page_interval');
        $this->db->order_by('update_time', 'DESC');
        //$query = $this->db->get_where('T_CONTENT', array('CONTENT_TYPE' => $list_type), $interval, $page_start);
        $query = $this->db->get_where('t_content', array('type' => $category), $interval, $page*$interval);
        return $query->result_array();
    }

    public function getById($id)
    {
        $query = $this->db->get_where('t_content', array('_id' => $id));
        if(isset($query) && !empty($query))
        {
          return $query->result_array()[0];
        }

        return "";
    }

    public function deleteById($id)
    {
        $this->db->delete('t_content', array('_id' => $id));
        $data["success"] = true;
        $data["message"] = 'succeeded!';
        return $data;
    }

    public function getPageCount($category)
    {
      $interval = $this->config->item('page_interval');
      $this->db->from('t_content');
      $this->db->where(array('type' => $category));
      $page_count = $this->db->count_all_results(); // Produces an integer, like 17
    //   $page_count =  $this->db->count_all('t_content');
      return intval($page_count / $interval);
    }
}
