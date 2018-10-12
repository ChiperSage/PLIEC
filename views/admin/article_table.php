<div class="row">
	<div class="col-xs-12">
		<div class="box box-info">
			<div class="box-header">
				<h1 class="box-title">Posts</h1>
				<a class="btn btn-default" href="<?php echo base_url('article/create') ?>">Add New</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<?php echo $this->session->flashdata('msg') ?>
				<div class="row">
					<div class="col-sm-6">
						<p>
							<ul class="list-unstyled list-inline">
							<li><a href="<?php echo base_url('article/index') ?>">All</a></li>
							<li><a href="<?php echo base_url('article/index/0/?status=publish') ?>">Published</a></li>
							<li><a href="<?php echo base_url('article/index/0/?status=draft') ?>">Pending<a></li>
							<li><a href="<?php echo base_url('article/index/0/?status=trash') ?>">Trash</a></li>
							</ul>
						</p>
						</div>
						<div class="col-sm-6">
							<form class="col-sm-6 pull-right" action="<?php echo site_url('article/index/0/') ?>" method="get">
								<input class="form-control" name="keyword" type="text">
								<!-- <button class="btn btn-default">Search</button> -->
							</form>
						</div>
					</div>
					<table id="examplex" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>No.</th>
								<th width="400">Title</th>
								<th>Author</th>
								<th>Categories</th>
								<th>Tags</th>
								<th width="150">Date</th>
								<th>View</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php $i=$this->uri->segment(3); foreach ($articles as $value) { $i++ ?>
								<tr>
									<td> <?php echo $i ?> </td>
									<td> <strong><?php echo anchor('article/update/'.$value->ID,$value->post_title) ?></strong> </td>
									<td> <?php echo $value->username ?> </td>
									<td>
									<?php
									$var = $value->post_category;									
									if(!empty($var) && !is_numeric($var)){
										$var2 = unserialize($var);										
										if(is_array($var2)){
										foreach ($var2 as $id) {
											echo $category[$id].', ';
										}}
									}
									?>
									</td>
									<td> <?php echo word_limiter($value->post_tag,3) ?> </td>
									<td>	
									<?php echo ($value->post_status == 'publish') ? '<div class="text-capitalize text-success">' : '<div class="text-capitalize text-danger">'; echo $value->post_status; ?></div> 
									<?php echo $value->post_date ?> 
								</td>
								<td> <?php echo $value->post_view ?> </td>
								<td>
									<a href="<?php echo base_url('article/update/'.$value->ID) ?>"><i class="fa fa-edit"></i></a>
									<a href="<?php echo base_url('article/delete/'.$value->ID) ?>" onclick="confirm('Are you going to delete this content?')"><i class="fa fa-trash"></i></a>
								</td>

							</tr>
						<?php } ?>
					</tbody>
				</table>

				<?php include('paging.php') ?>
			</div>
			<!-- /.box-body -->
		</div>
		<!-- /.box -->
	</div>
	<!-- /.col -->
</div>
