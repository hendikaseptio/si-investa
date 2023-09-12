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
			<div class="d-flex align-items-center justify-content-between">
				<b>Berdasarkan Sektor :</b>
				<form action="" method="get">
					<div class="input-group mb-3">
						<input type="text" name="cari" id="cari" class="form-control border-primary" placeholder="Cari Potensi Investasi Disini!" value="<?= $this->input->get('cari') ?>">
						<button class="btn btn-outline-primary" type="button" id="button-addon2">Telusuri</button>
					</div>
				</form>
			</div>
			<hr>
			<a href="<?= site_url('investasi/sektor') ?>" class="m-1 btn btn-sm btn-outline-primary">Semua Sektor</a>
			<?php foreach ($sektor as $r) { ?>
				<a href="?sektor=<?= $r->id ?>" class="m-1 btn btn-sm btn-outline-primary"><?= $r->nama?></a>
			<?php } ?>

			<div class="row mt-5">
				<?php foreach ($data as $row) { ?>
					<?php $foto = explode(",", $row->foto); ?>
					<div class="col-sm-6 col-md-4 col-lg-3 py-2">
						<div class="card">
							<img src="<?= site_url('assets/foto/').$foto[0] ?>" alt="" class="card-img-top">
							<div class="card-body">
								<h5><?= $row->nama ?></h5>
								<p class="text-secondary text-uppercase"><?= $row->sektor ?></p>
								<a href="<?= site_url('detail/'.$row->slug )?>" class="btn btn-primary"><i class="me-2 bi bi-file-richtext"></i> Selengkapnya</a>
							</div>
						</div>
					</div>
				<?php } ?>
				<?php if(empty($this->input->get('sektor')) & empty($this->input->get('cari'))) {?>
				<?= $pagination ?>
				<?php } ?>
			</div>
		</div>
	</section>