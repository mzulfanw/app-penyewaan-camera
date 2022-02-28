<?= $this->extend('Admin\Layouts\header') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Admin Dashboard</h3>
</div>
<div class="page-content">
    <?php foreach ($stock as $value) {
        if (empty($value->stok)) { ?>
            <div class="alert alert-warning text-dark"><i class="bi bi-exclamation-triangle me-3"></i> Ada Stok barang yang sudah habis <?= $value->nama_barang ?></div>
        <?php } ?>
    <?php } ?>
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Pengguna</h6>
                                    <h6 class="font-extrabold mb-0"><?= $user ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Barang</h6>
                                    <h6 class="font-extrabold mb-0"><?= $barang ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-4 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Transaksi</h6>
                                    <h6 class="font-extrabold mb-0"><?= $transaksi ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-5">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="assets/images/faces/1.jpg" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= session()->get('name') && session()->get('status') == "admin" ? session()->get('name') : ''  ?></h5>
                            <a href="<?= base_url('/auth/logout') ?>" class="btn btn-danger btn-sm">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?= $this->endSection() ?>