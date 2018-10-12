<?php 
class Main_m extends CI_Model {

	public function __construct(){
		parent::__construct();
	}

	// public function get_data()
	// {
	// 	$data['pages'] 		= '';
	// 	$data['menus'] 		= $this->get_categories();
	// 	$data['headline'] 	= $this->get_posts(array(), 'Article_DateCreate DESC', 5, 0);
	// 	$data['posts'] 		= $this->get_posts(array(), 'Article_DateCreate DESC', 40, 0);
	// 	return $data;
	// }

	public function get_category()
	{
		$filter = array('category_parent'=>0);
		$this->db->limit(8);
		$category = $this->db->get_where('categories', $filter)->result();
		
		$subs = array();
		foreach ($category as $value) {
			$filter = array('category_parent'=>$value->category_id);
			$subs[$value->category_id] = $this->db->get_where('categories', $filter)->result();
		}

		$data['category'] = $category; 
		$data['subcategory'] = $subs;
		return $data;
	}

	public function get_post($config = array())
	{
		$date 	= date('Y-m-d H:i:s');		
		$filter = array('post_type'=>'post','post_status'=>'publish','post_date <'=>$date);
		$order 	= isset($config['order']) ? $config['order'] : 'a.post_date DESC' ;
		$limit 	= isset($config['limit']) ? $config['limit'] : 10 ;
		$page 	= isset($config['page']) ? $config['page'] : 0 ;

		// pencarian
		if(isset($config['keyword'])){
			$keyword = array('a.post_title LIKE'=>'%'.$config['keyword'].'%');
			$filter = array_merge($keyword, $filter);
		}
		if(isset($config['keyword']) && isset($config['cat'])){
			$keyword = array('a.post_title LIKE'=>'%'.$config['keyword'].'%','b.category_id'=>$config['cat']);
			$filter = array_merge($keyword, $filter);
		}

		// category
		if(isset($config['category'])){
			$category = array('b.category_id'=>$config['category']);
			$filter = array_merge($category, $filter);
		}

		$this->db->select('*');
		$this->db->from('wp_posts a');		
		$this->db->join('wp_posts_categories b','a.ID = b.post_id','left');		
		$this->db->join('categories c','b.category_id = c.category_id','left');		
		$this->db->join('users d','a.post_author = d.id','left');		
		$this->db->where($filter);
		$this->db->group_by('a.ID');
		$this->db->order_by($order);
		$this->db->limit($limit, $page);
		$query = $this->db->get();
		$data['result'] = $query->result();
		
		$this->db->select('a.ID');
		$this->db->join('wp_posts_categories b','a.ID = b.post_id','left');
		// $this->db->join('users c','wp_posts.post_author = c.id','left');		
		$data['count'] = $this->db->get_where('wp_posts a', $filter)->num_rows();

		return $data;
	}

	public function get_post_detail($id = 0)
	{
		$date = date('Y-m-d H:i:s');
		$filter = array('post_type'=>'post','post_status'=>'publish','post_date <'=>$date,'a.ID'=>$id);
		
		$this->db->select('*');
		$this->db->from('wp_posts a');	
		$this->db->join('users b','a.post_author = b.id','left');			
		$this->db->where($filter);
		$this->db->limit(1);
		$query = $this->db->get();
		$data['result'] = $query->row();

		$this->db->select('a.ID');
		$this->db->join('users b','a.post_author = b.id','left');			
		$data['count'] = $this->db->get_where('wp_posts a', $filter)->num_rows();
		return $data;
	}

	public function count($tb = '', $column = '', $filter = array())
	{
		$this->db->select($column);
		return $this->db->get_where($tb, $filter)->num_rows();
	}

	// public function ajaxrelated($id)
	// {
	// 	$this->db->get_where('tbl_article', array('Article_Id' => $id));
	// 	$query = $this->db->get();
	// 	$post = $query->row();

	// 	$tags = $post->Article_Tag;
	// 	$tag = $tags[0];

	// 	$this->db->select('Article_Id, Article_Name, Article_Slug');
	// 	$this->db->from('tbl_article');
	// 	$this->db->where("Article_Tag LIKE '%$tag%'");
	// 	$this->db->order('Article_DateCreate','DESC');
	// 	$this->db->limit(5, 0);
	// 	$query = $this->db->get();
	// 	return $query->result();
	// }

	

	// public function view_inc($id = 0)
	// {
	// 	if($this->session->userdata('logged_in') != true)
	// 	{
	// 		$key = array('Article_Id' => $id);
	// 		$this->db->select('Article_View');
	// 		$this->db->from('tbl_article');		
	// 		$this->db->where($key);
	// 		$query = $this->db->get();
	// 		$post = $query->row();

	// 		$data = array('Article_View' => $post->Article_View + 1);
	// 		$this->db->update('tbl_article', $data, $key);
	// 	}
	// }
}