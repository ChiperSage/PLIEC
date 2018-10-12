<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Add New User</h3>
  </div>
  <!-- /.box-header -->
  <!-- form start -->
  <form class="form-horizontal" method="post" action="<?php echo base_url('user/create_user') ?>">
    <div class="box-body">

      <p><?php echo lang('create_user_subheading');?></p>
      <div id="infoMessage"><?php echo $message;?></div>

      <?php if($identity_column!=='email') { ?>

        <div class="form-group">
          <label for="inputEmail3" class="col-sm-2 control-label">Username</label>
          <div class="col-sm-4">
            <?php 
            // echo form_error('identity');
            echo form_input($identity)
            ?>
          </div>
        </div>
        
      <?php } ?>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-4">
          <?php echo form_input($email);?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-4">
          <?php echo form_input($first_name);?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-4">
          <?php echo form_input($last_name);?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-4">
          <?php echo form_input($password);?>
        </div>
      </div>

      <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password</label>
        <div class="col-sm-4">
          <?php echo form_input($password_confirm);?>
        </div>
      </div>

    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">            
            <button type="submit" class="btn btn-primary">Add New User</button>
            <!-- <input type="checkbox"> Remember me -->
          </div>
        </div>
      </div>

      <!-- <button type="submit" class="btn btn-info pull-right">Sign in</button> -->
    </div>
    <!-- /.box-footer -->
  </form>
</div>