<?php
class Category_model extends CI_Model {

	var $table_name;

	public function __construct(){
		$this->table_name = 'categories';
	}

	public function get($key)
	{
		$this->db->select('a.*, b.category_name as category_parent');
		$this->db->from('categories a');		
		$this->db->join('categories b','b.category_id = a.category_parent','left');		
		$this->db->where($key);
		$this->db->group_by('a.category_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_detail($key)
	{
		$query = $this->db->get_where($this->table_name, $key);
		return $query->row();
	}	

	public function get_parent($filter)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);		
		$this->db->where($filter);
		$query = $this->db->get();
		return $query->result();
	}

	public function create()
	{
		$data = array('category_name' => $this->input->post('name'), 
			'category_slug' => url_title(strtolower($this->input->post('name'))),
			'category_parent' => $this->input->post('parent'),
			'category_desc' => $this->input->post('desc'),
			'category_desc' => $this->input->post('desc'));
		$this->db->insert($this->table_name, $data);	
		$result = $this->db->affected_rows();	
		if($result = 1)
		{
			$this->session->set_flashdata('msg','<div class="callout callout-success">New category has been added</div>');
		}
	}

	public function update($id)
	{
		$key = array('category_id' => $id);
		$data = array('category_name' => $this->input->post('name'), 
			'category_slug' => url_title(strtolower($this->input->post('name'))),
			'category_parent' => $this->input->post('parent'),
			'category_desc' => $this->input->post('desc'));
		$this->db->update($this->table_name, $data, $key);		
		$result = $this->db->affected_rows();
		if($result = 1)
		{
			$this->session->set_flashdata('msg','<div class="callout callout-success">Category has been updated</div>');
		}
	}

	public function count($key)
	{
		$query = $this->db->get_where($this->table_name, $key);
		return $query->num_rows();
	}

	// public function get_categories($key = array(), $sort = "category_id DESC", $limit = 10, $page = 0)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from($this->table_name);		
	// 	$this->db->where($key);
	// 	$this->db->order_by($sort);
	// 	$this->db->limit($limit, $page);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// public function archive($key = array(), $sort = "category_id DESC", $limit = 10, $page = 0)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from($this->table_name);		
	// 	$this->db->where($key);
	// 	$this->db->order_by($sort);
	// 	$this->db->limit($limit, $page);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	// public function gets($key, $sort, $limit, $page)
	// {
	// 	$this->db->select('categories.*,t2.category_name as parent_name');
	// 	$this->db->from($this->table_name);		
	// 	$this->db->join('categories as t2','t2.category_id = categories.category_parent','left');
	// 	$this->db->where($key);
	// 	// $this->db->group_by('parent_name');
	// 	$this->db->order_by($sort);
	// 	$this->db->limit($limit, $page);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }
	
}