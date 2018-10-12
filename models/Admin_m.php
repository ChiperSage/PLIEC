<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_m extends CI_Model{
    
    function __construct(){
        
    }

    // public function get($filter, $sort = 'Article_DateCreate DESC', $limit = 10, $page = 0)
    // {
    //     $this->db->select('*');
    // 	$this->db->join('tbl_category b','tbl_article.Article_Category = b.Category_Id','left');
    // 	$this->db->where($filter);
    // 	$this->db->order_by($sort);
    // 	$this->db->limit($limit,$page);
    //     return $this->db->get('tbl_article')->result();
    // }

    // public function get_detail($id)
    // {
    //     $this->db->select('*');
    //     $this->db->where(array('Article_Id'=>$id));
    //     return $this->db->get('tbl_article')->row();
    // }

    // public function get_category()
    // {
    //     $this->db->order_by('Category_Name','ASC');
    // 	return $this->db->get_where('tbl_category',array('Category_Status'=>1))->result();
    // }

    // public function create()
    // {
    //     $data['Article_Name'] = $this->input->post('name');
    //     $data['Article_Slug'] = strtolower(url_title($this->input->post('name')));
    //     $data['Article_Content'] = $this->input->post('content');
    //     $data['Article_Image'] = $this->input->post('image');
    //     $data['Article_Credit'] = $this->input->post('credit');
    //     $data['Article_Tag'] = $this->input->post('tag');
    //     $data['Article_Status'] = $this->input->post('status');
    //     $data['Article_Type'] = $this->input->post('type');
    //     $data['Article_DateCreate'] = $this->input->post('datetime');
    //     $data['Article_DateUpdate'] = date('Y-m-d H:i:s');
    //     $data['Article_Position'] = $this->input->post('position');
    //     $data['Category_Id'] = $this->input->post('category_id');  
    //     $data['User_Id'] = $this->session->userdata('user_id');
        
    //     $this->db->insert('tbl_article',$data);
    // }

    // public function update($id)
    // {
    //     $data['Article_Name'] = $this->input->post('name');
    //     $data['Article_Slug'] = strtolower(url_title($this->input->post('name')));
    //     $data['Article_Summary'] = $this->input->post('summary');
    //     $data['Article_Content'] = $this->input->post('content');
    //     $data['Article_Image'] = $this->input->post('image');
    //     $data['Article_Credit'] = $this->input->post('credit');
    //     $data['Article_Tag'] = $this->input->post('tag');
    //     $data['Article_Status'] = $this->input->post('status');
    //     $data['Article_Type'] = $this->input->post('type');
    //     $data['Article_DateCreate'] = $this->input->post('datetime');
    //     $data['Article_DateUpdate'] = date('Y-m-d H:i:s');
    //     $data['Article_Position'] = $this->input->post('position');
    //     $data['Category_Id'] = $this->input->post('category_id'); 

    //     $this->db->update('tbl_article',$data,array('Article_Id'=>$id));
    // }

    public function count($tb_name, $filter)
    {
        return $this->db->get_where($tb_name,$filter)->num_rows();
    }
}