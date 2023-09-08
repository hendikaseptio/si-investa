<section>
	<div class="container">
		<h1>Data Investasi</h1>
		<hr>
		<!-- <div class="card shadow mb-3">
			<div class="card-header bg-primary rounded-0 text-white" > <i class="bi bi-filter"></i> Filter</div>
			<div class="card-body">
				<form action="" method="get">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3">
								<label for="tgl_awal" class="form-label">Tanggal Awal</label>
								<input type="date" class="form-control" id="tgl_awal">
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="tgl_akhir" class="form-label">Tanggal Akhir</label>
								<input type="date" class="form-control" id="tgl_akhir">
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="tgl_akhir" class="form-label">Kasus</label>
						<select name="kasus" id="kasus" class="form-control">
							
						</select>
					</div>
					<div class="mb-3">
						<label for="status" class="form-label">Status</label>
						<select name="status" id="status" class="form-control">
							<option value="baru">Baru</option>
							<option value="diproses">Diproses</option>
						</select>
					</div>
					<button class="btn btn-primary"><i class="bi bi-funnel"></i> Filter</button>
					<button type="reset" class="btn btn-dark"><i class="bi bi-arrow-repeat"></i> Reset</button>
				</form>
			</div>
		</div> -->
		<br>
		<div class="card">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover" id="table_aduan">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nama Proyek</th>
								<th>Sektor</th>
								<th>Lokasi</th>
								<th>Kecamatan</th>
								<th>Kelurahan</th>
								<th>Latitude</th>
								<th>Logtitude</th>
								<th>Uraian Proyek</th>
								<th>KONDISI EKSISTING</th>
								<th>PELUANG INVESTASI</th>
								<th>GALERI</th>
								<th>video</th>
								<th>Aksi</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>
<script src="https://cdn.datatables.net/v/bs5/dt-1.13.5/b-2.4.1/b-html5-2.4.1/r-2.5.0/sc-2.2.0/datatables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
	// $(document).ready( function () {
	// 	$('#table_aduan').DataTable( {
	// 		language: {
	// 			"url": "//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json"
	// 		},
	// 		serverSide: true,
	// 		processing: true,
	// 		order: [],
	// 		ajax: {
	// 			url: '<?= site_url('admin/get_data_aduan')?>',
	// 			type: 'POST'
	// 			data: {<?=$this->security->get_csrf_token_name()?>:<?=$this->security->get_csrf_hash()?>}
	// 		}
	// 	} );
	// });

	$(document).ready( function () {
		$('#table_aduan').DataTable();
	} );


</script>