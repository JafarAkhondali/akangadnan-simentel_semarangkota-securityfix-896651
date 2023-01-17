<!DOCTYPE html>
<html lang="en">

<head>
	<!-- ========== Meta Tags ========== -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="<?= get_option('site_description'); ?>">
    <meta name="keywords" content="<?= get_option('keywords'); ?>">
    <meta name="author" content="<?= get_option('author'); ?>">

	<!-- ========== Page Title ========== -->
    <title> <?= isset($title) ? $title : site_name() ?></title>

	<!-- ========== Favicon Icon ========== -->
	<link rel="shortcut icon" href="<?= theme_assets();?>img/favicon.png" type="image/x-icon">

	<!-- ========== Start Stylesheet ========== -->
	<link href="<?= theme_assets();?>css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/font-awesome.min.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/themify-icons.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/elegant-icons.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/flaticon-set.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/magnific-popup.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/owl.carousel.min.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/owl.theme.default.min.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/animate.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/bootsnav.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/responsive.css" rel="stylesheet" />
	<link href="<?= theme_assets();?>css/style.css" rel="stylesheet">
	<!-- ========== End Stylesheet ========== -->

	<style type="text/css">
		.banner-area .box-cell .container {
			height: 730px;
		}
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

		.carousel-caption-description{
			font-size: 16px;
			color: #c9c9c9;
		}

		.about-content-area .content-box .info ul li {
			display: block;
			padding-left: 25px;
			margin-top: 10px;
			position: relative;
			z-index: 1;
			font-family: 'Poppins', sans-serif;
			color: #232323;
			font-weight: 500;
		}

		.about-content-area .content-box .info ul li::after {
			position: absolute;
			left: 0;
			top: 0;
			content: "N";
			font-family: 'ElegantIcons';
			height: 100%;
			width: 100%;
			color: #1273eb;
		}
	</style>
</head>

<body>
	<!-- Start Preloader 
	============================================= -->
	<div id="preloader">
		<div id="earna-preloader" class="earna-preloader">
			<div class="animation-preloader">
				<div class="spinner"></div>
				<div class="txt-loading">
					<span data-text-preloader="S" class="letters-loading">
						S
					</span>
					<span data-text-preloader="I" class="letters-loading">
						I
					</span>
					<span data-text-preloader="M" class="letters-loading">
						M
					</span>
					<span data-text-preloader="E" class="letters-loading">
						E
					</span>
					<span data-text-preloader="N" class="letters-loading">
						N
					</span>
					<span data-text-preloader="T" class="letters-loading">
						T
					</span>
					<span data-text-preloader="E" class="letters-loading">
						E
					</span>
					<span data-text-preloader="L" class="letters-loading">
						L
					</span>
				</div>
			</div>
			<div class="loader">
				<div class="row">
					<div class="col-3 loader-section section-left">
						<div class="bg"></div>
					</div>
					<div class="col-3 loader-section section-left">
						<div class="bg"></div>
					</div>
					<div class="col-3 loader-section section-right">
						<div class="bg"></div>
					</div>
					<div class="col-3 loader-section section-right">
						<div class="bg"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Preloader -->

	<!-- Start Header Top 
	============================================= -->
	<div class="top-bar-area top-bar-style-six-area text-light">
		<div class="container">
			<div class="top-bar-style-two">
				<div class="row align-center">
					<div class="col-lg-12 info">
						<ul>
							<li>
								<a href="tel:0243513366"><i class="fas fa-phone"></i> (024) 3513366</a>
								<a href="tel:0243515871"><i class="fas fa-phone"></i> (024) 3515871</a>
							</li>
							<li>
								<a href="mailto:simentel@semarangkota.go.id"><i class="fas fa-envelope-open"></i> simentel@semarangkota.go.id</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Header Top -->


	<!-- Header 
	============================================= -->
	<header id="home">
		<!-- Start Navigation -->
		<nav class="navbar navbar-default navbar-sticky bootsnav">
			<div class="container">
				<!-- Start Header Navigation -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu">
						<i class="fa fa-bars"></i>
					</button>
					<a class="navbar-brand" href="<?= BASE_URL;?>" style="padding: 10px 15px; left: 20px;">
						<h1 style="margin-bottom: 0px;">
							<img src="<?= BASE_ASSET;?>img/SiMenTel-biru.png" class="logo" alt="Logo" style="width: 320px; height: auto;">
						</h1>
					</a>
				</div>
				<!-- End Header Navigation -->

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="navbar-menu">
					<ul class="nav navbar-nav navbar-right" data-in="#" data-out="#">
						<li><a href="<?= BASE_URL;?>">Beranda</a></li>
						<li><a href="<?= BASE_URL;?>peta-menara">Peta Menara</a></li>
						<li><a href="<?= BASE_URL;?>microcell">Microcell</a></li>
						<li><a href="javascript:void(0);">Pencarian</a></li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		<!-- End Navigation -->
	</header>
	<!-- End Header -->