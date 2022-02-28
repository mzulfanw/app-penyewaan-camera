<?= $this->extend('Admin\Layouts\header') ?>

<?= $this->section('content') ?>

<div class="page-heading">
    <h3>Data Pengguna</h3>
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
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama Lengkap</th>
                                <th>Nomer Handphone</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($user as $u) { ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $u['username'] ?></td>
                                    <td><?= $u['name'] ?></td>
                                    <td><?= substr($u['nomer_handphone'], 0, 4) . "****" . substr($u['nomer_handphone'], 7, 4) ?></td>
                                    <td>
                                        <a class="btn btn-danger" href="<?= base_url('/admin/pengguna/delete/' . $u['id']) ?>">
                                            <dt class="the-icon "><svg class="svg-inline--fa fa-trash fa-w-14 fa-fw select-all text-white" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                    <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                                </svg><!-- <span class="fa-fw select-all fas"></span> Font Awesome fontawesome.com -->
                                            </dt>
                                        </a>
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


<?= $this->endSection() ?>