<?php $keranjang = $cart->contents() ?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body class="bg-secondary">

    <div class="card" style="display: block; margin: 100px 300px;">
        <?php if (!empty(session()->getFlashdata('error'))) : ?>
            <div class="alert alert-danger" role="alert">
                <h4>Periksa Kembali Form</h4>
                </hr />
                <?php echo session()->getFlashdata('error'); ?>
            </div>
        <?php endif; ?>
        <div class="card-body">
            <h5 class="card-title text-center">Checkout</h5>
            <form action="<?= base_url('home/finish') ?>" method="POST" enctype="multipart/form-data">
                <select name="payment_method" id="method" class="form-control">
                    <option value="" selected disabled>Pilih Metode</option>
                    <option value="bca">BCA ( MANUAL )</option>
                    <option value="cod">COD / KETEMPAT</option>
                </select>
                <div id="bca">

                    <div class="mt-3">
                        <p>No Rek : 139939321</p>
                        <p>Atas Nama : Dadang Camp</p>
                        <p>Bank : BCA</p>
                        <!-- add total -->
                        <p>Total Bayar : <?= number_to_currency($cart->total(), 'IDR') ?> </p>
                    </div>
                    <!-- loop data -->
                    <input type="text" hidden name="stok" value="">
                    <?php $i = 1;
                    foreach ($keranjang as $value) { ?>
                        <input type="hidden" name="barang_id" value="<?= $value['id'] ?>">
                    <?php } ?>
                    <input type="text" hidden name="user_id" value="<?= session()->get('name') && session()->get('pengguna') == true ? session()->get('id') : '' ?>">
                    <input type="text" hidden name="total_harga" value="<?= $cart->total() ?>">
                    <input type="text" hidden name="jumlah" value="<?= $cart->totalItems(); ?>">

                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload Bukti Transfer</label>
                        <input class="form-control" name="pototf" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Upload KTP sebagai jaminan</label>
                        <input class="form-control" name="potoktp" type="file" id="formFile">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary btn-sm">Bayar</button>
                    </div>
            </form>

            <div id="cod">
                <div class="mb-3 mt-5">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.945758358928!2d107.51336141485824!3d-6.897091369411887!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e504c9ca3ebf%3A0x4b7953e650b2fc91!2sSMK%20TI%20Pembangunan%20Kampus%20III!5e0!3m2!1sid!2sid!4v1645261042141!5m2!1sid!2sid" width="900" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        // remove id bca while page is render
        document.getElementById('bca').style.display = 'none';
        document.getElementById('cod').style.display = 'none';
        // check if user select bca or cod
        document.getElementById('method').addEventListener('change', function() {
            if (this.value == 'bca') {
                document.getElementById('bca').style.display = 'block';
                document.getElementById('cod').style.display = 'none';
            } else if (this.value == 'cod') {
                document.getElementById('cod').style.display = 'block';
                document.getElementById('bca').style.display = 'none';
            }
        });
    </script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>