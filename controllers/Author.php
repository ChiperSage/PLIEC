<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('post_m'));
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters(
			$this->config->item('error_start_delimiter', 'ion_auth'), 
			$this->config->item('error_end_delimiter', 'ion_auth')
		);

		$this->lang->load('auth');
		
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');			
		}elseif (!$this->ion_auth->in_group('author')){
			show_error('You must be an author to access this page');						
		}
	}

	public function index($page = 0)
	{
		$author = $this->session->userdata('user_id');
		$filter = array('post_author'=>$author);	

		$data['first_url'] = '';
		$data['suffix'] = '';

		$data['inc'] = 'auth_article_table';
		$data['articles'] =  $this->post_m->get($filter, 'post_date DESC', 15, $page);
		$data['category'] =  $this->post_m->get_category_name();
		$data['total_rows'] = $this->post_m->count($filter);
		$data['base_url'] = base_url('author/index');
		$data['uri_segment'] = 3;
		$data['per_page'] = 15;	

		$this->load->view('admin/auth_index',$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('content','Content','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'auth_article_form';
			// $data['category'] = $this->post_m->get_category();
			$data['category_list'] = $this->post_m->get_category_select();
			$this->load->view('admin/auth_index',$data);
		}else{
			$this->post_m->create();
			redirect('author');
		}
	}

	public function update($id = 0)
	{
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('content','Content','trim|required');

		$author = $this->session->userdata('user_id');
		$filter = array('ID'=>$id,'post_author'=>$author);

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'auth_article_form';
			$data['article'] = $this->post_m->get_detail($filter);
			$data['category_list'] = $this->post_m->get_category_select();
			$this->load->view('admin/auth_index',$data);
		}else{
			$this->post_m->update($filter);
			redirect('author');
		}
	}
}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Author extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('post_m'));
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters(
			$this->config->item('error_start_delimiter', 'ion_auth'), 
			$this->config->item('error_end_delimiter', 'ion_auth')
		);

		$this->lang->load('auth');
		
		if(!$this->ion_auth->logged_in()){
			redirect('auth/login', 'refresh');			
		}elseif (!$this->ion_auth->in_group('author')){
			show_error('You must be an author to access this page');						
		}
	}

	public function index($page = 0)
	{
		$author = $this->session->userdata('user_id');
		$filter = array('post_author'=>$author);	

		$data['first_url'] = '';
		$data['suffix'] = '';

		$data['inc'] = 'auth_article_table';
		$data['articles'] =  $this->post_m->get($filter, 'post_date DESC', 15, $page);
		$data['category'] =  $this->post_m->get_category_name();
		$data['total_rows'] = $this->post_m->count($filter);
		$data['base_url'] = base_url('author/index');
		$data['uri_segment'] = 3;
		$data['per_page'] = 15;	

		$this->load->view('admin/auth_index',$data);
	}

	public function create()
	{
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('content','Content','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'auth_article_form';
			// $data['category'] = $this->post_m->get_category();
			$data['category_list'] = $this->post_m->get_category_select();
			$this->load->view('admin/auth_index',$data);
		}else{
			$this->post_m->create();
			redirect('author');
		}
	}

	public function update($id = 0)
	{
		$this->form_validation->set_rules('title','Title','trim|required');
		$this->form_validation->set_rules('content','Content','trim|required');

		$author = $this->session->userdata('user_id');
		$filter = array('ID'=>$id,'post_author'=>$author);

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'auth_article_form';
			$data['article'] = $this->post_m->get_detail($filter);
			$data['category_list'] = $this->post_m->get_category_select();
			$this->load->view('admin/auth_index',$data);
		}else{
			$this->post_m->update($filter);
			redirect('author');
		}
	}
}
>>>>>>> 13ee0b489aeb97ff5b6d01ca8914b73191598cdf
