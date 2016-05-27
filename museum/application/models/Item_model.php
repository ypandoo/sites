<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Item_model extends CI_Model
{
    public function __construct()
    {
        # code...
        parent::__construct();
        $this->load->database();
    }

    // public function  getDynamicNewsDetail($newsId) {
    //     $selectData = "T_NEWS.FID as FID,T_NEWS.FTITLE as FTITLE,T_NEWS.FCONTENT as FCONTENT,T_NEWS.FRELEASEDATE as FRELEASEDATE,T_USER.FNAME as FUSERNAME,T_PROJECT.FNAME as FPROJECTNAME,T_NEWS.FSTATE as FSTATE";
    //     $this->db->select( $selectData);
    //     $this->db->where('T_NEWS.FID',$newsId);
    //     $this->db->join('T_PROJECT', 'T_PROJECT.FID=T_NEWS.FPROJECTID');
    //     $this->db->join('T_USER', 'T_USER.FID=T_NEWS.FCREATORID');
    //     $query=$this->db->order_by('T_NEWS.FRELEASEDATE','DESC');
    //     $result = $this->db->get('T_NEWS')->result_array();
    //     $data["success"] = true;
    //     $data["errorCode"] = 0;
    //     $data["error"] = 0;
    //     $data['data'] = $result;
    //     return $data;
    // }

    public function  addPic($dataArry){

        $this->db->insert('T_PIC', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function  addItem($dataArry){

        $this->db->insert('T_ITEM', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function  updateItem($dataArry){
        $this->db->replace('T_ITEM', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function getItems()
    {
        $query = $this->db->get('T_ITEM');
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'get_items succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }

    public function getItemsWithPic()
    {
        $this->db->select('*');
        $this->db->from('T_ITEM');
        $this->db->join('T_PIC', 'T_ITEM.ITEM_ID = T_PIC.ITEM_ID');
        $this->db->group_by('T_ITEM.ITEM_ID');
        $query = $this->db->get();
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'get_items succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }

    public function getItemsWithPicAll($item_id)
    {
        $this->db->select('*');
        $this->db->from('T_ITEM');
        $this->db->join('T_PIC', 'T_ITEM.ITEM_ID = T_PIC.ITEM_ID');
        $this->db->where('T_ITEM.ITEM_ID', $item_id);
        $query = $this->db->get();
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'get_items succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }

    public function getPics($item_id)
    {
        //$query = $this->db->get_where('mytable', array('id' => $id), $limit, $offset);
        $query = $this->db->get_where('T_PIC', array('ITEM_ID' => $item_id));
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'getPics succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }

    public function deletePic($pic_id)
    {
        $this->db->delete('T_PIC', array('PIC_ID' => $pic_id));
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'deletePic succeeded!';
        $data['data'] = '0';
        return $data;
    }

    public function deleteItem($item_id)
    {
        $this->db->delete('T_PIC', array('ITEM_ID' => $item_id));
        $this->db->delete('T_ITEM', array('ITEM_ID' => $item_id));
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'deleteItem succeeded!';
        $data['data'] = '0';
        return $data;
    }
}
