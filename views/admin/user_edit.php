<!-- <h1><?php echo lang('edit_user_heading');?></h1> -->

<div class="box box-info">
  <div class="box-header with-border">
    <h3 class="box-title">Profile</h3>
  </div>

  <!-- /.box-header -->
  <!-- form start -->
  <?php echo form_open(uri_string(),'class="form-horizontal"');?>

  <div class="box-body">

    <p><?php echo lang('edit_user_subheading');?></p>
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
      <label for="inputEmail3" class="col-sm-2 control-label">Password Confirm</label>
      <div class="col-sm-4">
        <?php echo form_input($password_confirm);?>
      </div>
    </div>

    <div class="form-group">
      <label for="inputEmail3" class="col-sm-2 control-label">Member of Group</label>
      <div class="col-sm-4">

       <?php if ($this->ion_auth->is_admin()): ?>

        <!-- <h3><?php echo lang('edit_user_groups_heading');?></h3> -->
        <?php foreach ($groups as $group):?>
          <?php
          $gID=$group['id'];
          $checked = null;
          $item = null;
          foreach($currentGroups as $grp) {
            if ($gID == $grp->id) {
              $checked= ' checked="checked"';
              break;
            }
          }
          ?>
          <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
          <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
        <?php endforeach?>

      <?php endif ?>
    </div>
  </div>
</div>

<?php echo form_hidden('id', $user->id);?>
<?php echo form_hidden($csrf); ?>

<!-- /.box-body -->
<div class="box-footer">
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">            
        <button type="submit" class="btn btn-primary">Update Profile</button>
        <!-- <input type="checkbox"> Remember me -->
      </div>
    </div>
  </div>

  <!-- <button type="submit" class="btn btn-info pull-right">Sign in</button> -->
</div>
<!-- /.box-footer -->

<?php echo form_close();?>

</div>