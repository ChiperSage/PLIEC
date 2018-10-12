<?php 
$username   = isset($user) ? $user->User_Username : '' ;
$firstname  = isset($user) ? $user->User_Firstname : '' ;
$lastname   = isset($user) ? $user->User_Lastname : '' ;
$email      = isset($user) ? $user->User_Email : '' ;
$website    = isset($user) ? $user->User_Url : '' ;
$about      = isset($user) ? $user->User_About : '' ;
$status     = isset($user) ? $user->User_Status : 1 ;
$role       = isset($user) ? $user->User_Level : 3 ;
?>

<h3>Profil</h3>

<?php echo isset($msg) ? $msg : '' ; ?>

<?php echo $this->session->flashdata('msg'); ?>

<?php echo validation_errors('<div class="alert alert-danger">','</div>') ?>

<form action="" method="post" class="form-horizontal">

	<div class="form-group">
		<label for="username" class="col-sm-3">Username</label>
		<div class="col-sm-4">
			<input type="text" name="username" value="<?php echo $username ?>" class="form-control">      
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-3">First Name</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" value="<?php echo $firstname ?>" name="firstname">
		</div>
	</div>
	<div class="form-group">
		<label for="inputPassword3" class="col-sm-3">Last Name</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" value="<?php echo $lastname ?>" name="lastname">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3">Email</label>
		<div class="col-sm-5">
			<input type="email" value="<?php echo $email ?>" name="email" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3">Website</label>
		<div class="col-sm-6">
			<input type="text" value="<?php echo $website ?>" name="website" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3">Biographical Info</label>
		<div class="col-sm-9">
			<textarea name="about" rows="10" class="form-control"><?php echo $about ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3">Role</label>
		<div class="col-sm-4">
			<?php 
			$role_data = $this->config->item('role');
			echo form_dropdown('role', $role_data, $role,'class="form-control"');
			?>
		</div>
	</div>
	<div class="form-group">
		<label for="inputEmail3" class="col-sm-3">New Password</label>
		<div class="col-sm-4">
			<input type="text" name="password" class="form-control">
		</div>
	</div>
	<div class="form-group ">
		<label for="inputEmail3" class="col-sm-3">Status</label>
		<div class="col-sm-4">
			<?php 
			$field = $this->config->item('status');
			echo form_dropdown('status', $field, $status,'class="form-control"');
			?>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-9 pull-right"> 
			<button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-ok"></span> Save</button>
			<a class="btn btn-default" href="#"><span class="text-danger">Delete</span></a>
		</div>
	</div>
</form>
