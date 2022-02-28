<?= $this->extend('Layout/Header')  ?>
<?= $this->section('content') ?>
<div class="container m-5 d-block mx-auto" style="min-height: 100vh;">
    <div class="card">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <form id="login_form" method="POST" action="<?= base_url() ?>/login/proccess">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password">
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>