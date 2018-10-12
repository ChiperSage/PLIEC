<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model(array('category_model'));

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
	}

	public function index($page = 0)
	{
		$array = array();
		$data['inc'] = 'category_table';
		$data['categories'] = $this->category_model->get($array);
		$this->load->view('admin/index', $data);
	}	

	public function create()
	{
		$this->form_validation->set_rules('name','Name','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'category_form';
			$data['parent_list'] = $this->category_model->get_parent(array('category_parent'=>0));
			$this->load->view('admin/index', $data);
		}else{			
			$this->category_model->create();
			redirect('category');
		}		
	}	

	public function update($id = 0)
	{
		$this->form_validation->set_rules('name','Name','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'category_form';
			$data['category'] = $this->category_model->get_detail(array('category_id' => $id));
			$data['parent_list'] = $this->category_model->get_parent(array('category_id !='=>$id, 'category_parent'=>0));
			$this->load->view('admin/index', $data);
		}else{			
			$this->category_model->update($id);
			redirect('category');
		}		
	}
}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	function __construct(){
		parent::__construct();		
		$this->load->model(array('category_model'));

		if (!$this->ion_auth->logged_in())
		{
			redirect('auth/login', 'refresh');
		}
		elseif (!$this->ion_auth->is_admin()) // remove this elseif if you want to enable this for non-admins
		{
			// redirect them to the home page because they must be an administrator to view this
			return show_error('You must be an administrator to view this page.');
		}
	}

	public function index($page = 0)
	{
		$array = array();
		$data['inc'] = 'category_table';
		$data['categories'] = $this->category_model->get($array);
		$this->load->view('admin/index', $data);
	}	

	public function create()
	{
		$this->form_validation->set_rules('name','Name','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'category_form';
			$data['parent_list'] = $this->category_model->get_parent(array('category_parent'=>0));
			$this->load->view('admin/index', $data);
		}else{			
			$this->category_model->create();
			redirect('category');
		}		
	}	

	public function update($id = 0)
	{
		$this->form_validation->set_rules('name','Name','trim|required');

		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'category_form';
			$data['category'] = $this->category_model->get_detail(array('category_id' => $id));
			$data['parent_list'] = $this->category_model->get_parent(array('category_id !='=>$id, 'category_parent'=>0));
			$this->load->view('admin/index', $data);
		}else{			
			$this->category_model->update($id);
			redirect('category');
		}		
	}
}
>>>>>>> 13ee0b489aeb97ff5b6d01ca8914b73191598cdf
