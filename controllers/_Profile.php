<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('blog_model'));
	}

	public function index($page = 0)
	{
		$data['posts'] = $this->blog_model->get_mypost($page);
		$this->load->view('admin_fb/index',$data);
	}

	public function create()
	{	
		$this->form_validation->set_rules('name','Title','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'form';
			$this->load->view('admin_fb/index',$data);
		}else{
			$this->blog_model->create();
			redirect('profile');
		}
	}

	public function update($id = 0)
	{
		$user_id = $this->session->userdata('user_id');
		$key = array('Article_Id'=>$id, 'User_Id'=>$user_id);

		$this->form_validation->set_rules('name','Title','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'form';
			$data['post'] = $this->blog_model->get_detail_post($key);
			$this->load->view('admin_fb/index',$data);
		}else{
			$this->blog_model->update($key);
			redirect('profile');
		}
	}
}
