<div class="row col-sm-4 col-sm-offset-4">
  <div class="panel panel-default">
    <!-- <div class="panel-heading"><h1>Login</h1></div> -->
    <div class="panel-body">

      <h3 class="page-header">Login</h3>

      <?php 
      echo validation_errors('<div class="alert alert-danger">','</div>'); 
      echo $this->session->flashdata('msg');
      ?>

      <form action="" method="post">

        <div class="form-group">
          <!-- <label for="inputEmail3">Username</label><br> -->
          <input type="text" name="username" class="form-control" autocomplete="off" placeholder="Masukkan username">
        </div>
        
        <div class="form-group">
          <!-- <label for="inputPassword3">Password</label> -->
          <input type="password" class="form-control" name="password" placeholder="Masukkan password">
        </div>
        
        <div class="form-group">
          <button type="submit" class="btn btn-info">Log In</button>
          <!-- <input type="checkbox"> Remember Me     -->
        </div>
        <!-- <a href="<?php echo base_url('membership/forgot') ?>">I Forgot My Password?</a> -->

      </form>

    </div>
  </div>
</div>

