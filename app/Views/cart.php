<?= $this->extend('layout/Header')   ?>

<?= $this->section('content') ?>

<div class="container mt-5 " style="min-height: 100vh;">
    <?= form_open('home/update') ?>
    <h3>Keranjang anda</h3>
    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="alert alert-success mt-3">';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }

    ?>
    <div class="shopping-cart section w-100">
        <div class="container">
            <div class="cart-list-head">

                <div class="cart-list-title">
                    <div class="row">
                        <div class="col-lg-1 col-md-3 col-12">
                        </div>
                        <div class="col-lg-4 col-md-3 col-12">
                            <p>Product Name</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Quantity</p>
                        </div>
                        <div class="col-lg-2 col-md-2 col-12">
                            <p>Total</p>
                        </div>
                        <div class="col-lg-1 col-md-2 col-12">
                            <p>Remove </p>
                        </div>
                    </div>
                </div>
                <?php
                $i = 1;
                foreach ($cart->contents() as $value) { ?>
                    <div class="cart-single-list">
                        <div class="row align-items-center">
                            <div class="col-lg-1 col-md-1 col-12">
                                <img src="<?= base_url('/admin/assets/img/barang/' . $value['options']['gambar']) ?>" alt="#">
                            </div>
                            <div class="col-lg-4 col-md-3 col-12">
                                <h5 class="product-name">
                                    <?= $value['name'] ?></h5>
                                <p class="product-des">
                                    <span><em>Kategori:</em> <?= $value['options']['kategori'] ?></span>
                                </p>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <div class="count-input">
                                    <input type="number" value="<?= $value['qty'] ?>" name="qty<?= $i++ ?>" min="1" id="qty" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 col-12">
                                <p><?= number_to_currency($value['price'], 'IDR') ?></p>
                            </div>
                            <div class="col-lg-1 col-md-2 col-12">
                                <a class="remove-item btn btn-danger btn-sm" href="<?= base_url('home/delete/' . $value['rowid']) ?>"><i class="lni lni-close"></i></a>
                            </div>
                        </div>
                    </div>

                <?php } ?>
                <div class="row mt-5">
                    <div class="col-12">
                        <div class="total-amount">
                            <div class="row">
                                <div class="col-lg-8 col-md-6 col-12">

                                </div>
                                <div class="col-lg-4 col-md-6 col-12 mt-5 ">
                                    <div class="right">
                                        <ul class="mb-3 card p-2">
                                            <li>Cart Subtotal<span style="margin-left: 20px;"><?= number_to_currency($cart->total(), 'IDR') ?></span></li>
                                        </ul>
                                        <?php if (session()->get('logged_in') == true && session()->get('pengguna') == true) { ?>
                                            <div class="button">
                                                <a href="<?= base_url('home/checkout') ?>" class="btn w-100">Checkout</a>
                                            </div>
                                            <button type="submit" class="btn btn-success w-100 mt-2">Update</button>
                                            <a href="<?= base_url('home/clear') ?>" onclick="return confirm('apakah anda yakin ?')" class="btn btn-secondary mt-2 w-100">Hapus semua product</a>
                                        <?php  } else { ?>
                                            <div class="button">
                                                <a href="<?= base_url('/login') ?>" class="btn w-100">Login </a>
                                            </div>
                                        <?php } ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?= form_close() ?>
</div>



<?= $this->endSection('content') ?>