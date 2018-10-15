<div class="row">
	<div class="col-xs-12">

		<div class="box box-info">
			<div class="box-header">
				<h1 class="box-title">Posts</h1>
				<a class="btn btn-default" href="<?php echo base_url('moderator/create') ?>">Add New</a>
			</div>
			<!-- /.box-header -->
			<div class="box-body">

				<?php echo $this->session->flashdata('msg') ?>

				<table id="examplex" class="table table-striped table-bordered">
					<thead>
						<tr>
							<th>No.</th>
							<th>Title</th>
							<th>Author</th>
							<th>Categories</th>
							<th>Tags</th>
							<th>Date</th>
							<th>View</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php $i=$this->uri->segment(3); foreach ($articles as $value) { $i++ ?>
							<tr>
								<td class="text-center"> <?php echo $i ?> </td>
								<td> <strong><?php echo anchor('moderator/update/'.$value->ID,$value->post_title) ?></strong> </td>
								<td> <?php echo $value->username ?> </td>
								<td>
									<?php
									if(!empty($value->post_category) || !is_numeric($value->post_category)){
										$cat = unserialize($value->post_category);
										foreach ($cat as $id) {
											echo $category[$id].', ';
										}
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
									<a href="<?php echo base_url('moderator/update/'.$value->ID) ?>"><i class="fa fa-edit"></i></a>
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
