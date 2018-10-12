<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('ion_auth','form_validation'));
		$this->load->helper(array('url','language'));

		$this->form_validation->set_error_delimiters(
			$this->config->item('error_start_delimiter', 'ion_auth'), 
			$this->config->item('error_end_delimiter', 'ion_auth'));

		$this->lang->load('auth');
		
		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');			
		}elseif (!$this->ion_auth->is_admin()) {
			// redirect('auth/login', 'refresh');
			show_error('You must be an administrator to access this page');			
		}
	}

	public function index()
	{
		$this->load->model('admin_m');

		$data['tpost'] = $this->admin_m->count('wp_posts', array('post_status'=>'publish'));
		$data['tpostdraft'] = $this->admin_m->count('wp_posts', array('post_status'=>'draft'));
		$data['tuser'] = $this->admin_m->count('users', array());
		$data['tcategory'] = $this->admin_m->count('categories', array());
		$this->load->view('admin/index',$data);
	}
}
