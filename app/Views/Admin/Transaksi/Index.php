<?= $this->extend('Admin\Layouts\header') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url() ?>/admin/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/admin/assets/vendors/fontawesome/all.min.css">

<div class="page-heading">
    <h3>Data Transaksi</h3>
</div>
<div class="page-content">
    <div class="container">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Table Barang

                    <a href="<?= base_url('Admin/Transaksi/cetak') ?>" class="btn btn-secondary btn-sm float-end">Cetak PDF</a>

                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger" role="alert">
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                        </div>
                    <?php endif; ?>
                    <?php if (!empty(session()->getFlashdata('success'))) : ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo session()->getFlashdata('success'); ?>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Nama Penyewa</th>
                                <th>Jumlah</th>
                                <th>Pembayaran</th>
                                <th>Tanggal Sewa</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($transaksi as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1  ?></td>
                                    <td><?= $value->nama_barang ?></td>
                                    <td><?= $value->name ?></td>
                                    <td><?= $value->jumlah ?></td>
                                    <td><?= strtoupper($value->payment_method) ?></td>
                                    <td><?= $value->tanggal ?></td>
                                    <?php if ($value->status == "Berhasil") { ?>
                                        <td><span class="badge bg-success"><?= $value->status ?></span></td>
                                    <?php } else if ($value->status == "Sudah di Bayar") { ?>
                                        <td><span class="badge bg-warning text-dark"><?= $value->status  ?></span></td>
                                    <?php } else { ?>
                                        <td><span class="badge bg-danger"><?= $value->status ?></span></td>
                                    <?php } ?>
                                    <td>
                                        <a href="<?= base_url('/admin/transaksi/view/' . $value->id) ?>">
                                            <dt class="the-icon "><svg class="svg-inline--fa fa-info fa-w-6 fa-fw select-all " aria-hidden="true" focusable="false" data-prefix="fas" data-icon="info" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">
                                                    <path fill="currentColor" d="M20 424.229h20V279.771H20c-11.046 0-20-8.954-20-20V212c0-11.046 8.954-20 20-20h112c11.046 0 20 8.954 20 20v212.229h20c11.046 0 20 8.954 20 20V492c0 11.046-8.954 20-20 20H20c-11.046 0-20-8.954-20-20v-47.771c0-11.046 8.954-20 20-20zM96 0C56.235 0 24 32.235 24 72s32.235 72 72 72 72-32.235 72-72S135.764 0 96 0z"></path>
                                                </svg><!-- <span class="fa-fw select-all fas"></span> Font Awesome fontawesome.com -->
                                            </dt>
                                        </a>
                                    </td>
                                </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>
<script src="<?= base_url()  ?>/admin/assets/vendors/jquery/jquery.min.js"></script>
<script src="<?= base_url()  ?>/admin/assets/vendors/jquery-datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url()  ?>/admin/assets/vendors/jquery-datatables/custom.jquery.dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url() ?>/admin/assets/vendors/fontawesome/all.min.js"></script>
<script>
    // Jquery Datatable
    let jquery_datatable = $("#table1").DataTable()
</script>
<?= $this->endSection() ?>