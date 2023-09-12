<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Si Investa {title}</title>
	<!-- favicon -->
	<link rel="apple-touch-icon" sizes="152x152" type="image/png" href="<?= site_url()?>assets/img/brand/icon-gradient.png">
	<link rel="icon" type="image/png" sizes="152x152" href="<?= site_url()?>assets/img/brand/icon-gradient.png">
	<link rel="icon" type="image/x-icon" href="<?= site_url()?>assets/img/brand/icon-gradient.png" />
	<!-- css -->
	<link href="<?= site_url('assets/css/vendors/bootstrap-custom.css')?>" rel="stylesheet">
	<link href="<?= site_url('assets/css/app.css')?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= site_url('assets/css/plugins/swiper-bundle.min.css')?>" />
	<link rel="stylesheet" href="<?= site_url('assets/font/bootstrap-icons.min.css')?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg bg-body-tertiary">
			<div class="container">
				<a class="navbar-brand" href="index.html">
					<img src="<?= site_url()?>assets/img/brand/logo-color.png" alt="" width="100px">
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav m-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="<?= site_url()?>">Home</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Profil
							</a>
							<ul class="dropdown-menu">
								<!-- <li><h6 class="dropdown-header">Investasi Bedasarkan</h6></li> -->
								<li><a class="dropdown-item" href="#">Kota pekalongan</a></li>
								<li><a class="dropdown-item" href="#">Pemerintahan</a></li>
								<li><a class="dropdown-item" href="#">Penduduk dan Ketanagakerjaan</a></li>
								<li><a class="dropdown-item" href="#">UMK dan Ketanaga kerja</a></li>
								<li><a class="dropdown-item" href="#">Sosial dan Ekonomi</a></li>
								<li><a class="dropdown-item" href="#">Infrastruktur Sarana dan Prasarana</a></li>
								<li><a class="dropdown-item" href="#">Pertanian</a></li>
								<li><hr class="dropdown-divider"></li>
								<li><a class="dropdown-item" href="#">profil Investasi</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="peta.html">Peta</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Investasi
							</a>
							<ul class="dropdown-menu">
								<li><h6 class="dropdown-header">Investasi Bedasarkan</h6></li>
								<li><a class="dropdown-item" href="<?= site_url('investasi/sektor')?>">Sektor</a></li>
								<li><a class="dropdown-item" href="<?= site_url('investasi/lokasi')?>">Lokasi</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="peta.html">Kontak</a>
						</li>
					</ul>
					<button class="m-1 btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-globe-americas"></i></button>
					<button class="m-1 btn btn-sm btn-outline-primary" type="submit"><i class="bi bi-search"></i></button>
					<button class="m-1 btn btn-sm btn-primary" type="submit"><i class="bi bi-person"></i> Login</button>
				</div>
			</div>
		</nav>
	</header>
	{contents}
	<footer class="py-5 bg-dark text-white">
		<div class="container">
			<div class="row flex-column-reverse flex-md-row ">
				<div class="col-md-6 py-3 text-center text-md-start">
					<img src="<?= site_url()?>assets/img/brand/logo-white.png" class="mb-3" alt="logo" width="200px">
					<p>Sistem Informasi Investasi Kota Pekalongan</p>
					<div class="d-flex mt-5 justify-content-center justify-content-md-start">
						<a href="#" class="fs-5 me-3 bi bi-facebook"></a>
						<a href="#" class="fs-5 me-3 bi bi-instagram"></a>
						<a href="#" class="fs-5 me-3 bi bi-youtube"></a>
						<a href="#" class="fs-5 me-3 bi bi-twitter"></a>
					</div>
				</div>
				<div class="col-md-6 py-3">
					<div class="d-flex">
						<i class="bi bi-chevron-right me-2"></i>
						<p>Alamat : Jl. Jaksa Agung R. Soeprapto No. 1 Podosugih, Pekalongan Barat, Kota Pekalongan</p>
					</div>
					<div class="d-flex">
						<i class="bi bi-chevron-right me-2"></i>
						<p>Telepon : 0285 - 432086</p>
					</div>
					<div class="d-flex">
						<i class="bi bi-chevron-right me-2"></i>
						<p>Email : oss@pekalongankota.go.id</p>
					</div>
				</div>
			</div>
			<hr>
			<div class="text-center">
				<small>Hak Cipta © 2023 - DPMPTSP Kota Pekalongan</small>
			</div>
		</div>
	</footer>
	<script src="<?= site_url('assets/js/vendors/jquery.min.js')?>"></script>
	<script src="<?= site_url('assets/js/vendors/bootstrap.bundle.min.js')?>"></script>
</body>
</html>