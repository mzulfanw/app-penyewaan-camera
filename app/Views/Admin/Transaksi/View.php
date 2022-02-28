<?= $this->extend('Admin\Layouts\header') ?>
<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Data Transaksi <?= $transaksi->nama_barang ?></h3>
</div>

<div class="card p-5">
    <div class="card-body">
        <p>Gambar KTP</p>
        <img src="<?= base_url() . "/admin/assets/img/transaksi/ktp/" . $transaksi->potoktp ?>" class="img-thumbnail w-75 d-block mx-auto" alt="">
        <hr>
        <p>Gambar Bukti Transfer</p>
        <img src="<?= base_url() . "/admin/assets/img/transaksi/tf/" . $transaksi->pototf ?>" class="img-thumbnail w-75 d-block mx-auto" alt="">
        <hr>
        <p>Status</p>
        <!-- <?php if ($transaksi->status == "Menunggu") : ?>
            <div class="alert alert-warning">
                <p class="text-dark">Status : <?= $transaksi->status ?></p>
            </div>
        <?php elseif ($transaksi->status == "success") : ?>
            <div class="alert alert-success">
                <p>Status : <?= $transaksi->status ?></p>
            </div>
        <?php elseif ($transaksi->status == "failed") : ?>
            <div class="alert alert-danger">
                <p>Status : <?= $transaksi->status ?></p>
            </div>
        <?php endif ?> -->


        <input type="text" value="<?= $transaksi->status ?>" disabled class="form-control">
        <form action="<?= base_url('/admin/transaksi/update/' . $transaksi->id) ?>" method="POST">
            <input type="text" placeholder="Ubah Status Transaksi" class="form-control mt-3" name="status">
            <div class="mt-3">
                <span>Tenggat Pengembalian</span>
                <input type="date" class="form-control" name="tanggal">
            </div>
            <button class="btn btn-primary w-25 btn-sm mt-3">Ubah Status</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>