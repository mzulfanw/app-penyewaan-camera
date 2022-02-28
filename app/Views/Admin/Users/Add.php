<?= $this->extend('Admin\Layouts\header') ?>
<?= $this->section('content') ?>

<div class="container">
    <div class="card">
        <div class="card-header">
            Form Tambah Admin
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('error'))) : ?>
                <div class="alert alert-danger" role="alert">
                    <h4>Periksa Kembali Form</h4>
                    </hr />
                    <?php echo session()->getFlashdata('error'); ?>
                </div>
            <?php endif; ?>
            <form method="POST" action="<?= base_url() ?>/admin/users/store">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="example" class="form-label">username *</label>
                    <input type="text" class="form-control" name="username">
                </div>
                <div class="mb-3">
                    <label for="example" class="form-label">password *</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="mb-3">
                    <label for="example" class="form-label">nama *</label>
                    <input type="text" class="form-control" name="nama">
                </div>
                <div class="mb-3">
                    <label for="">Status</label>
                    <input type="text" class="form-control " disabled name="status" value="admin">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary btn-sm" value="Simpan">
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>