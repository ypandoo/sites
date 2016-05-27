<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Navi_model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }

    public function  addItem($dataArry){

        $query = $this->db->get_where('T_NAVI', array('NAVI_CODE' => $dataArry['NAVI_CODE']));
        $row = $query->row();
        if (isset($row) && $row)
        {
          $data["success"] = false;
          $data["errorCode"] = 1;
          $data["message"] = '导航信息的编号已经存在了!请输入不同的编号!';
          $data['data'] = $row;
          return  $data;
        }

        $this->db->insert('T_NAVI', $dataArry);
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["message"] = '增加数据成功';
        $data['data'] = 'row'.$row;

        return  $data;
    }

    public function  updateItem($dataArry){
        $this->db->replace('T_NAVI', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function getItems()
    {
        $query = $this->db->get('T_NAVI');
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'get_items succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }


    public function deleteItem($item_id)
    {
        $this->db->delete('T_NAVI', array('NAVI_CODE' => $item_id));
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'deleteItem succeeded!';
        $data['data'] = '0';
        return $data;
    }
}
