	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
   integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
   crossorigin=""></script>
	<section id="top" class="bg-gradient">
		<div class="container">
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= site_url()?>" class="link-dark">Home</a></li>
					<li class="breadcrumb-item">Investasi</li>
					<li class="breadcrumb-item active" aria-current="page">Sektor</li>
				</ol>
			</nav>
			<h1>Daftar Investasi Kota Pekalongan</h1>
		</div>
	</section>
	<section>
		<div class="container">
			<b>Berdasarkan Kecamatan :</b>
			<a href="<?= site_url("investasi/lokasi")?>" class="m-1 btn <?= (empty($this->input->get('kec')))?"btn-primary":"btn-outline-primary" ?>">Semua</a>
			<?php foreach ($kecamatan as $kec) { ?>
				<?php if($this->input->get('kec')) ?>
				<a href="?kec=<?= $kec->id ?>" class="m-1 btn <?= ($this->input->get('kec')==$kec->id)?"btn-primary":"btn-outline-primary" ?>">Kecamatan <?= $kec->nama?></a>
			<?php } ?>
			<div id="map" class="mt-5 rounded-4 shadow" style="height: 400px;"></div>
		</div>
		<script>
			var map = L.map('map').setView([-6.897628, 109.662813], 13);
			L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
				maxZoom: 19,
				attribution: '© DPMPTSP'
			}).addTo(map);
			<?php foreach ($data as $r) { $foto = explode(",",$r->foto); ?>
				var marker = L.marker([<?= $r->latitude ?>, <?= $r->longtitude?>]).addTo(map);
				marker.bindPopup("<img src='<?= site_url('assets/foto/'.$foto[0]) ?>' class='card-img-top mb-3 rounded-3 shadow'><table class='table'><tr><td>Nama Proyek</td><td>:</td><td><?= $r->nama ?></td></tr><tr><td>sektor</td><td>:</td><td><?= $r->sektor ?></td></tr><tr><td>Status</td><td>:</td><td><?= $r->status ?></td></tr><tr><td>Kelurahan</td><td>:</td><td><?= $r->kelurahan ?></td></tr><tr><td>Kecamatan</td><td>:</td><td><?= $r->kecamatan ?></td></tr></table><div class='mt-3 d-grid'><a href='<?= site_url('detail/'.$r->slug) ?>' class='w-auto btn btn-primary link-dark'>Selengkapnya</a></div>");
			<?php } ?>
		</script>

	</section>