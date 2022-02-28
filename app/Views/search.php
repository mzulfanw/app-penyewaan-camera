<?= $this->extend('layout/Header')   ?>

<?= $this->section('content') ?>



<?php if (!empty($data)) {
    foreach ($data as $result) { ?>
        <?= form_open('home/add');
        echo form_hidden('id', $result->id);
        echo form_hidden('price', $result->harga);
        echo form_hidden('name', $result->nama_barang);
        echo form_hidden('gambar', $result->gambar);
        echo form_hidden('kategori', $result->nama_kategori);
        ?>
        <div class="container m-5" style="min-height: 100vh;">
            <div class="card" style="width: 18rem;">
                <img src="<?= base_url('/admin/assets/img/barang/' . $result->gambar) ?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <div class="product-info">
                        <span class="category"><?= $result->nama_kategori ?></span>
                        <h4 class="title">
                            <a href="<?= base_url('/barang/' . $result->kslug . '/' . $result->bslug)  ?>"><?= $result->nama_barang ?></a>
                        </h4>
                        <div class="price">
                            <span><?= number_format($result->harga, 2, ',', '.')  ?></span>
                        </div>
                        <?php if ($result->stok > 0) { ?>
                            <button type="submit" class="btn btn-secondary btn-sm mt-4">Add To Cart</button>
                        <?php    } else {
                            echo '<div class="alert alert-danger mt-2">Stok Habis</div>';
                        } ?>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
<?php } else { ?>
    <div class="container m-5" style="min-height: 100vh;">
        <h1 class="text-center">Data tidak ditemukan . </h1>
        <p class="text-center">Keyword kamu kayanya salah deh ... , dicek lagi ya</p>
    </div>
<?php } ?>


<?= $this->endSection()  ?>