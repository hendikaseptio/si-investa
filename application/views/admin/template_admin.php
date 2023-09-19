<?php $page = $this->uri->segment(2) ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>SI INVESTA | {title}</title>
	<link rel="stylesheet" href="<?= site_url('assets/css/vendors/bootstrap-custom.css')?>">
	<link rel="stylesheet" href="<?= site_url('assets/css/admin.css')?>">

	<link rel="apple-touch-icon" sizes="152x152" type="image/png" href="<?= site_url()?>assets/img/brand/icon-gradient.png">
	<link rel="icon" type="image/png" sizes="152x152" href="<?= site_url()?>assets/img/brand/icon-gradient.png">
	<link rel="icon" type="image/x-icon" href="<?= site_url()?>assets/img/brand/icon-gradient.png" />

	<!-- icons -->
	<link rel="stylesheet" href="<?= site_url('assets/font/bootstrap-icons.min.css')?>">
	
	<script src="<?= site_url('assets/js/vendors/jquery.min.js')?>"></script>
</head>
<body>
	<div id="wrapper">
		<div class="d-flex flex-column flex-shrink-0 px-1 py-2 p-md-3 text-bg-dark" id="sidenav">
			<a href="<?= site_url()?>" id="brand" class="d-flex align-items-center mb-md-0 text-white text-decoration-none justify-content-center">
				<img src="<?= site_url('assets/img/brand/icon-gradient.png')?>" width="25px" class="me-md-2 ">
				<span class="fs-4">SI INVESTA</span>
			</a>
			<hr>
			<ul class="nav nav-pills flex-column mb-auto">
				<li class="nav-item">
					<a href="<?= site_url('admin/dashboard')?>" class="nav-link <?= ($page == "dashboard")?'active':'' ?> text-white" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Dashboard">
						<i class="bi bi-columns-gap"></i>
						<span>Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('admin/potensi')?>" class="nav-link <?= ($page == "potensi")?'active':'' ?> text-white">
						<i class="bi bi-database"></i>
						<span>Data Potensi Investasi</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('admin/profil')?>" class="nav-link <?= ($page == "profil")?'active':'' ?> text-white">
						<i class="bi bi-buildings"></i>
						<span>Profil</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= site_url('admin/kategori')?>" class="nav-link <?= ($page == "kategori")?'active':'' ?> text-white">
						<i class="bi bi-tags"></i>
						<span>Master Kategori</span>
					</a>
				</li>
			</ul>
			<hr>
			<div class="dropend">
				<a href="#" class="d-flex align-items-center text-white text-decoration-none " data-bs-toggle="dropdown" aria-expanded="true">
					<img src="https://github.com/mdo.png" alt="" class="rounded-circle me-2" width="32" height="32">
					<!-- <span><?= $this->session->userdata("username")?></span> -->
				</a>
				<ul class="dropdown-menu text-small shadow-lg z-3">
					<li><a class="dropdown-item" href="<?= site_url('admin/profil')?>">Profile</a></li>
					<li><hr class="dropdown-divider"></li>
					<li><a class="dropdown-item" href="<?= site_url('logout')?>">Sign out</a></li>
				</ul>
			</div>
		</div>
		<div id="main" class="pt-4">
			<!-- <header class="shadow mb-4">
				<nav class="navbar navbar-expand-lg bg-body-tertiary">
					<div class="container-fluid">
						<div class="w-100 d-flex justify-content-between align-items-center">
							<button type="button" class="btn p-0 me-auto fs-3"><i class="bi bi-list"></i></button>
						</div>
					</div>
				</nav>
			</header> -->
			{contents}
			<footer class="bg-body-tertiary shadow mt-5">
				<div class="container-fluid">
					<div class="d-flex justify-content-md-between justify-content-center py-4">
						<small class="text-secondary text-small">Si INVESTA 2023 &copy; DPMPTSP | Made with <i class="bi bi-heart-fill text-danger"></i> by <a href="https://github.com/mdo.png" class="text-secondary">Hendika</a> </small>
						<small class="text-secondary text-small">v3.14.0</small>
					</div>
				</div>
			</footer>
		</div>
	</div>
	<script src="<?= site_url('assets/js/vendors/bootstrap.bundle.min.js')?>"></script>
</body>
</html>