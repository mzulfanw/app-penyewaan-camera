<?= $this->extend('Layout/Header')  ?>
<?= $this->section('content') ?>

<div class="container m-5 d-block mx-auto">
    <div class="card">
        <div class="card-body">
            <form id="register_form">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control" id="nama_lengkap" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Nomer Handphone</label>
                    <input type="text" class="form-control" id="nomer_handphone">
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function() {

    })

    $('#register_form').on('submit', function(e) {
        e.preventDefault();
        console.log("asdas")
        var nama_lengkap = $('#nama_lengkap').val();
        var username = $('#username').val();
        var password = $('#password').val();
        var nomer_handphone = $('#nomer_handphone').val();

        // Check if username is empty and showing swall alert
        if (nama_lengkap == '') {
            swal({
                title: 'Nama Lengkap tidak boleh kosong',
                icon: 'warning',
                button: 'Ok'
            })
        } else if (username == '') {
            swal({
                title: "Username tidak boleh kosong",
                icon: "warning",
                button: "Ok",
            });
        } else if (password == '') {
            swal({
                title: "Password tidak boleh kosong",
                icon: "warning",
                button: "Ok",
            });
        } else if (nomer_handphone == '') {
            swal({
                title: "Nomer Handphone tidak boleh kosong",
                icon: "warning",
                button: "Ok",
            });
        } else {
            $.ajax({
                url: "<?= base_url('/register') ?>",
                type: "POST",
                data: {
                    nama_lengkap: nama_lengkap,
                    username: username,
                    password: password,
                    nomer_handphone: nomer_handphone
                },
                success: function(data) {
                    console.log(data)

                    swal({
                        title: "Berhasil Register",
                        icon: "success",
                        button: "Ok",
                    }).then(function() {
                        window.location.href = "<?= base_url('/login') ?>";
                    });

                }
            });
        }
    })
</script>


<?= $this->endSection() ?>