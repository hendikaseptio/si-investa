<link rel="stylesheet" href="<?= site_url("assets/css/plugins/froala_editor.pkgd.min.css")?>">
<section>
	<div class="container fluid">
		<h3>Tambah Data Profil</h3>
		<div class="card shadow">
			<div class="card-header bg-primary">Form tambah profil</div>
			<div class="card-body">
				<form action="<?= site_url('admin/profil/simpan')?>" method="post" enctype="multipart/form-data">
					<!-- <input type="hidden" name="<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>" /> -->
					<div class="mb-3">
						<label for="judul">Judul Profil<small class="sup text-danger">*</small></label>
						<input type="text" name="judul" id="judul" class="form-control" placeholder="Masukkan Judul Profil" autofocus>
					</div>
					<div class="mb-3">
						<label for="deskripsi">Detail <small class="sup text-danger">*</small></label>
						<textarea name="deskripsi" id="deskripsi" cols="30" rows="3" class="form-control" placeholder="Jelaskan tentang proyek tersebut"></textarea>
					</div>
					<div class="mb-3">
						<button type="submit" class="btn btn-primary"><i class="bi bi-save me-2"></i>Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript" src="<?= site_url("assets/js/plugins/select2.min.js")?>"></script>
<script type="text/javascript" src="<?= site_url("assets/js/plugins/froala_editor.pkgd.min.js")?>"></script>
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script> -->
<script>
	new FroalaEditor('#deskripsi',{
		toolbarButtons: ['undo', 'redo','bold', 'italic','underline','fontSize','alignLeft','alignCenter','alignRight','alignJustify','formatUL', 'formatOL','insertLink', 'insertImage','insertTable', 'quote','outdent', 'indent',  'html', 'fullscreen'],
		height: 300,
		imageUploadURL: '<?= site_url('admin/profil/upload')?>',
		imageUploadParams: {
			id: 'my_editor'
		}
	});
	// ClassicEditor
	// .create( document.querySelector( '#deskripsi' ) )
	// .catch( error => {
	// 	console.error( error );
	// } );
</script>