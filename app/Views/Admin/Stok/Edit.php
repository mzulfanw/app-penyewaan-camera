<?= $this->extend('Admin\Layouts\header')  ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Update Data Stok</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <h4>Periksa Kembali</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form action="<?= base_url("/admin/stok/update/" . $stok['id']) ?>" method="POST">
                <?= csrf_field() ?>
                <input type="hidden" name="barang_id" value="<?= $stok['barang_id'] ?>">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Stok</label>
                    <input type="text" class="form-control" name="stok" placeholder="Masukan Nama Kategori" value="<?= $stok['stok'] ?>">
                </div>
                <div class=" mb-3">
                    <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>