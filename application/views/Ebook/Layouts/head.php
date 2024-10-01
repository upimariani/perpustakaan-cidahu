<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>E-LEARNING SMP Negeri 2 Cidahu</title>
	<!-- Favicon -->
	<link rel="shortcut icon" type="image/icon" href="<?= base_url('asset/kindle-master/') ?>assets/images/favicon.ico" />
	<!-- Font Awesome -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet">
	<!-- Bootstrap -->
	<link href="<?= base_url('asset/kindle-master/') ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<!-- Slick slider -->
	<link href="<?= base_url('asset/kindle-master/') ?>assets/css/slick.css" rel="stylesheet">
	<!-- Theme color -->
	<link id="switcher" href="<?= base_url('asset/kindle-master/') ?>assets/css/theme-color/default-theme.css" rel="stylesheet">

	<!-- Main Style -->
	<link href="<?= base_url('asset/kindle-master/') ?>style.css" rel="stylesheet">

	<!-- Fonts -->

	<!-- Open Sans for body font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700,800" rel="stylesheet">
	<!-- Lato for Title -->
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">



	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>


	<!-- Start Header -->
	<header id="mu-header" class="" role="banner">
		<div class="container">
			<nav class="navbar navbar-default mu-navbar">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<!-- Text Logo -->
						<a class="navbar-brand" href="<?= base_url('cList') ?>"><i class="fa fa-book" aria-hidden="true"></i> E-LIBRARY</a>

						<!-- Image Logo -->
						<!-- <a class="navbar-brand" href="index.html"><img src="assets/images/logo.png"></a> -->


					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav mu-menu navbar-right">
							<li><a href="<?= base_url('cLearning/halaman_utama') ?>">HOME</a></li>
							<li><a href="<?= base_url('cLearning/logout') ?>">LOGOUT</a></li>
						</ul>
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</div>
	</header>
	<!-- End Header -->

	<!-- Start Featured Slider -->

	<section id="mu-hero">
		<div class="container">
			<div class="row">

				<div class="col-md-6 col-sm-6 col-sm-push-6">
					<div class="mu-hero-right">
						<img style="width:200px" src="<?= base_url('asset/smp.png') ?>" alt="Ebook img">
					</div>
				</div>

				<div class="col-md-6 col-sm-6 col-sm-pull-6">
					<div class="mu-hero-left">
						<h1>PERPUSTAKAAN SMP Negeri 1 Cidahu</h1>
						<p>"Perpustakaan menyimpan energi yang memicu imajinasi. Perpustakaan membuka jendela ke dunia dan menginspirasi kita untuk mengeksplorasi dan mencapai, dan berkontribusi untuk meningkatkan kualitas hidup kita." - Sidney Sheldon</p>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Start Book Overview -->
	<section id="mu-book-overview">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="mu-book-overview-area">

						<div class="mu-heading-area">
							<h2 class="mu-heading-title">Pencarian Buku</h2>
							<span class="mu-header-dot"></span>
						</div>

						<!-- Start Book Overview Content -->
						<!-- Start Featured Slider -->
						<div class="mu-contact-content">
							<?php
							$kategori = $this->db->query("SELECT * FROM `kategori_buku`")->result();
							$kelas = $this->db->query("SELECT * FROM `buku` GROUP BY kelas;")->result();
							?>

							<div id="form-messages"></div>
							<form method="post" action="<?= base_url('cList/perkategori') ?>" class="mu-contact-form">
								<div class="form-group">
									<select class="form-control" name="kategori" required>
										<option value="">--Pilih Kategori Buku--- </option>
										<option value="all_kategori">All</option>
										<?php
										foreach ($kategori as $key => $value) {
										?>
											<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
										<?php
										}
										?>

									</select>
								</div>
								<div class="form-group">
									<select class="form-control" name="kelas" required>
										<option value="">--Pilih Kelas--- </option>
										<option value="all_kelas">All</option>
										<?php
										foreach ($kelas as $key => $value) {
										?>
											<option value="<?= $value->kelas ?>"><?= $value->kelas ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<button type="submit" class="mu-send-msg-btn"><span>Cari</span></button>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- End Book Overview -->



	<!-- Start main content -->

	<main role="main">

		<!-- Start Counter -->
		<section id="mu-counter">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="mu-counter-area">

							<div class="mu-counter-block">
								<div class="row">

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-files-o" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?= $jml['buku']->jml_buku ?>">0</div>
											<h5 class="mu-counter-name">Total Buku</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-file-text-o" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?= $jml['kategori']->jml_kategori ?>">0</div>
											<h5 class="mu-counter-name">Kategori Buku</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-users" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?= $jml['anggota']->jml_anggota ?>">0</div>
											<h5 class="mu-counter-name">Anggota Perpustakaan</h5>
										</div>
									</div>
									<!-- / Single Counter -->

									<!-- Start Single Counter -->
									<div class="col-md-3 col-sm-6">
										<div class="mu-single-counter">
											<i class="fa fa-trophy" aria-hidden="true"></i>
											<div class="counter-value" data-count="<?= $jml['peminjam']->jml_pinjam ?>">0</div>
											<h5 class="mu-counter-name">Peminjam</h5>
										</div>
									</div>
									<!-- / Single Counter -->

								</div>

							</div>


						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End Counter -->
