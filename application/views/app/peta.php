<!DOCTYPE html>
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
	<link rel="stylesheet" href="<?= site_url('assets/font/bootstrap-icons.min.css')?>">
	<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
	<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.min.js" integrity="sha512-Abr21JO2YqcJ03XGZRPuZSWKBhJpUAR6+2wH5zBeO4wAw4oksr8PRdF+BKIRsxvCdq+Mv4670rZ+dLnIyabbGw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="<?= site_url('assets/js/vendors/jquery.min.js')?>"></script>
	<style>
		.leaflet-bottom.leaflet-right {
			display: none;
		}
	</style>
</head>
<body>
	<section class="p-0">
		<aside class="col-3 position-fixed top-0 end-0" style="z-index: 9999;">
			<div class="card rounded-4 border-0 shadow m-3">
				<div class="card-header"><b>DPMPTSP KOTA PEKALONGAN</b></div>
				<div class="card-body" style="max-height: 85vh; overflow: auto;">
					<form action="">
						<input type="radio" class="btn-check" name="base-maps" id="satelit" autocomplete="off" checked>
						<label class="btn" for="satelit"><i class="bi bi-globe-americas"></i> Peta Satelit</label>

						<input type="radio" class="btn-check" name="base-maps" id="street" autocomplete="off">
						<label class="btn" for="street"><i class="bi bi-map"></i> Peta Street</label>

						<button class="btn btn-primary w-100 my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePotensi" aria-expanded="false" aria-controls="collapsePotensi">
							<div class="d-flex justify-content-between">
								Informasi Potensi Investasi
								<i class="bi bi-chevron-down"></i>
							</div>
						</button>
						<div class="collapse shadow show" id="collapsePotensi">
							<div class="card card-body">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" checked value="4" id="semua">
									<label class="form-check-label" for="semua">
										Semua Potensi
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="4" id="siap">
									<label class="form-check-label" for="siap">
										Siap Ditawarkan
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="4" id="belum">
									<label class="form-check-label" for="belum">
										Belum Siap
									</label>
								</div>
							</div>
						</div>
						<button class="btn btn-primary w-100 my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseAdministrasi" aria-expanded="false" aria-controls="collapseAdministrasi">
							<div class="d-flex justify-content-between">
								Informasi Administrasi
								<i class="bi bi-chevron-down"></i>
							</div>
						</button>
						<div class="collapse shadow" id="collapseAdministrasi">
							<div class="card card-body">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="kecamatan">
									<label class="form-check-label" for="kecamatan">
										Batas Kecamatan
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" type="checkbox" id="kelurahan">
									<label class="form-check-label" for="kelurahan">
										Batas Kelurahan
									</label>
								</div>
							</div>
						</div>
						<button class="btn btn-primary w-100 my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseKependudukan" aria-expanded="false" aria-controls="collapseKependudukan">
							<div class="d-flex justify-content-between">
								Informasi Kependudukan
								<i class="bi bi-chevron-down"></i>
							</div>
						</button>
						<div class="collapse shadow mt-2" id="collapseKependudukan">
							<div class="card card-body">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="4" id="kepadatan">
									<label class="form-check-label" for="kepadatan">
										Kepadatan Penduduk
									</label>
								</div>
							</div>
						</div>
						<button class="btn btn-primary w-100 my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseJalan" aria-expanded="false" aria-controls="collapseJalan">
							<div class="d-flex justify-content-between">
								Infrastruktur Kota
								<i class="bi bi-chevron-down"></i>
							</div>
						</button>
						<div class="collapse shadow mt-2" id="collapseJalan">
							<div class="card card-body">
								<div class="form-check">
									<input class="form-check-input" type="checkbox" value="4" id="jalan">
									<label class="form-check-label" for="jalan">
										Jaringan Jalan
									</label>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</aside>
		<div id="map" class=" shadow" style="height: 100vh;"></div>
		
		<script>
			var map = L.map('map').setView([-6.897628, 109.662813], 13);
			// L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			// 	maxZoom: 19,
			// 	attribution: '© DPMPTSP Kota Pekalongan' 
			// });

			peta_street = new L.TileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png');
			peta_satelit = new L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}');			// 	maxZoom: 20,subdomains: ['mt0', 'mt1', 'mt2', 'mt3']});
			peta_satelit.addTo(map)

			// layer kecamatan
			var layer_kecamatan = new L.GeoJSON.AJAX(["<?= site_url('assets/geojson/Batas_kecamatan.geojson')?>"],{style:style_kecamatan,onEachFeature:detail_kecamatan});
			
			function style_kecamatan(feature) {
				return {
					fillColor: warna_kec(feature.properties['KECAMATAN']),
					fillOpacity: 0.5,
					color: '#444',
					weight: '2',
					dashArray: '4,2,1,2,1,2,1,2,1,2',
				};
			}
			function warna_kec(d) {
				return d == 'Kecamatan Pekalongan Barat' ? '#00CED1':
				d == 'Kecamatan Pekalongan Selatan' ? '#7FFF00': 
				d == 'Kecamatan Pekalongan Timur' ? '#FF8C00':
				d == 'Kecamatan Pekalongan Utara' ? '#FF00FF':'#9e5870';
			}
			function detail_kecamatan(feature, layer) {
				layer.on({
					click: zoomToFeature,
				});
			}
			function zoomToFeature(e) {
				var layer = e.target;
				var text = "<table class='table'><tr><th>Nama Kecamatan</th><td>:</td><td>"+ layer.feature.properties['KECAMATAN'] +"</td></tr><tr><th>Luas Wilayah</th><td>:</td><td>"+ layer.feature.properties['Luas'] +"</td></tr></tabel>";
				layer.bindPopup(text);
				map.fitBounds(e.target.getBounds());
			}
			// end layer kecamtan

			// layer kelurahan
			var layer_kelurahan = new L.GeoJSON.AJAX(["<?= site_url('assets/geojson/Batas_Administrasi.geojson')?>"],{ 
				style:style_kelurahan, onEachFeature:onEachFeature2
			});   
			function style_kelurahan(feature) {
				return {
					fillColor: warna_kel(feature.properties['KELURAHAN']),
					fillOpacity: 0.5,
					color: '#444',
					weight: '2',
					dashArray: '4,2,1,2,1,2,1,2,1,2',
				};
			}

			function warna_kel(d) {
				return d == 'Kelurahan Klego' ? '#dc731f':
				d == 'Kelurahan Kauman' ? '#8a6e3b':
				d == 'Kelurahan Sapuro Kebulen' ? '#d2a43e':
				d == 'Kelurahan Bendan Kergon' ? '#5e5e5e':
				d == 'Kelurahan Medono' ? '#363c5d':
				d == 'Kelurahan Podosugih' ? '#21acbd':
				d == 'Kelurahan Pringrejo' ? '#526afc':
				d == 'Kelurahan Tirto' ? '#8bedae':
				d == 'Kelurahan Kuripan Yosorejo' ? '#715b43':
				d == 'Kelurahan Banyurip' ? '#abd121':
				d == 'Kelurahan Buaran Kradenan' ? '#7ba7b0':
				d == 'Kelurahan Sokoduwet' ? '#e97752':
				d == 'Kelurahan Jenggot' ? '#074fef':
				d == 'Kelurahan Kuripan Kertoharjo' ? '#dfea3d':
				d == 'Kelurahan Setono' ? '#2f124c':
				d == 'Kelurahan Gamer' ? '#e1c8e2':
				d == 'Kelurahan Noyontaansari' ? '#4ad6d0':
				d == 'Kelurahan Poncol' ? '#2c9542':
				d == 'Kelurahan Kali Baros' ? '#9e5870':
				d == 'Kelurahan Krapyak' ? '#376d26':
				d == 'Kelurahan Panjangbaru' ? '#a1e130':
				d == 'Kelurahan Kandang Panjang' ? '#047669':
				d == 'Kelurahan Panjang Wetan' ? '#54040f':
				d == 'Kelurahan Bandengan' ? '#d8c4bf':
				d == 'Kelurahan Padukuhan Kraton' ? '#4b9db3':
				d == 'Kelurahan Pasirkratonkramat' ? '#4552e0':
				d == 'Kelurahan Degayu' ? '#3da222':'#9e5870';
			}

			function onEachFeature2(feature, layer) {
				layer.on({
					click: popUpKelurahan
				});
			}
			function popUpKelurahan(e) {
				var layer = e.target;
				var text = "<table class='table'><tr><th>Kelurahan</th><td>:</td><td>"+ layer.feature.properties['KELURAHAN'] +"</td></tr><tr><th>Nama Kecamatan</th><td>:</td><td>"+ layer.feature.properties['KECAMATAN'] +"</td></tr><tr><th>Luas Wilayah</th><td>:</td><td>"+ layer.feature.properties['Luas'] +"</td></tr></tabel>";
				layer.bindPopup(text);
				map.fitBounds(e.target.getBounds());
			}
			// end layer kelurahan

			// layer kepadatan penduduk
			var layer_kepadatan = new L.GeoJSON.AJAX(["<?= site_url('assets/geojson/Kepadatan_Penduduk.geojson') ?>"],{style:style_kepadatan,onEachFeature:onEachFeature10});   
			function style_kepadatan(feature) {
				return {
					fillColor: warna_kepadatan(feature.properties['KETERANGAN']),
					fillOpacity: 0.5,
					color: '#444',
					weight: '2',
					dashArray: '4,2,1,2,1,2,1,2,1,2',
				};
			}
			function onEachFeature10(feature, layer) {
				layer.on({
					click: popUpKepadatan
				});
			}
			function warna_kepadatan(d) {
				return d == 'Kepadatan Rendah' ? '#F0E68C':d == 'Kepadatan Sedang' ? '#FFD700':d == 'Kepadatan Tinggi' ? '#DAA520':'#9e5870'
			}
			function popUpKepadatan(e) {
				var layer = e.target;
				var text = "<table class='table'><tr><th>Jumlah Penduduk</th><td>:</td><td>"+ layer.feature.properties['JML_PDDK'] +"</td></tr><tr><th>Kepatadan per 1 KM</th><td>:</td><td>"+ layer.feature.properties['KPDTN_PDDK'] +"</td></tr><tr><th>Kepatadan Kepadatan</th><td>:</td><td>"+ layer.feature.properties['KETERANGAN'] +"</td></tr><tr><th>Kelurahan</th><td>:</td><td>"+ layer.feature.properties['KELURAHAN'] +"</td></tr><tr><th>Kecamatan</th><td>:</td><td>"+ layer.feature.properties['KECAMATAN'] +"</td></tr></tabel>";
				layer.bindPopup(text);
				map.fitBounds(e.target.getBounds());
			}
			// end layer kepadatan penduduk
			// layer jalan
			var layer_jalan = new L.GeoJSON.AJAX(["<?= site_url('assets/geojson/Jaringan_Jalan.geojson')?>"],{style:gaya_jalan,onEachFeature:onEachFeature3});
			function gaya_jalan(feature) {
				var kelas = feature.properties['KLS_JALAN'];
				var das = '4,9';
				var w = '4';
				var warna = '#000000';
				if (kelas != 'Jalur Kereta Api') {
					das = '0'
					warna = '#191b23';
				}
				if (kelas == 'Jalur Kereta Api' )  {
					w = '5';
				}else if (kelas == 'Jalan Nasional') { 
					w = '5';
					warna = '2f124c';
				}else if (kelas == 'Jalan Provinsi') { 
					w = '3';
					warna = '#021e75';
				}else  {
					w = '2';
					warna = 'yellow';
				}
				return {
					opacity:0.5,
					weight: w,
					color: warna,
					dashArray: das,
					legendLabel: feature.properties['KLS_JALAN'],
				};
			}

			function onEachFeature3(feature, layer) {
				layer.on({
					click: popUpJalan,
				});
			}
			function popUpJalan(e) {
				var layer = e.target;
				layer.setStyle({
					color: '#8f7b7d',
					fillOpacity: 0.7
				});
				var text = "<table class='table'><tr><th>Nama Jalan</th><td>:</td><td>"+ layer.feature.properties['NAMA_JALAN'] +"</td></tr><tr><th>Kelas Jalan</th><td>:</td><td>"+ layer.feature.properties['KLS_JALAN'] +"</td></tr><tr><th>Fungsi Jalan</th><td>:</td><td>"+ layer.feature.properties['FUNGSI_JAL'] +"</td></tr></tabel>";
				layer.bindPopup(text);
				map.fitBounds(e.target.getBounds());
			}

			// end layer jalan

			document.getElementById("kecamatan").addEventListener("change", function(){
				if (document.getElementById(this.id).checked == true){
					layer_kecamatan.addTo(map);
				} else {
					layer_kecamatan.remove(map);
				}
			});
			document.getElementById("kelurahan").addEventListener("change", function(){
				if (document.getElementById(this.id).checked == true){
					layer_kelurahan.addTo(map);
				} else {
					layer_kelurahan.remove(map);
				}
			});
			document.getElementById("kepadatan").addEventListener("change", function(){
				if (document.getElementById(this.id).checked == true){
					layer_kepadatan.addTo(map);
				} else {
					layer_kepadatan.remove(map);
				}
			});
			document.getElementById("jalan").addEventListener("change", function(){
				if (document.getElementById(this.id).checked == true){
					layer_jalan.addTo(map);
				} else {
					layer_jalan.remove(map);
				}
			});
			document.getElementById("street").addEventListener("click", function(){
				if (document.getElementById(this.id).checked == true){
					peta_street.addTo(map);
				} else {
					peta_street.remove(map);
					peta_satelit.remove(map);
				}
			});
			document.getElementById("satelit").addEventListener("click", function(){
				if (document.getElementById(this.id).checked == true){
					peta_satelit.addTo(map);
					peta_street.remove(map);
				} else {
					peta_satelit.remove(map);
				}
			});
			document.getElementById("semua").addEventListener("click", function(){
				semua_potensi();
			});
			document.getElementById("siap").addEventListener("click", function(){
				if (document.getElementById(this.id).checked == true){
					siap();
				} else {
					markers.clearLayers();
				}
			});
			document.getElementById("belum").addEventListener("click", function(){
				if (document.getElementById(this.id).checked == true){
					belum();
				} else {
					markers.clearLayers();
				}
			});
			function semua_potensi() {
				var allMarker = [];
				<?php foreach ($data as $r) { $foto = explode(",",$r->foto); ?>
					var marker = L.marker([<?= $r->latitude ?>, <?= $r->longtitude?>]);
					allMarker.push(L.marker([<?= $r->latitude ?>, <?= $r->longtitude?>]));
					marker.bindPopup("<img src='<?= site_url('assets/foto/'.$foto[0]) ?>' class='card-img-top mb-3 rounded-3 shadow'><table class='table'><tr><td>Nama Proyek</td><td>:</td><td><?= $r->nama ?></td></tr><tr><td>sektor</td><td>:</td><td><?= $r->sektor ?></td></tr><tr><td>Status</td><td>:</td><td><?= $r->status ?></td></tr><tr><td>Kelurahan</td><td>:</td><td><?= $r->kelurahan ?></td></tr><tr><td>Kecamatan</td><td>:</td><td><?= $r->kecamatan ?></td></tr></table><div class='mt-3 d-grid'><a href='<?= site_url('detail/'.$r->slug) ?>' class='w-auto btn btn-primary link-dark'>Selengkapnya</a></div>");
				<?php } ?>
				if (document.getElementById("semua").checked == true){
					console.log(document.getElementById("semua"))
					console.log("ora")
					for (var i = 0; i < allMarker.length; i++) {
						map.removeLayer(allMarker[i])
					}
					map.clearLayers();
				} else {
					console.log("metu")
					for (var i = 0; i < allMarker.length; i++) {
						allMarker[i].addTo(map)
					}
				}
			}
			function siap() {
				<?php foreach ($siap as $r) { $foto = explode(",",$r->foto); ?>
					var marker = L.marker([<?= $r->latitude ?>, <?= $r->longtitude?>]).addTo(map);
					marker.bindPopup("<img src='<?= site_url('assets/foto/'.$foto[0]) ?>' class='card-img-top mb-3 rounded-3 shadow'><table class='table'><tr><td>Nama Proyek</td><td>:</td><td><?= $r->nama ?></td></tr><tr><td>sektor</td><td>:</td><td><?= $r->sektor ?></td></tr><tr><td>Status</td><td>:</td><td><?= $r->status ?></td></tr><tr><td>Kelurahan</td><td>:</td><td><?= $r->kelurahan ?></td></tr><tr><td>Kecamatan</td><td>:</td><td><?= $r->kecamatan ?></td></tr></table><div class='mt-3 d-grid'><a href='<?= site_url('detail/'.$r->slug) ?>' class='w-auto btn btn-primary link-dark'>Selengkapnya</a></div>");
				<?php } ?>
			}
			
			semua_potensi()
		</script>

	</section>
	<script src="<?= site_url('assets/js/vendors/bootstrap.bundle.min.js')?>"></script>
</body>
</html>