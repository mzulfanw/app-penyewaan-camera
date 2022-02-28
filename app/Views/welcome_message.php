<?= $this->extend('layout/Header')   ?>

<?= $this->section('content') ?>

<!-- Start Hero Area -->

<!-- End Hero Area -->

<!-- Start Trending Product Area -->
<section class="trending-product section" style="margin-top: 12px;">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="section-title">
					<h2>Semua Produk</h2>
					<p>Bingung nyewa peralatan camping yang nyaman dan aman ?,cek barang barang yang tersedia disini.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-12">
				<?php
				if (session()->getFlashdata('pesan')) {
					echo '<div class="alert alert-success">';
					echo session()->getFlashdata('pesan');
					echo '</div>';
				}

				?>
			</div>
		</div>
		<div class="row">
			<?php foreach ($barang as  $value) {
			?>
				<div class="col-lg-3 col-md-6 col-12">
					<?= form_open('home/add');
					echo form_hidden('id', $value->id);
					echo form_hidden('price', $value->harga);
					echo form_hidden('name', $value->nama_barang);
					echo form_hidden('gambar', $value->gambar);
					echo form_hidden('kategori', $value->nama_kategori);
					?>
					<!-- Start Single Product -->
					<div class="single-product">
						<div class="product-image">
							<img src="<?= base_url() . "/admin/assets/img/barang/" . $value->gambar; ?>" alt="#">
						</div>
						<div class="product-info">
							<span class="category"><?= $value->nama_kategori ?></span>
							<h4 class="title">
								<a href="<?= base_url('/barang/' . $value->kslug . '/' . $value->bslug)  ?>"><?= $value->nama_barang ?></a>
								<p>Stok : <?= $value->stok ?></p>
							</h4>
							<div class="price">
								<span><?= number_format($value->harga, 2, ',', '.')  ?></span>
							</div>
							<?php if ($value->stok > 0) { ?>
								<button type="submit" class="btn btn-secondary btn-sm mt-4">Add To Cart</button>
							<?php	} else {
								echo '<div class="alert alert-danger mt-2">Stok Habis</div>';
							} ?>


						</div>
					</div>
					<!-- End Single Product -->
					<?= form_close()  ?>
				</div>
			<?php } ?>
		</div>
	</div>
</section>
<!-- End Trending Product Area -->





<!-- Start Shipping Info -->
<section class="shipping-info">
	<div class="container">
		<ul>
			<!-- Free Shipping -->
			<li>
				<div class="media-icon">
					<i class="lni lni-delivery"></i>
				</div>
				<div class="media-body">
					<h5>Free Shipping</h5>
					<span>On order over $99</span>
				</div>
			</li>
			<!-- Money Return -->
			<li>
				<div class="media-icon">
					<i class="lni lni-support"></i>
				</div>
				<div class="media-body">
					<h5>24/7 Support.</h5>
					<span>Live Chat Or Call.</span>
				</div>
			</li>
			<!-- Support 24/7 -->
			<li>
				<div class="media-icon">
					<i class="lni lni-credit-cards"></i>
				</div>
				<div class="media-body">
					<h5>Online Payment.</h5>
					<span>Secure Payment Services.</span>
				</div>
			</li>
			<!-- Safe Payment -->
			<li>
				<div class="media-icon">
					<i class="lni lni-reload"></i>
				</div>
				<div class="media-body">
					<h5>Easy Return.</h5>
					<span>Hassle Free Shopping.</span>
				</div>
			</li>
		</ul>
	</div>
</section>
<!-- End Shipping Info -->


<?= $this->endSection() ?>