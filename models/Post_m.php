<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Post_m extends CI_Model{

    function __construct(){

    }

    public function get($filter, $sort = 'post_date DESC', $limit = 15, $page = 0)
    {
        $this->db->select('*,b.username');
        $this->db->join('users b','wp_posts.post_author = b.id','left');
        // $this->db->join('wp_posts_categories c','wp_posts.ID = c.id','left');
        $this->db->where($filter);
        $this->db->order_by($sort);
        $this->db->limit($limit,$page);
        return $this->db->get('wp_posts')->result();
    }

    public function get_detail($filter)
    {
        $this->db->select('*');
        $this->db->where($filter);
        return $this->db->get('wp_posts')->row();
    }

    public function get_category_name()
    {
        $list = array();
        $category = $this->db->get_where('categories',array())->result();
        foreach ($category as $value) {
            $list[$value->category_id] = $value->category_name;
        }
        return $list;
    }

    public function get_category_select()
    {
        // $this->db->group_by('category_parent');
        $this->db->order_by('category_parent','ASC');
        return $this->db->get_where('categories',array())->result();
    }

    // sortir category berdasarkan parent child
    public function get_category_select2()
    {
        $str = "SELECT 
            a.category_id,a.category_parent, a.category_id as id, a.category_name, b.category_id AS parent
        FROM categories a 
        LEFT JOIN categories b ON b.category_id = a.category_parent
        ORDER BY COALESCE (parent,id), parent IS NOT NULL, id";
        return $this->db->query($str)->result();
    }

    public function create()
    {
        $data['post_title'] = $this->input->post('title');
        $data['post_name'] = strtolower(url_title($this->input->post('title')));
        $data['post_content'] = $this->input->post('content');
        $data['post_tag'] = $this->input->post('tag');
        $data['post_status'] = $this->input->post('status');
        $data['post_type'] = $this->input->post('type');
        $data['post_date'] = $this->input->post('datetime');
        $data['post_modified'] = date('Y-m-d H:i:s');
        $data['post_category'] = serialize($this->input->post('category_id'));  
        $data['post_author'] = $this->session->userdata('user_id');

        $this->db->insert('wp_posts',$data);
        return $this->db->insert_id();

        if($this->db->affected_rows() == 1){
            $this->session->set_flashdata('msg',
                '<div class="callout callout-success">
                    New content has been added
                </div>');
        }
    }

    public function update($filter)
    {
        $data['post_title'] = $this->input->post('title');
        $data['post_name'] = strtolower(url_title($this->input->post('title')));
        $data['post_content'] = $this->input->post('content');
        $data['post_tag'] = $this->input->post('tag');
        $data['post_status'] = $this->input->post('status');
        $data['post_type'] = $this->input->post('type');
        // $data['post_date'] = $this->input->post('datetime');
        $data['post_modified'] = date('Y-m-d H:i:s');
        $data['post_category'] = serialize($this->input->post('category_id'));  

        $this->db->update('wp_posts', $data, $filter);
        if($this->db->affected_rows() == 1){
            $this->session->set_flashdata('msg','<div class="callout callout-success">
                Content has been updated
                </div>');
        }
    }

    public function count($filter)
    {
        return $this->db->get_where('wp_posts',$filter)->num_rows();
    }

    public function delete($id)
    {
        $data['post_status'] = 'trash';
        $this->db->update('wp_posts',$data,array('ID'=>$id));
        if($this->db->affected_rows() == 1){
            $this->session->set_flashdata('msg','<div class="alert alert-success">Content has been deleted</div>');
        }
    }

    public function update_pc($id = 0)
    {
        $field = $this->input->post('category_id');
        $this->db->delete('wp_posts_categories',array('post_id'=>$id));
        foreach ($field as $value) {
            $data['post_id'] = $id;
            $data['category_id'] = $value;
            $this->db->insert('wp_posts_categories',$data);
        }
    }
}