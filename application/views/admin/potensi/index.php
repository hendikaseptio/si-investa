<link rel="stylesheet" href="<?= site_url('assets/css/plugins/datatables.min.css')?>">
<section>
	<div class="container fluid">
		<h3>Data Potensi</h3>
		<?php if($this->session->flashdata('sukses')) { ?>
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('sukses')?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php } ?>
		<?php if($this->session->flashdata('error')) { ?>
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				<?= $this->session->flashdata('error')?>
				<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
			</div>
		<?php } ?>
		<div class="d-flex justify-content-start mt-5">
			<a href="<?= site_url("admin/potensi/tambah")?>" class="btn btn-primary"><i class="bi bi-plus me-2"></i>Tambah Potensi Baru</a>
		</div>
		<div class="card shadow my-3">
			<div class="card-header bg-secondary" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter"><i class="bi bi-funnel"></i> Filter Tabel</div>
			<div class="collapse" id="collapseFilter">
				<div class="card-body">
					<form action="">
						<div class="row">
							<div class="col-md-6">
								<div class="mb-3">
									<label for="">Nama</label>
									<input type="text" name="" id="" class="form-control" placeholder="Filter Nama">
								</div>
								<div class="mb-3">
									<label for="">Lokasi</label>
									<input type="text" name="" id="" class="form-control" placeholder="Filter Nama">
								</div>
							</div>
							<div class="col-md-6">
								<div class="mb-3">
									<label for="">Nama</label>
									<input type="text" name="" id="" class="form-control" placeholder="Filter Nama">
								</div>
								<div class="mb-3">
									<label for="">Lokasi</label>
									<input type="text" name="" id="" class="form-control" placeholder="Filter Nama">
								</div>
								<button type="submit" class="btn btn-primary"><i class="bi bi-filter-circle me-2"></i>Filter</button>
								<a href="<?= site_url('admin/potensi')?>" class="btn btn-outline-primary"><i class="bi bi-arrow-clockwise me-2"></i>Reset</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered table-striped" id="myTable">
				<thead>
					<tr>
						<th>No</th>
						<th>Nama</th>
						<th>Sektor</th>
						<th>status</th>
						<th>Kecamatan/Kelurahan</th>
						<th>aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no=1; foreach ($data as $r) { ?>
						<tr>
							<td><?= $no++?></td>
							<td><b><?= $r->nama ?></b> <br> <small><?= $r->lokasi ?></small></td>
							<td><?= $r->sektor ?></td>
							<td><?= $r->status ?></td>
							<td><b><?= $r->kecamatan ?></b><br><?= $r->kelurahan ?></td>
							<td class="no-wrap">
								<a href="<?= site_url("admin/potensi/edit/".$r->id)?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit </a>
								<a href="<?= site_url("admin/potensi/hapus/".$r->id)?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-trash"></i> Hapus</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>
<script src="<?= site_url("assets/js/plugins/datatables.min.js")?>"></script>
<script>
	let table = new DataTable('#myTable');
</script>