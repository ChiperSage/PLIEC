<section id="intro" class="section-intro">
	<div class="overlay">
		<div class="container">
			<div class="main-text">
				<h1 class="intro-titlex">Procurement Literature Electronic<span style="color: #3498DB"></span></h1>
				<p class="sub-title">&nbsp;</p>

				<div class="row search-bar">
					<div class="advanced-search">
						<form class="search-form" action="<?php echo site_url('main/archive/0/') ?>" method="get">
							<!-- <div class="col-md-3 col-sm-4 search-col">
								<div class="input-group-addon search-category-container">
									<label class="styled-select">
										<select class="dropdown-product selectpicker" name="cat">
											<option value="0">All Categories</option>
											<?php foreach ($category['category'] as $value) {?>
											<option class="subitem" value="<?php echo $value->category_id ?>"><?php echo $value->category_name ?></option>
											<?php } ?>
										</select>
									</label>
								</div>
							</div> -->
							<!-- <div class="col-md-3 col-sm-6 search-col">
								<div class="input-group-addon search-category-container">
									<label class="styled-select location-select">
										<select class="dropdown-product selectpicker" name="product-cat">
											<option value="0">All Locations</option>
											<option value="New York">New York</option>
											<option value="California">California</option>
											<option value="Washington">Washington</option>
											<option value="churches">Birmingham</option>
											<option value="Birmingham">Chicago</option>
											<option value="Phoenix">Phoenix</option>
										</select>
									</label>
								</div>
							</div> -->
							<div class="col-md-9 col-sm-8 search-col">
								<input class="form-control keyword" name="keyword" value="" placeholder="Masukan kata kunci" type="text">
								<i class="fa fa-search"></i>
							</div>
							<div class="col-md-3 col-sm-4 search-col">
								<button class="btn btn-common btn-search btn-block"><strong>Search</strong></button>
							</div>
						</form>
					</div>
				</div>

			</div>
		</div>
	</div>
</section>

<div class="wrapper">

	<section id="categories-homepage">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h3 class="section-title">Browse Posts from <?php echo $count_category ?> Categories</h3>
				</div>
				<!-- start here -->
				<?php foreach ($category['category'] as $value) {?>

				<div class="col-md-3 col-sm-6 col-xs-12">
					<div class="category-box border-1 wow fadeInUpQuick" data-wow-delay="0.3s">
						<div class="icon">
							<a href="<?php echo site_url('main/category/'.$value->category_id) ?>">
								<i class="lnr lnr-file-empty color-1"></i>
							</a>
						</div>
						<div class="category-header">
							<a href="<?php echo site_url('main/category/'.$value->category_id) ?>"><h4><?php echo $value->category_name ?></h4></a>
						</div>
						<div class="category-content">
							<ul>
								<!-- sub here -->
								<?php foreach ( $category['subcategory'][$value->category_id]  as $value ){ ?>
								<li>
									<a href="<?php echo site_url('main/category/'.$value->category_id) ?>"><?php echo $value->category_name ?></a>
									<!-- <sapn class="category-counter">3</sapn> -->
								</li>
								<?php } ?>
							</ul>
						</div>
					</div>
				</div>

			<?php } ?>
				
			</div>
		</div>
	</section>

	<div class="features_x">
		<div class="container tab-content">

<div class="tabs">
  <div class="tab-button-outer">
	
			<ul id="tab-button" class="text-uppercase">
				<li><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><h4>artikel terbaru</h4></a></li>
				<li><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><h4>artikel populer</h4></a></li>
			</ul>

  </div>
</div>

			<hr>
			
			<div role="tabpanel" class="row tab-pane active" id="home">
				<?php 
				$i = 0;
				foreach ($latest_posts['result'] as $value) {
				$i++;
				?>
				<div class="col-md-4 col-sm-6">
					<div class="features-box">
						<div class="features-icon">
							<i class="fa fa-file">
							</i>
						</div>
						<div class="features-content">
							<h4>
								<?php echo anchor('main/single/'.$value->post_name.'-'.$value->ID,$value->post_title) ?>
							</h4>
							<small> <i class="fa fa-folder"></i> &nbsp; <?php echo $value->category_name ?></small>
							<p>
								<?php echo word_limiter(strip_tags($value->post_content),20); ?>
							</p>
							<small> <i class="fa fa-user"></i> &nbsp; <?php echo $value->first_name.' '.$value->last_name ?></small>
						</div>
					</div>
				</div>
				<?php 
				echo ($i == 3 || $i == 6) ? '<div class="clearfix"></div>' : '' ;
				}
				?>
			</div>

			<div role="tabpanel" class="row tab-pane" id="profile">
				<?php 
				$i = 0;
				foreach ($popular_posts as $value) {
				$i++;
				?>
				<div class="col-md-4 col-sm-6">
					<div class="features-box">
						<div class="features-icon">
							<i class="fa fa-file">
							</i>
						</div>
						<div class="features-content">
							<h4>
								<?php echo anchor('main/single/'.$value->post_name.'-'.$value->ID,$value->post_title) ?>
							</h4>
							<small> <i class="fa fa-folder"></i> &nbsp; <?php echo $value->category_name ?></small>
							<p>
								<?php echo word_limiter(strip_tags($value->post_content),20); ?>
							</p>
							<small> <i class="fa fa-user"></i> &nbsp; <?php echo $value->first_name.' '.$value->last_name ?></small>
						</div>
					</div>
				</div>
				<?php 
				echo ($i == 3 || $i == 6) ? '<div class="clearfix"></div>' : '' ;
				}
				?>
			</div>

		</div>
	</div>

</div>

<!-- <div>

  <a href="#home" aria-controls="home" role="tab" data-toggle="tab">Latest Posts</a>
  <a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Editor Pick</a>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="home">
    	1
    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
    <div role="tabpanel" class="tab-pane" id="profile">
    	2
    	Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
    	tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
    	quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
    	consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
    	cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
    	proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    </div>
  </div>

</div> -->

<section id="counter">
	<div class="container">
		<div class="row">
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="counting wow fadeInDownQuick" data-wow-delay=".1s">
					<div class="icon">
						<span>
							<i class="lnr lnr-pencil"></i>
						</span>
					</div>
					<div class="desc">
						<h3 class="counter"><?php echo $count_post; ?></h3>
						<p>Posts</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="counting wow fadeInDownQuick" data-wow-delay="1s">
					<div class="icon">
						<span>
							<i class="lnr lnr-book"></i>
						</span>
					</div>
					<div class="desc">
						<h3 class="counter"><?php echo $count_category ?></h3>
						<p>Categories</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="counting wow fadeInDownQuick" data-wow-delay="1s">
					<div class="icon">
						<span>
							<i class="lnr lnr-users"></i>
						</span>
					</div>
					<div class="desc">
						<h3 class="counter"><?php echo $count_user ?></h3>
						<p>Users</p>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-sm-6 col-xs-12">
				<div class="counting wow fadeInDownQuick" data-wow-delay="1s">
					<div class="icon">
						<span>
							<i class="lnr lnr-flag"></i>
						</span>
					</div>
					<div class="desc">
						<h3 class="counter"><?php echo $count_page ?></h3>
						<p>Pages</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<style type="text/css">
	body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
}
.tabs {
  max-width: 640px;
}
#tab-button {
  display: table;
  table-layout: fixed;
  width: 100%;
  margin: 0;
  padding: 0;
  list-style: none;
}
#tab-button li {
  display: table-cell;
  width: 20%;
}
#tab-button li a {
  display: block;
  padding: .5em;
  background: #eee;
  border: 1px solid #ddd;
  text-align: center;
  color: #000;
  text-decoration: none;
}
#tab-button li:not(:first-child) a {
  border-left: none;
}
#tab-button li a:hover,
#tab-button .is-active a {
  border-bottom-color: transparent;
  background: #fff;
}
.tab-contents {
  padding: .5em 2em 1em;
  border: 1px solid #ddd;
}

.tab-button-outer {
  display: none;
}
.tab-contents {
  margin-top: 20px;
}
@media screen and (min-width: 768px) {
  .tab-button-outer {
    position: relative;
    z-index: 2;
    display: block;
  }
  .tab-select-outer {
    display: none;
  }
  .tab-contents {
    position: relative;
    top: -1px;
    margin-top: 0;
  }
}
</style>