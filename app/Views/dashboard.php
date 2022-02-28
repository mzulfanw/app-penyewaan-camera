<?= $this->extend('Layout\Header') ?>
<?= $this->section('content') ?>

<div class="container mt-5 " style="min-height: 100vh;">
    <h1 class="text-center">Dashboard</h1>
    <div class="row mt-5">
        <div class="col-lg-6">
            <h3>Transaksi</h3>
            <div class="container mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Barang </th>
                            <th scope="col">Jumlah barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($transaksi as $val) { ?>
                            <tr>
                                <th scope="row"><?= $i++  ?></th>
                                <td><?= $val->nama_barang ?></td>
                                <td><?= $val->jumlah ?></td>
                                <td><?= number_to_currency($val->total_harga, 'IDR') ?></td>
                                <td><?= $val->status == "Berhasil" ?  '<p class="badge bg-primary">' . $val->status . '</p>' : '<p class="badge bg-secondary">Pending</p>' ?></td>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-lg-6">
            <h3>Tenggat Pengembalian</h3>
            <div class="mt-3">
                <span>Tenggat Pengembalian akan muncul ketika status Berhasil</span>
                <?php foreach ($transaksi as $value) { ?>
                    <?php if ($value->status == "Berhasil") { ?>
                        <div class="alert alert-secondary" role="alert">
                            <?= $value->nama_barang ?>
                            <span class="badge bg-warning ms-3 text-dark">
                                <?= $value->tanggal_keluar ?>
                            </span>
                        </div>
                    <?php } else if ($value->status == "Gagal") { ?>
                        <div class="alert alert-danger" role="alert">
                            <p>Mohon Maaf kami menemukan sesuatu yang mencurigakan, pada barang yang anda beli <?= $value->nama_barang ?>. Silahkan hubungi admin@camera.com</p>
                        </div>
                    <?php } ?>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>