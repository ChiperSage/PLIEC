<h3>Add Image</h3>

<?php
print_r(unserialize($images->Article_Images));
?>

<?php 
echo validation_errors('<div class="alert alert-danger">','</div>'); 
echo $this->session->flashdata('msg');
?>

<form action="" method="post" class="form-horizontal">	
	<div class="form-group">
		<label for="" class="col-sm-4">Image</label>
		<div class="col-sm-8">
			<input type="text" name="image" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-4">Title</label>
		<div class="col-sm-8">
			<input type="text" name="title" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-sm-4">Status</label>
		<div class="col-sm-4">
		<?php 
		$field = array('1'=>'Active','0'=>'Deactive');
		echo form_dropdown('status', $field, 1, 'class="form-control"');
		?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-8 pull-right">
			<button type="submit" class="btn btn-info">Save</button>
			<a href="#" class="btn btn-default"><span class="text-danger">Delete</span></a>
		</div>
	</div>
</form>


