<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?= get_option('site_description'); ?>">
    <meta name="keywords" content="<?= get_option('keywords'); ?>">
    <meta name="author" content="<?= get_option('author'); ?>">

    <title> <?= isset($title) ? $title : site_name() ?></title>

	<!-- Stylesheets -->
	<link type="text/css" rel="stylesheet" href="<?= theme_assets();?>css/style.css">
	<link type="text/css" rel="stylesheet" href="<?= theme_assets();?>css/responsive.css">
	<link type="text/css" rel="stylesheet" id="jssDefault" href="<?= theme_assets();?>css/custom/theme-4.css" />
	<link type="image/x-icon" rel="icon" href="<?= theme_assets();?>images/favicon.ico">

	<style type="text/css">
		.carousel-caption{
			width: 100%;
			right: 0px;
			left: 0px;
			padding-bottom: 20px;
			background-color: rgb(66 66 66 / 50%);
			bottom: 0px;
		}

		.carousel-title{
			color: #fff;
		}

		.carousel-caption-description p{
			font-size: 16px;
			color: #c9c9c9;
		}
	</style>
</head>

<!-- page wrapper -->
<body class="page-wrapper">
	<!-- .preloader -->
	<div class="preloader"></div>
	<!-- /.preloader -->

	<!--header search-->
	<section class="header-search">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12">
					<div class="search-form pull-right">
						<form action="#">
							<div class="search">
								<input type="search" name="search" value="" placeholder="Search Something">
								<button type="submit"><span class="fa fa-search" aria-hidden="true"></span></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--end header search-->

	<!-- main header area -->
	<header class="main-header">
		<!-- header upper -->
		<div class="header-upper">
			<div class="container">
				<ul class="top-left">
					<li><a href="mailto:simentel@semarangkota.go.id"><i class="fa fa-clock-o" aria-hidden="true"></i> simentel@semarangkota.go.id</a></li>
					<li><a href="tel:024-3513366"><i class="fa fa-phone"></i> (024) 3513366</a></li>
				</ul>
				<div class="top-right">
					<ul class="social-top">
						<li><a href="javascript:void(0);"><i class="fa fa-facebook"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-twitter"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-rss"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-google-plus"></i></a></li>
						<li><a href="javascript:void(0);"><i class="fa fa-vimeo"></i></a></li>
					</ul>
					<!-- <div class="button-top">
						<a href="javascript:void(0);" class="btn-one style-one">Get Appoinment</a>
					</div> -->
				</div>
			</div>
		</div>
		<!-- end header upper -->

		<!-- header lower -->
		<div class="header-lower">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="logo-box">
							<a href="index.html"></a>
						</div>
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="menu-bar">
							<nav class="main-menu">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="navbar-collapse collapse clearfix">
									<ul class="navigation clearfix">
										<li class="current"><a href="index.html">Home</a>
										</li>
										<li><a href="about.html">About Us</a>
										</li>
										<li class="dropdown"><a href="javascript:void(0);">Services</a>
											<ul>
												<li><a href="service.html">Our Service</a></li>
												<li><a href="service-details.html">Service Details</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="javascript:void(0);">Pages</a>
											<ul>
												<li><a href="team.html">Our Team</a></li>
												<li><a href="gallery.html">Our Gallery</a></li>
												<li><a href="faq.html">Faq's</a></li>
												<li><a href="error.html">Error Page</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="javascript:void(0);">News</a>
											<ul>
												<li><a href="our-blog.html">Blog Classic</a></li>
												<li><a href="blog-details.html">Blog Details</a></li>
											</ul>
										</li>
										<li><a href="contact.html">Contact</a>
										</li>
									</ul>
								</div>
							</nav>
							<div class="info-box">
								<div class="search-box">
									<div class="toggle-search">
										<button><i class="fa fa-search"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header lower -->

		<!--sticky header-->
		<div class="sticky-header">
			<div class="container clearfix">
				<div class="row">
					<div class="col-md-3 col-sm-12 col-xs-12">
						<div class="logo-box">
							<a href="index.html"></a>
						</div>
					</div>
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="menu-bar">
							<nav class="main-menu">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div class="navbar-collapse collapse clearfix">
									<ul class="navigation clearfix">
										<li class="current"><a href="index.html">Home</a>
										</li>
										<li><a href="about.html">About Us</a>
										</li>
										<li class="dropdown"><a href="javascript:void(0);">Services</a>
											<ul>
												<li><a href="service.html">Our Service</a></li>
												<li><a href="service-details.html">Service Details</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="javascript:void(0);">Pages</a>
											<ul>
												<li><a href="team.html">Our Team</a></li>
												<li><a href="gallery.html">Our Gallery</a></li>
												<li><a href="faq.html">Faq's</a></li>
												<li><a href="error.html">Error Page</a></li>
											</ul>
										</li>
										<li class="dropdown"><a href="javascript:void(0);">News</a>
											<ul>
												<li><a href="our-blog.html">Blog Classic</a></li>
												<li><a href="blog-details.html">Blog Details</a></li>
											</ul>
										</li>
										<li><a href="contact.html">Contact</a>
										</li>
									</ul>
								</div>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end sticky header -->
	</header>
	<!-- end main header area -->
