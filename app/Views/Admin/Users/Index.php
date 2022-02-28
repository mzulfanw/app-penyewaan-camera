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
                    Table Admin

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
                    <a href="<?= base_url()  ?>/admin/users/add" class="btn btn-primary btn-sm float-end">Tambah</a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Nama</th>
                                <th width="100">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($admin as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['username'] ?></td>
                                    <td><?= $value['name']  ?></td>
                                    <td>
                                        <div class="row">
                                            <div class="col ">
                                                <a class="" href="<?= base_url("admin/users/delete/" . $value['id']) ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ?')">
                                                    <dt class="the-icon "><svg class="svg-inline--fa fa-trash fa-w-14 fa-fw select-all text-danger " aria-hidden="true" focusable="false" data-prefix="fas" data-icon="trash" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                            <path fill="currentColor" d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z"></path>
                                                        </svg><!-- <span class="fa-fw select-all fas"></span> Font Awesome fontawesome.com -->
                                                    </dt>
                                                </a>
                                            </div>
                                            <div class="col"></div>
                                        </div>
                                    </td>
                                </tr>
                            <?php }    ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>


<?= $this->endSection() ?>