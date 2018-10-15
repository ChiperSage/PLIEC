<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>

<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="blog-post single-post">

					<!-- <div class="post-thumb">
						<a href="#">
						<img src="http://demo.graygrids.com/themes/classix-demo/assets/img/blog/img-1.jpg" alt=""></a>
						<div class="hover-wrap">
						</div>
					</div> -->

					<div class="post-content">

						<h4 class="post-title"><a href="#"><?php echo $post->post_title ?></a></h4>
						<div class="meta">
							<span class="meta-part"><a href="#"><i class="fa fa-user"></i> <?php echo $post->first_name.' '.$post->last_name ?> </a></span>
							<span class="meta-part">
								<a href="#"><i class="fa fa-clock-o"></i> <?php echo date('d F Y - H:i',strtotime($post->post_date)) ?></a>
							</span>
							<span class="meta-part"><a href="#">
								<i class="fa fa-folder"></i> 
								<?php
								if(!empty($post->post_category)){
								$cat = unserialize($post->post_category);
									foreach ($cat as $value) {
										echo $category_name[$value].', ';
									}
								}
								?>
							</a></span>
						</div>
						<?php echo $post->post_content ?>
						Tag: <?php $tags = explode(',', $post->post_tag) ?>
						
						<?php 
						foreach ($tags as $tag) { ?>
						<a class="label label-primary" href="<?php echo site_url() ?>"><?php echo $tag ?></a>&nbsp;
						<?php } ?>
						
					</div>

				</div>


				<!-- <div class="author">
					<div class="inner-box">
						<div class="author-img">
							<img src="assets/img/blog/author.jpg" alt="">
						</div>
						<div class="author-text">
							<div class="author-title">
								<h3 class="pull-left">William Smith</h3>
								<div class="social-link pull-right">
									<a class="twitter" target="_blank" data-original-title="twitter" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-twitter"></i></a>
									<a class="facebook" target="_blank" data-original-title="facebook" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-facebook"></i></a>
									<a class="google" target="_blank" data-original-title="google-plus" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-google"></i></a>
									<a class="linkedin" target="_blank" data-original-title="linkedin" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-linkedin"></i></a>
								</div>
							</div>
							<br>
							<p>We've been waiting for you. Where the kisses are hers and hers and his three too Michaea
							Knight a young loner on a crusade to champion the cause of innocent is the tale of our castaways they are here for a logn logn time for a courage.</p>
						</div>
					</div>
				</div> -->


				<!-- <div id="comments">
					<div class="inner-box">
						<h3>Comments (3)</h3>
						<ol class="comments-list">
							<li>
								<div class="media">
									<div class="thumb-left">
										<a href="#">
											<img alt="" src="assets/img/blog/user1.jpg" />
										</a>
									</div>
									<div class="info-body">
										<div class="media-heading">
											<h4 class="name">Larsen Mortin</h4> |
											<span class="comment-date">Mar 02, 2017</span>
											<a href="#" class="reply-link"><i class="fa fa-reply-all"></i> Reply</a>
										</div>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
									</div>
								</div>
								<ul>
									<li>
										<div class="media">
											<div class="thumb-left">
												<a href="#">
													<img alt="" src="assets/img/blog/user2.jpg" />
												</a>
											</div>
											<div class="info-body">
												<div class="media-heading">
													<h4 class="name">Albert Johnes</h4> |
													<span class="comment-date">Fab 03, 2017</span>
													<a href="#" class="reply-link"><i class="fa fa-reply-all"></i> Reply</a>
												</div>
												<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
											</div>
										</div>
									</li>
								</ul>
							</li>
							<li>
								<div class="media">
									<div class="thumb-left">
										<a href="#">
											<img alt="" src="assets/img/blog/user3.jpg" />
										</a>
									</div>
									<div class="info-body">
										<div class="media-heading">
											<h4 class="name">Steven Hawkins</h4> |
											<span class="comment-date">Jan 02, 2017</span>
											<a href="#" class="reply-link"><i class="fa fa-reply-all"></i> Reply</a>
										</div>
										<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident.</p>
									</div>
								</div>
							</li>
						</ol>

						<div id="respond">
							<h2 class="respond-title">Leave A Message</h2>
							<form action="#">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<input id="author" class="form-control" name="author" type="text" value="" size="30" placeholder="Your Name *">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input id="email" class="form-control" name="author" type="text" value="" size="30" placeholder="Your E-Mail *">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input class="form-control" name="author" type="text" value="" size="30" placeholder="Phone">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<input id="subject" class="form-control" name="author" type="text" value="" size="30" placeholder="Subject">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="form-group">
											<textarea id="comment" class="form-control" name="comment" cols="45" rows="8" placeholder="Massage..."></textarea>
										</div>
										<button type="submit" id="submit" class="btn btn-common">Post Comment</button>
									</div>
								</div>
							</form>
						</div>

					</div>
				</div> -->

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

				<!-- <div class="widget tag">
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
				</div> -->
				<!-- <div class="inner-box">
					<div class="widget-title">
						<h4>Advertisement</h4>
					</div>
					<img src="assets/img/img1.jpg" alt="">
				</div> -->
			</aside>

		</div>
	</div>
</div>