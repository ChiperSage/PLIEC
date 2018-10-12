<?php 
$config['base_url'] = base_url();
$config['total_rows'] = 100;
$config['per_page'] = 10;
$config['uri_segment'] = 3;

if(isset($base_url)){
	$config['base_url'] = $base_url;
}
if(isset($total_rows)){
	$config['total_rows'] = $total_rows;
}
if(isset($per_page)){
	$config['per_page'] = $per_page;
}

$config['cur_tag_open'] = '<li class="active"><a>';
$config['cur_tag_close'] = '</a></li>';

$config['first_tag_open'] = '<li>';
$config['first_tag_close'] = '</li>';
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
$config['last_tag_open'] = '<li>';
$config['last_tag_close'] = '</li>';

$this->pagination->initialize($config);
?>

<div class="pagination-bar">
  <ul class="pagination">
   <?php echo $this->pagination->create_links(); ?>
  </ul>
</div>


<!-- <div class="pagination-bar">
	<ul class="pagination">
		<li class="active"><a href="#">1</a></li>
		<li><a href="#">2</a></li>
		<li><a href="#">3</a></li>
		<li><a href="#">4</a></li>
		<li><a href="#"> ...</a></li>
		<li><a class="pagination-btn" href="#">Next »</a></li>
	</ul>
</div> -->