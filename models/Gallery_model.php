<?php
class Gallery_model extends CI_Model {

	public function get_images($key)
	{
		$this->db->select('Article_Id, Article_Images');
		$query = $this->db->get_where('tbl_article', $key);
		return $query->row();
	}

	public function get_image($image_id)
	{
		$this->db->select('Article_Images');
		$query = $this->db->get_where('tbl_article', $key);
		$row = $query->row();
		return $row->Article_Images[$image_id];
	}

	public function create($article_id, $image_id)
	{
		$article = $this->gallery_model->get_images(array('Article_Id'=>$article_id));
		$images = unserialize($article->Article_Images);

		$images[$image_id] = array('image'=>$this->input->post('image'),
			'title'=>$this->input->post('title'),
			'status'=>$this->input->post('status'));

		$key = array('Article_Id'=>$article_id);
		$data['Article_Images'] = serialize($images);
		$this->db->update('tbl_article', $data, $key);
	}

	public function update($article_id, $image_id)
	{
		$article = $this->gallery_model->get_images(array('Article_Id'=>$article_id));
		$images = unserialize($article->Article_Images);

		$images[$image_id] = array('image'=>$this->input->post('image'),
			'title'=>$this->input->post('title'),
			'status'=>$this->input->post('status'));

		$key = array('Article_Id'=>$article_id);
		$data['Article_Images'] = serialize($images);
		$this->db->update('tbl_article', $data, $key);
	}

}