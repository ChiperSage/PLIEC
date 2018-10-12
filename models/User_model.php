<?php
class User_model extends CI_Model {
	
	var $table_name;

	public function __construct(){
		parent::__construct();
		$this->table_name = 'users';
	}

	public function get($key = array(), $order = "user_id ASC", $limit = 15, $page = 0)
	{
		$this->db->select('*');
		$this->db->from('users');
		// $this->db->join('tbl_group','tbl_group.Group_Id = tbl_user.User_Group','left');
		$this->db->where($key);
		$this->db->order_by($order);
		$this->db->limit($limit, $page);	
		$query = $this->db->get();
		return $query->result();
	}

	public function get_item($key)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where($key);
		$query = $this->db->get();
		return $query->row();
	}

	public function count($key)
	{
		$query = $this->db->get_where('tbl_user', $key);
		return $query->num_rows();
	}
	
	public function login()
	{		
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		
		$key = array('User_Username' => $username, 'User_Password' => $password, 'User_Status' => 1);
		$count = $this->user_model->count($key);
		$read = $this->user_model->get_item($key);

		if($count == 1)
		{
			$newdata = array('user_id' => $read->User_Id,
				'user_username' => $read->User_Firstname.' '.$read->User_Lastname,
				'user_role' => $read->User_Level,
				'logged_in' => true);			
			$this->session->set_userdata($newdata);
			redirect('admin');			
		}else{		
			$this->session->set_flashdata('msg','<p class="text text-danger">Username or password is incorrect</p>');
			redirect('auth/login');
		}
	}	

	public function logout(){
		$this->session->sess_destroy();
	}
	
	public function create()
	{		
		$password = $this->input->post('password');
		if(!empty($password)){
			$data['User_Password'] = md5($password);
		}

		$data = array('User_Username' => $this->input->post('username'),
			'User_Firstname' => $this->input->post('firstname'),
			'User_Lastname' => $this->input->post('lastname'),
			'User_Email' => $this->input->post('email'),
			'User_Url' => $this->input->post('website'),
			'User_Level' => $this->input->post('role'),
			'User_DateCreate' => date('Y-m-d H:i:s'),
			'User_DateUpdate' => date('Y-m-d H:i:s'));
		$this->db->insert('tbl_user', $data);
		$result = $this->db->affected_rows();
		if($result = 1)
		{
			$this->session->set_flashdata('msg','<div class="alert alert-success">New User Has Been Added.</div>');
		}
	}		
	
	public function update($id = 0)
	{
		$password = $this->input->post('password');
		if(!empty($password)){
			$data['User_Password'] = md5($password);
		}
		
		$key = array('User_Id' => $id);
		$data = array('User_Firstname' => $this->input->post('firstname'),
			'User_Lastname' => $this->input->post('lastname'),
			'User_Email' => $this->input->post('email'),
			'User_Url' => $this->input->post('website'),
			'User_About' => $this->input->post('about'),
			'User_Status' => $this->input->post('status'),
			'User_Level' => $this->input->post('role'),
			'User_DateUpdate' => date('Y-m-d H:i:s'));
		$this->db->update('tbl_user', $data, $key);
		$result = $this->db->affected_rows();
		if($result = 1)
		{
			$this->session->set_flashdata('msg','<div class="alert alert-success">User Updated.</div>');
		}
	}	
	
	public function delete($key)
	{
		$this->db->delete('tbl_user', $key);
	}

	
}