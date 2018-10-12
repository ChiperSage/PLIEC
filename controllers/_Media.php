<<<<<<< HEAD
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{		
		$data['inc'] = 'media';
		$this->load->view('admin/index', $data);
	}
}
=======
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('user_model');
	}

	public function index()
	{		
		$data['inc'] = 'media';
		$this->load->view('admin/index', $data);
	}
}
>>>>>>> 13ee0b489aeb97ff5b6d01ca8914b73191598cdf
