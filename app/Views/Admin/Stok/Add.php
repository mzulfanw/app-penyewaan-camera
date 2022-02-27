<?= $this->extend('Admin\Layouts\header') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Form Tambah Stok
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Kembali Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url() ?>/admin/stok/store">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Nama Barang *</label>
                    <select class="form-select" aria-label="Default select example" name="barang_id">
                        <option selected>--- Pilih Barang ---</option>
                        <?php foreach ($barang as $value) { ?>
                            <option value="<?= $value['id'] ?>"><?= $value['nama_barang'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="example" class="form-label">Stok *</label>
                    <input type="number" class="form-control" name="stok">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>