	<?php if(empty($data)){ 
		show_404();
	} ?>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
	<link rel="stylesheet" href="<?= site_url("assets/css/plugins/simple-lightbox.min.css")?>">
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	<section id="top" class="bg-gradient">
		<div class="container">
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= site_url()?>" class="link-dark">Home</a></li>
					<li class="breadcrumb-item">Investasi</li>
					<li class="breadcrumb-item">Detail</li>
					<li class="breadcrumb-item active" aria-current="page"><?= $data["nama"] ?></li>
				</ol>
			</nav>
			<h1><?= $data["nama"] ?></h1>
		</div>
	</section>
	<section>
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<table class="table">
						<tr>
							<td>Nama Proyek</td>
							<td>:</td>
							<td><?= $data["nama"] ?></td>
						</tr>
						<tr>
							<td>sektor</td>
							<td>:</td>
							<td><?= $data["sektor"] ?></td>
						</tr>
						<tr>
							<td>Status</td>
							<td>:</td>
							<td><?= $data["status"] ?></td>
						</tr>
						<tr>
							<td>Kelurahan</td>
							<td>:</td>
							<td><?= $data["kelurahan"] ?></td>
						</tr>
						<tr>
							<td>Kecamatan</td>
							<td>:</td>
							<td><?= $data["kecamatan"] ?></td>
						</tr>
					</table>
				</div>
				<div class="col-md-6">
					<div id="map" class="rounded-4 shadow" style="height: 300px;"></div>
					<script>
						var map = L.map('map').setView([<?= $data["latitude"] ?>, <?= $data["longtitude"] ?>], 13);
						L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
							maxZoom: 19,
							attribution: '© DPMPTSP'
						}).addTo(map);
						var marker = L.marker([<?= $data["latitude"] ?>, <?= $data["longtitude"] ?>]).addTo(map);
					</script>
				</div>
			</div>
			<h2 class="mt-5">Detail Proyek</h2>
			<?= $data["detail_proyek"]?>
			<h2 class="mt-5">Kondisi Eksisting</h2>
			<?= $data["kondisi_eksisting"]?>
			<h2 class="mt-5">Peluang Investasi</h2>
			<?= $data["peluang_investasi"]?>
			<div class="row">
				<div class="col-md-6">
					<div class="row gallery">
						<?php 
						$list_foto = explode(",", $data['foto']);
						foreach ($list_foto as $r) { ?>
							<a class="d-block col-md-6 p-1" href="<?= site_url("assets/foto/".$r)?>">
								<img src="<?= site_url("assets/foto/".$r)?>" style="object-fit: cover; object-position: center; width: 100%; height: 200px;" alt="">
							</a>
						<?php } ?>
					</div>
				</div>
				<div class="col-md-6">
					<video width="100%" height="auto" class="p-1" controls>
						<source src="<?= site_url("assets/video/".$data["video"])?>" type="video/mp4">
					</video>		
				</div>
			</div>
			 
		</div>
	</section>
	<script type="text/javascript" src="<?= site_url("assets/js/plugins/simple-lightbox.min.js")?>"></script>
	<script>
		var lightbox = new SimpleLightbox('.gallery a');
	</script>