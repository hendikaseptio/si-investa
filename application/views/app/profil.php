	<section id="top" class="bg-gradient">
		<div class="container">
			<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="<?= site_url()?>" class="link-dark">Home</a></li>
					<li class="breadcrumb-item active" aria-current="page">Profil</li>
				</ol>
			</nav>
			<h4><?= $data["judul"] ?></h4>
		</div>
	</section>
	<section>
		<div class="container">
			<h1><?= $data["judul"] ?></h1>
			<?= $data["deskripsi"] ?>
		</div>
	</section>