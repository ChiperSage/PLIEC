<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('article_model'));
	}

	public function index($page = 0)
	{
		$key = array('Article_Type'=>'page');
		
		$data['inc'] = 'art_table';
		$data['posts'] = $this->article_model->get_items($key, "Article_DateCreate DESC", 25, $page);
		$data['base_url'] = base_url('page/index');
		$data['total_rows'] = $this->article_model->count($key);
		$data['uri_segment'] = 3;
		$data['per_page'] = 25;

		$this->load->view('admin/index', $data);
	}	
}

=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model(array('article_model'));
	}

	public function index($page = 0)
	{
		$key = array('Article_Type'=>'page');
		
		$data['inc'] = 'art_table';
		$data['posts'] = $this->article_model->get_items($key, "Article_DateCreate DESC", 25, $page);
		$data['base_url'] = base_url('page/index');
		$data['total_rows'] = $this->article_model->count($key);
		$data['uri_segment'] = 3;
		$data['per_page'] = 25;

		$this->load->view('admin/index', $data);
	}	
}

>>>>>>> 13ee0b489aeb97ff5b6d01ca8914b73191598cdf
