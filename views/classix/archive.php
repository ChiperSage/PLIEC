<div class="page-header" style="background: url(http://demo.graygrids.com/themes/classix-demo/assets/img/banner1.jpg);">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1 class="page-title">Archive</h1>
			</div>
		</div>
	</div>
</div>

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<?php foreach ($posts as $value) {?>
				<div class="blog-post">						
					<div class="post-content">
						<h4 class="post-title">
							<a href="<?php echo site_url('main/single/'.$value->post_name.'-'.$value->ID) ?>"><?php echo $value->post_title; ?></a>
						</h4>
						<div class="meta">
							<!-- <span class="meta-part">
								<a href="#"><i class="fa fa-user"></i> Will Smith</a>
							</span> -->
						<span class="meta-part">
							<a href="#">
							<i class="fa fa-clock-o"></i><?php echo date('d F Y - H:i',strtotime($value->post_date)); ?>
							</a>
						</span>
							<!-- 
							<span class="meta-part">
							<a href="#"><i class="fa fa-comment"></i> Comments 0</a></span> 
							-->
						</div>
							<p><?php echo word_limiter(strip_tags($value->post_content),55); ?></p>
							<a href="<?php echo site_url('main/single/'.$value->post_name.'-'.$value->ID) ?>" class="btn btn-common btn-rm">Read More</a>
						</div>
					</div>
					<?php } ?>

					<?php $this->load->view('classix/pagination') ?>

				</div>

				<aside id="sidebar" class="col-md-4 right-sidebar">

					<div class="widget">
					<div class="categories">
						<div class="widget-title">
							<i class="fa fa-align-justify"></i>
							<h4>All Categories</h4>
						</div>
						<div class="categories-list">
							<ul>
								<?php foreach ($latest_category['category'] as $value) {?>
								<li>
									<a href="<?php echo site_url('main/category/').$value->category_id ?>">
										<i class="fa fa-file"></i>
										<?php echo $value->category_name ?> 
										<!-- <span class="category-counter">(5)</span> -->
									</a>
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>

					<div class="widget widget-popular-posts">
					<div class="widget-title">
						<h4>Recent Posts</h4>
					</div>
					<ul class="posts-list">
						<?php foreach ($latest_post['result'] as $value) {?>
						<li>
							<!-- <div class="widget-thumb">
								<a href="#"><img src="http://demo.graygrids.com/themes/classix-demo/assets/img/post/thumb1.jpg" alt="" /></a>
							</div> -->
							<div class="widget-content">
								<a href="#"><?php echo anchor('main/single/'.$value->post_name.'-'.$value->ID,$value->post_title) ?></a>
								<span><i class="icon-calendar"></i><?php echo date('d F Y - H:s',strtotime($value->post_date)) ?></span>
							</div>
							<div class="clearfix"></div>
						</li>
						<?php } ?>
					</ul>
				</div>

					<div class="widget tag">
						<div class="widget-title">
							<h4>Popular Tags</h4>
						</div>
						<a href="#"> Fashion</a>
						<a href="#"> Clothing</a>
						<a href="#"> Trends</a>
						<a href="#"> Shoes</a>
						<a href="#"> Tops</a>
						<a href="#"> Sell Off</a>
						<a href="#"> Women Fashion</a>
					</div>
				<!-- <div class="inner-box">
					<div class="widget-title">
						<h4>Advertisement</h4>
					</div>
					<img src="assets/img/img1.jpg" alt="">
				</div> -->
			</aside>

			<!-- <div class="clearfix"></div> -->

		</div>
	</div>
</div>

<a href="#" class="back-to-top">
	<i class="fa fa-angle-up"></i>
</a>