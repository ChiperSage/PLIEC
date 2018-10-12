<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>E-Plik | Dashboard</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	
	<!-- Bootstrap 3.3.7 -->
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
  	folder instead of downloading all of them to reduce the load. -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/css/skins/_all-skins.min.css">
  	<!-- Morris chart -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/morris.js/morris.css">
  	<!-- jvectormap -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/jvectormap/jquery-jvectormap.css">
  	<!-- Date Picker -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  	<!-- Daterange picker -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  	<!-- bootstrap wysihtml5 - text editor -->
  	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">

  	<!-- jQuery 3 -->
  	<script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
  	<!-- jQuery UI 1.11.4 -->
  	<script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/jquery-ui/jquery-ui.min.js"></script>

  	<div class="wrapper">

  		<header class="main-header">
  			<!-- Logo -->
  			<a href="<?php echo base_url('author') ?>" class="logo">
  				<!-- mini logo for sidebar mini 50x50 pixels -->
  				<span class="logo-mini"><b>A</b>LT</span>
  				<!-- logo for regular state and mobile devices -->
  				<span class="logo-lg"><b>E</b>-Plik</span>
  			</a>
  			<!-- Header Navbar: style can be found in header.less -->
  			<nav class="navbar navbar-static-top">
  				<!-- Sidebar toggle button-->
  				<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
  					<span class="sr-only">Toggle navigation</span>
  				</a>

  				<div class="navbar-custom-menu">
  					<ul class="nav navbar-nav">

  						<!-- User Account: style can be found in dropdown.less -->
  						<li class="dropdown user user-menu">
  							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
  								<img src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/img/user-blank.jpg" class="user-image">
  								<span class="hidden-xs text-capitalize"><?php echo $this->session->userdata('username') ?></span>
  							</a>
  							<ul class="dropdown-menu">
  								<!-- User image -->
  								<li class="user-header">
  									<img src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/img/user-blank.jpg" class="img-circle" alt="User Image">

  									<p class="text-capitalize">
  										<?php echo $this->session->userdata('username') ?>
  										<!-- <small>Member since Nov. 2012</small> -->
  									</p>
  								</li>
  								<!-- Menu Body -->

  								<!-- Menu Footer-->
  								<li class="user-footer">
  									<!-- <div class="pull-left">
  										<a href="#" class="btn btn-default btn-flat">Edit Profile</a>
  									</div> -->
  									<div class="pull-right">
  										<a href="<?php echo base_url('auth/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
  									</div>
  								</li>
  							</ul>
  						</li>
  						<!-- Control Sidebar Toggle Button -->
  					</ul>
  				</div>
  			</nav>
  		</header>
  		<!-- Left side column. contains the logo and sidebar -->
  		<aside class="main-sidebar">
  			<!-- sidebar: style can be found in sidebar.less -->
  			<section class="sidebar">
  				<!-- Sidebar user panel -->
  				<div class="user-panel">
  					<div class="pull-left image">
  						<img src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/img/user-blank.jpg" class="img-circle" alt="User Image">
  					</div>
  					<div class="pull-left info">
  						<p><?php echo $this->session->userdata('username') ?></p>
  						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
  					</div>
  				</div>
  				<!-- search form -->

  				<!-- <form action="#" method="get" class="sidebar-form">
  					<div class="input-group">
  						<input type="text" name="q" class="form-control" placeholder="Search...">
  						<span class="input-group-btn">
  							<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
  							</button>
  						</span>
  					</div>
  				</form> -->
  				
          <!-- /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu" data-widget="tree">
           <li class="header">MAIN NAVIGATION</li>	
           <li>
            <a href="<?php echo base_url('author') ?>">
              <i class="fa fa-edit"></i> <span>Posts</span>
           </a>
         </li>

       </ul>
     </section>
     <!-- /.sidebar -->
   </aside>

   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
     <!-- Content Header (Page header) -->
<!-- 	<section class="content-header">
		<h1>
			Dashboard
			<small>Control panel</small>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Dashboard</li>
		</ol>
	</section> -->

	<section class="content">
		<!-- Main content -->
		<?php 
		if(!isset($inc)){
			include('home.php');
		}else{
			include($inc.'.php');
		}
		?>
	</section>

	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
	<!-- <div class="pull-right hidden-xs">
		<b>Version</b> 2.4.0
	</div>
	<strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
	reserved. -->
</footer>

  <!-- Add the sidebar's background. This div must be placed
  	immediately after the control sidebar -->
  	<div class="control-sidebar-bg"></div>
  </div>
  <!-- ./wrapper -->



  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <script>
  	$.widget.bridge('uibutton', $.ui.button);
  </script>
  <!-- Bootstrap 3.3.7 -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- Morris.js charts -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/raphael/raphael.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/morris.js/morris.min.js"></script>
  <!-- Sparkline -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- jQuery Knob Chart -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
  <!-- daterangepicker -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/moment/min/moment.min.js"></script>
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
  <!-- datepicker -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- Slimscroll -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
  <!-- FastClick -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/bower_components/fastclick/lib/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/js/pages/dashboard.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url() ?>vendor/almasaeed2010/adminlte/dist/js/demo.js"></script>


</body>
</html>
