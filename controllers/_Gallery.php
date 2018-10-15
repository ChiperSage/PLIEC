<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('gallery_model');
	}

	public function index($article_id = 0, $page = 0)
	{	
		$data['inc'] = 'gal_table';
		$data['images'] = $this->gallery_model->get_images(array('Article_Id'=>$article_id));
		$this->load->view('admin/index',$data);
	}	

	public function create($article_id = 0, $image_id = 0)
	{
		$this->form_validation->set_rules('image','Image','trim|required');
		$this->form_validation->set_rules('title','Title','trim');
		
		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'gal_form';
			$data['images'] = $this->gallery_model->get_images(array('Article_Id'=>$article_id));
			$this->load->view('admin/index',$data);
		}else{
			$this->gallery_model->create($article_id, $image_id);			
			redirect('gallery/index/'.$article_id);
		}
	}

	public function update($article_id = 0, $image_id = 0)
	{
		$this->form_validation->set_rules('image','Image','trim|required');
		$this->form_validation->set_rules('title','Title','trim');
		
		if($this->form_validation->run() == false)
		{
			$data['inc'] = 'gal_form';
			$data['images'] = $this->gallery_model->get_images(array('Article_Id'=>$article_id));
			$this->load->view('admin/index',$data);
		}else{
			$this->gallery_model->create($article_id, $image_id);			
			redirect('gallery/index/'.$article_id);
		}
	}

	public function delete($image_id = 0)
	{

	}

}

