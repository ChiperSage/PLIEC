<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('main_m');
		$this->_init();
	}

	private function _init()
	{
		$this->output->set_template('classix');
	}

	public function index()
	{
		$data['category'] = $this->main_m->get_category();
		$data['latest_posts'] = $this->main_m->get_post(array('limit'=>9));


		$data['count_post'] = $this->main_m->count('wp_posts','ID');
		$data['count_category'] = $this->main_m->count('categories','category_id');
		$data['count_user'] = $this->main_m->count('users','id');
		$data['count_page'] = $this->main_m->count('wp_posts','id', array('post_type'=>'page'));
		$data['category'] = $this->main_m->get_category(array('category_parent'=>0));
		$this->load->view('classix/index',$data);
	}

	public function single()
	{
		$urls = explode('-', $this->uri->segment(3));
		$id = end($urls);

		$post = $this->main_m->get_post_detail($id);
		$data['post'] = $post['result'];
		$data['latest_category'] = $this->main_m->get_category();
		$data['latest_post'] = $this->main_m->get_post(array('limit'=>3));

		if($post['count'] > 0){
			$this->load->view('classix/single',$data);
		}else{
			$this->load->view('classix/404',$data);
		}
	}

	public function archive($page = 0)
	{
		$config = array();
		$config['page'] = $page;
		$config['limit'] = 7;
		
		if(isset($_GET['keyword']))
		{
			$config['keyword'] = $_GET['keyword'];
		}

		if(isset($_GET['keyword']) && isset($_GET['cat']) && $_GET['cat'] != '0')
		{
			$config['keyword'] = $_GET['keyword'];
			$config['cat'] = $_GET['cat'];
		}

		$posts = $this->main_m->get_post($config);

		$data['latest_category'] = $this->main_m->get_category();
		$data['latest_post'] = $this->main_m->get_post(array('limit'=>3));

		$data['posts'] = $posts['result'];
		$data['base_url'] = base_url('main/archive');
		$data['per_page'] = 7;
		$data['total_rows'] = $posts['count'];
		$data['recent_posts'] = $this->main_m->get_post();

		$this->load->view('classix/archive',$data);
	}

	public function category($id = 0, $page = 0)
	{
		$config = array('category'=>$id);

		$posts = $this->main_m->get_post($config);

		$data['latest_category'] = $this->main_m->get_category();
		$data['latest_post'] = $this->main_m->get_post(array('limit'=>3));
		
		$data['posts'] = $posts['result'];
		$data['base_url'] = base_url('main/category/'.$id);
		$data['per_page'] = 7;
		$data['total_rows'] = $posts['count'];

		$this->load->view('classix/archive',$data);
	}
}
