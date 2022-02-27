<?= $this->extend('Admin\Layouts\header')  ?>

<?= $this->section('content')  ?>
<link rel="stylesheet" href="<?= base_url() ?>/admin/assets/vendors/jquery-datatables/jquery.dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="<?= base_url() ?>/admin/assets/vendors/fontawesome/all.min.css">

<div class="page-heading">
    <h3>Data Barang</h3>
</div>
<div class="page-content">
    <div class="container">
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Table Barang
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
                    <a href="<?= base_url()  ?>/admin/barang/add" class="btn btn-primary btn-sm float-end">Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Stok</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($barang as $b) { ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $b->nama_barang  ?></td>
                                    <td><?= $b->stok ?></td>
                                    <td><?= number_to_currency($b->harga, 'IDR')  ?></td>
                                    <td><img width="150px" class="img-thumbnail" src="<?= base_url() . "/admin/assets/img/barang/" . $b->gambar; ?>"></td>
                                    <td>
                                        <div class="row">
                                            <div class="col">
                                                <a href="<?= base_url("admin/barang/delete/" . $b->id) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">
                                                    <dt class="the-icon "><svg class="svg-inline--fa fa-trash fa-w-14 fa-fw select-all text-danger" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                                        </svg><!-- <span class="fa-fw select-all fas"></span> Font Awesome fontawesome.com -->
                                                    </dt>
                                                </a>
                                            </div>
                                            <div class="col">
                                                <a href="<?= base_url("admin/barang/edit/" . $b->id) ?>">
                                                    <dt class="the-icon"><svg class="svg-inline--fa fa-pen fa-w-16 fa-fw select-all text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M290.74 93.24l128.02 128.02-277.99 277.99-114.14 12.6C11.35 513.54-1.56 500.62.14 485.34l12.7-114.22 277.9-277.88zm207.2-19.06l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.76 18.75-49.16 0-67.91z"></path>
                                                        </svg><!-- <span class="fa-fw select-all fas"></span> Font Awesome fontawesome.com -->
                                                    </dt>
                                                </a>
                                            </div>
                                            <div class="col"></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
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
<?= $this->endSection()  ?>