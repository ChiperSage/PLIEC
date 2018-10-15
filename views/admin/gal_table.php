<?php
$Article_Id = $images->Article_Id;
if(count($images) == 1){
	$images = unserialize($images->Article_Images);
}
$num = count($images);
?>

<p>
	<h3>All Images</h3>
	<a class="label label-danger" href="<?php echo base_url('gallery/create/'.$this->uri->segment(3).'/'.$num) ?>">Add New</a>
</p>

<table class="table table-hover table-striped">
	<thead>
		<tr>
			<th width="50">No.</th>
			<th>Title</th>
			<th>Filename</th>
			<th>Status</th>
			<th>ID</th>
		</tr>
	</thead>
	<tbody>
		<?php
		$i = 0; foreach ($images as $key => $value) { $i++ 
		?>
		<tr>
			<td><?php echo $key ?></td>
			<td><?php echo anchor('gallery/update/'.$Article_Id.'/'.$key,$value['image']) ?></td>
			<td><?php echo $value['title'] ?></td>
			<td><?php echo $value['status'] ?></td>
			<td><?php //echo $key ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>