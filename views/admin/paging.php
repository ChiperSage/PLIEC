<?php 
$config['first_url'] = $first_url;
$config['suffix'] = $suffix;

$config['base_url'] = $base_url;
$config['total_rows'] = $total_rows;
$config['per_page'] = $per_page;
$config['uri_segment'] = $uri_segment;

$config['cur_tag_open'] = '<li class="page-item active"><a class="page-link">';
$config['cur_tag_close'] = '</a></li>';

$config['first_tag_open'] = '<li class="page-item"><a class="page-link" ';
$config['first_tag_close'] = '</a></li>';
$config['prev_tag_open'] = '<li class="page-item"><a class="page-link" ';
$config['prev_tag_close'] = '</li>';
$config['num_tag_open'] = '<li class="page-item"><a class="page-link" ';
$config['num_tag_close'] = '</li>';
$config['next_tag_open'] = '<li class="page-item"><a class="page-link" ';
$config['next_tag_close'] = '</li>';
$config['last_tag_open'] = '<li class="page-item"><a class="page-link" ';
$config['last_tag_close'] = '</li>';


if(isset($_GET['search'])){
	$config['first_url'] = '/search/0/?search='.$_GET['search'];
	$config['suffix'] = '/?search='.$_GET['search'];
}


$this->pagination->initialize($config);
?>

<nav aria-label="Page navigation example">
  <ul class="pagination">
   <?php echo $this->pagination->create_links(); ?>
  </ul>
</nav>