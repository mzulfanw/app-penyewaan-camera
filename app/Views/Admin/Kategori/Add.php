<?= $this->extend('Admin/Layouts/header')   ?>
<?= $this->section('content')  ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Form Tambah Kategori
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Kembali Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url() ?>/admin/kategori/store" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Kategori *</label>
                    <input type="text" class="form-control" name="nama_kategori" placeholder="Masukan Nama Barang" value="<?= old('nama_barang'); ?>">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>