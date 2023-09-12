<link rel="stylesheet" href="<?= site_url("assets/css/plugins/select2.min.css")?>">
<section>
	<div class="container fluid">
		<h3>Tambah Data Potensi</h3>
		<div class="card shadow">
			<div class="card-header bg-primary">Form tambah potensi</div>
			<div class="card-body">
				<form action="<?= site_url('admin/potensi/simpan')?>" method="post" enctype="multipart/form-data">
					<!-- <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" /> -->
					<div class="mb-3">
						<label for="nama">Nama Proyek <small class="sup text-danger">*</small></label>
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Proyek" autofocus required>
					</div>
					<div class="mb-3">
						<label for="sektor">Pilih Sektor <small class="sup text-danger">*</small></label>
						<select name="sektor" id="sektor" class="form-control ">
							<option value="" selected disabled>-- Pilih Sektor --</option>
							<?php foreach ($sektor as $s) { ?>
								<option value="<?= $s->id ?>"><?= $s->nama ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<div class="row">
							<div class="col-6">
								<label for="lat">Latitude <small class="sup text-danger">*</small></label>
								<input type="text" name="lat" id="lat" class="form-control" placeholder="Misalnya 8.347435" required>
							</div>
							<div class="col-6">
								<label for="long">Logtitude <small class="sup text-danger">*</small></label>
								<input type="text" name="long" id="long" class="form-control" placeholder="Misalnya -11.34345890" required>
							</div>
						</div>
					</div>
					<div class="mb-3">
						<label for="kecamatan">Pilih Kecamatan <small class="sup text-danger">*</small></label>
						<select name="kecamatan" id="kecamatan" class="form-control ">
							<option value="" selected disabled>-- Pilih Kecamatan --</option>
							<?php foreach ($kecamatan as $row) { ?>
								<option value="<?= $row->id ?>"><?= $row->nama ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="kelurahan">Pilih Kelurahan <small class="sup text-danger">*</small></label>
						<select name="kelurahan" id="kelurahan" class="form-control ">
							<option value="" selected disabled>-- Pilih Kelurahan --</option>
							<?php foreach ($kelurahan as $row) { ?>
								<option value="<?= $row->id ?>"><?= $row->nama ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="mb-3">
						<label for="lokasi">Alamat <small class="sup text-danger">*</small></label>
						<textarea name="lokasi" id="lokasi" cols="30" rows="3" class="form-control" placeholder="Masukkan alamat lengkap seperti jl,rt/rw,kel.,kec.,kota" required></textarea>
					</div>
					<div class="mb-3">
						<label for="detail_proyek">Detail Proyek <small class="sup text-danger">*</small></label>
						<textarea name="detail_proyek" id="detail_proyek" cols="30" rows="3" class="form-control" placeholder="Jelaskan tentang proyek tersebut" required></textarea>
					</div>
					<div class="mb-3">
						<label for="kondisi_eksisting">Kondisi Eksisting <small class="sup text-danger">*</small></label>
						<textarea name="kondisi_eksisting" id="kondisi_eksisting" cols="30" rows="3" class="form-control" placeholder="Jelaskan Kondisi Saat Ini" required></textarea>
					</div>
					<div class="mb-3">
						<label for="peluang_investasi">Peluang Investasi <small class="sup text-danger">*</small></label>
						<textarea name="peluang_investasi" id="peluang_investasi" cols="30" rows="3" class="form-control" placeholder="Jelaskan keuntungan investor jika berinvestasi pada proyek ini" required></textarea>
					</div>
					<div class="mb-3">
						<label for="status">Status Penawaran <small class="sup text-danger">*</small></label>
						<br>
						<input type="radio" class="btn-check" name="status" value="siap" id="siap" autocomplete="off" checked>
						<label class="btn btn-outline-primary" for="siap">Siap Ditawarkan</label>

						<input type="radio" class="btn-check" name="status" value="belum" id="belum" autocomplete="off">
						<label class="btn btn-outline-primary" for="belum">Belum Siap</label>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col-6">
									<div class="mb-3">
										<label for="foto1">Foto 1</label>
										<input type="file" name="foto1" id="foto1" class="form-control" accept=".jpg, .png, image/jpeg, image/png">
										<img src="#" id="prev1" class="img-fluid shadow mt-2">
									</div>
									<div class="mb-3">
										<label for="foto2">Foto 2</label>
										<input type="file" name="foto2" id="foto2" class="form-control" accept=".jpg, .png, image/jpeg, image/png">
										<img src="#" id="prev2" class="img-fluid shadow mt-2">
									</div>		
								</div>
								<div class="col-6">
									<div class="mb-3">
										<label for="foto3">Foto 3</label>
										<input type="file" name="foto3" id="foto3" class="form-control" accept=".jpg, .png, image/jpeg, image/png">
										<img src="#" id="prev3" class="img-fluid shadow mt-2">
									</div>
									<div class="mb-3">
										<label for="foto4">Foto 4</label>
										<input type="file" name="foto4" id="foto4" class="form-control" accept=".jpg, .png, image/jpeg, image/png">
										<img src="#" id="prev4" class="img-fluid shadow mt-2">
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="mb-3">
								<label for="">Video</label>
								<input type="file" name="video" id="video" class="form-control"  accept=".mp4">
							</div>
							<video width="100%" height="auto" autoplay><source src="#" id="prevVid" type="video/mp4"></video> 
							<div class="mb-3">
								<button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?= site_url("assets/js/plugins/select2.min.js")?>"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
<script>
	foto1.onchange = evt => {
		const [file] = foto1.files
		if (file) {
			prev1.src = URL.createObjectURL(file)
		}
	}
	foto2.onchange = evt => {
		const [file] = foto2.files
		if (file) {
			prev2.src = URL.createObjectURL(file)
		}
	}
	foto3.onchange = evt => {
		const [file] = foto3.files
		if (file) {
			prev3.src = URL.createObjectURL(file)
		}
	}
	foto4.onchange = evt => {
		const [file] = foto4.files
		if (file) {
			prev4.src = URL.createObjectURL(file)
		}
	}

	$(document).ready(function() {
		$(document).on("change", "#video", function(evt) {
			var $source = $('#prevVid');
			$source[0].src = URL.createObjectURL(this.files[0]);
			$source.parent()[0].load();
		});
		// select2
		$('#kecamatan').on("change", function () {
			$('#kelurahan').select2();
			$.ajax({
				type: 'POST',
				url: '<?= base_url('admin/potensi/get_kel') ?>',
				data: 'id=' + $(this).val(),
				success: function (response) {
					$('#kelurahan').html(response);
				}, error: function (response) {
					alert(response);
				}
			});
		})
		$('.select2').select2();
	});
	ClassicEditor
	.create( document.querySelector( '#detail_proyek' ) )
	.catch( error => {
		console.error( error );
	} );
	ClassicEditor
	.create( document.querySelector( '#kondisi_eksisting' ) )
	.catch( error => {
		console.error( error );
	} );
	ClassicEditor
	.create( document.querySelector( '#peluang_investasi' ) )
	.catch( error => {
		console.error( error );
	} );
</script>