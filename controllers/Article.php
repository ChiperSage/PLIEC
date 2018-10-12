<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('post_m'));

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');			
		}elseif (!$this->ion_auth->is_admin()) {
			// redirect('auth/login', 'refresh');
			show_error('You must be an administrator to access this page');			
		}
	}

	public function index($page = 0)
	{
		$filter = array('post_type'=>'post','post_status !='=>'trash');	

		$data['first_url'] = '';
		$data['suffix'] = '';
		if(isset($_GET['status']))
		{ 
			$filter = array('post_type'=>'post','post_status'=>$_GET['status']);	
			$data['first_url'] = base_url().'article/index/0/?status='.$_GET['status'];
			$data['suffix'] = '/?status='.$_GET['status'];
		}

		if(isset($_GET['type']))
		{ 
			$filter = array('post_type'=>'page');	
			$data['first_url'] = base_url().'article/index/0/?type='.$_GET['type'];
			$data['suffix'] = '/?type='.$_GET['type'];
		}

		if(isset($_GET['keyword']))
		{ 
			$var = $_GET['keyword'];	
			$filter = array('post_type'=>'post', 'post_title LIKE'=>'%'.$var.'%');	
			$data['first_url'] = base_url().'article/index/0/?keyword='.$var;
			$data['suffix'] = '/?keyword='.$var;
		}

		$data['inc'] = 'article_table';
		$data['articles'] =  $this->post_m->get($filter,'post_date DESC',15,$page);
		$data['category'] =  $this->post_m->get_category_name();

		$data['total_rows'] = $this->post_m->count($filter);
		$data['base_url'] = base_url('article/index');
		$data['uri_segment'] = 3;
		$data['per_page'] = 15;	

		$this->load->view('admin/index',$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('content','Content','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'article_form';
			// $data['category'] = $this->post_m->get_category();
			$data['category_list'] = $this->post_m->get_category_select();
			$this->load->view('admin/index',$data);
		}else{			
			$id = $this->post_m->create();
			$this->post_m->update_pc($id);

			redirect('article');
		}
	}

	public function update($id = 0)
	{
		// $this->output->enable_profiler(TRUE);

		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('content','Content','trim|required');

		$filter = array('ID'=>$id);

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'article_form';
			$data['category_list'] = $this->post_m->get_category_select();
			$data['article'] = $this->post_m->get_detail($filter);
			$this->load->view('admin/index',$data);
		}else{
			$this->post_m->update($filter);
			$this->post_m->update_pc($id);

			redirect('article');
		}
	}

	public function delete($id = 0)
	{
		$this->post_m->delete($id);
		redirect('article/index');
	}
}