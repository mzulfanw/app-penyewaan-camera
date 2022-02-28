<?= $this->extend('layout/Header')   ?>

<?= $this->section('content') ?>


<div class="container w-100" style="min-height: 100vh;">
    <div class="row m-5">
        <div class="col-lg-12 col-md-12 col-sm-12 ">
            <img src="<?= base_url() . "/admin/assets/img/barang/" . $detail->gambar; ?>" class="img-fluid" style="object-fit: contain; width: 100%; height: 400px;" alt="<?= $detail->nama_barang ?>">
        </div>
    </div>
    <div class="d-flex flex-column">
        <div class="text-dark container p-3">
            <div class="">
                <p class="badge bg-primary "><?= $detail->nama_kategori ?></p>
            </div>
            <div>
                <p class="text-secondary">Diposting oleh Admin</p>
            </div>
        </div>
        <div class=" text-dark p-3">
            <h3 class="mb-3"><?= $detail->nama_barang ?></h3>
            <p class="fs-6 text-justify"><?= $detail->deskripsi ?></p>
        </div>
        <div class="p-3">
            <?php if (session()->get('logged_in') == true) {
                echo '<a href="' . base_url() . '/logout/user" class="btn btn-success btn-sm">Logout</a>';
            } else {
                echo '<a href="' . base_url() . '/login"   class="btn btn-success btn-sm">Login terlebih dahulu</a>';
            }    ?>
        </div>
    </div>
</div>

<script></script>

<?= $this->endSection() ?>