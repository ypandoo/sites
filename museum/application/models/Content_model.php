<?php
defined('BASEPATH') or exit('Error');
/**
 *
*/
class Content_model extends CI_Model
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

    public function  addItem($dataArry){

        $this->db->insert('T_CONTENT', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function  updateContent($dataArry){
        $this->db->replace('T_CONTENT', $dataArry);

        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data['data'] = 1;

        return  $data;
    }

    public function getList($list_type)
    {
        $query = $this->db->get_where('T_CONTENT', array('CONTENT_TYPE' => $list_type));
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'getList succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }

    public function deleteContent($content_id)
    {
        $this->db->delete('T_CONTENT', array('CONTENT_ID' => $content_id));
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'deleteContent succeeded!';
        $data['data'] = '0';
        return $data;
    }

    public function getContentDetail($content_id)
    {
        $query = $this->db->get_where('T_CONTENT', array('CONTENT_ID' => $content_id));
        $data["success"] = true;
        $data["errorCode"] = 0;
        $data["error"] = 0;
        $data["message"] = 'getContentDetail succeeded!';
        $data['data'] = $query->result_array();
        return $data;
    }
}
