<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Dadang Camp</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.svg" />

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/LineIcons.3.0.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/tiny-slider.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/glightbox.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>" />
</head>

<body>

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                <?= session()->get('logged_in') == TRUE && session()->get('pengguna') == TRUE ? session()->get('name') : '' ?>
                            </div>
                            <ul class="user-login">
                                <?php if (session()->get('logged_in') == true && session()->get('pengguna') == true) {
                                    echo '<li><a href="' . base_url() . '/logout/user">Logout</a></li>';
                                    echo '<li><a href="' . base_url('/dashboard/index') . '">Dashboard</a></li>';
                                } else {
                                    echo '<li><a href="' . base_url('/login') . '">Sign In</a></li>';
                                    echo '<li><a href="' . base_url('/register') . '">Register</a></li>';
                                }    ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="<?= base_url('/')  ?>">
                            <p>Camera Bandung</p>
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">
                        <!-- Start Main Menu Search -->
                        <div class="main-menu-search">
                            <!-- navbar search start -->
                            <form action="<?= base_url('home/findBarang') ?>" method="get">
                                <div class="navbar-search search-style-5">
                                    <div class="search-input">
                                        <input placeholder="Kata kunci Barang atau Kategori" name="search" class="form-control" id="search">
                                    </div>
                                    <div class="search-btn">
                                        <button type="submit"><i class="lni lni-search-alt"></i></button>
                                    </div>
                                </div>
                            </form>
                            <!-- navbar search Ends -->
                        </div>
                        <!-- End Main Menu Search -->
                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                <i class="lni lni-phone"></i>
                                <h3>Hotline:
                                    <span>(+62) 81232323</span>
                                </h3>
                            </div>
                            <div class="navbar-cart">
                                <?php $keranjang = $cart->contents();
                                $jumlahItem = 0;

                                foreach ($keranjang as $value) {
                                    $jumlahItem = $jumlahItem + $value['qty'];
                                }

                                ?>
                                <div class="cart-items">
                                    <a href="javascript:void(0)" class="main-btn">
                                        <i class="lni lni-cart"></i>
                                        <span class="total-items"><?= $jumlahItem ?></span>
                                    </a>
                                    <!-- Shopping Item -->
                                    <div class="shopping-item">
                                        <div class="dropdown-cart-header">
                                            <span><?= $jumlahItem ?> Items</span>
                                            <a href="<?= base_url('home/cart')  ?>">View Cart</a>
                                        </div>
                                        <ul class="shopping-list">
                                            <?php if (empty($keranjang)) { ?>
                                                <li>Keranjang Belanja masih kosong</li>
                                            <?php } else { ?>
                                                <?php foreach ($keranjang as $value) { ?>
                                                    <li>
                                                        <a href="javascript:void(0)" class="remove" title="Remove this item"><i class="lni lni-close"></i></a>
                                                        <div class="cart-img-head">
                                                            <a class="cart-img" href="product-details.html"><img src="<?= base_url() . "/admin/assets/img/barang/" . $value['options']['gambar']; ?>" alt="#"></a>
                                                        </div>

                                                        <div class="content">
                                                            <h4><a href="product-details.html">
                                                                    <?= $value['name'] ?></a></h4>
                                                            <p class="quantity"><?= $value['qty'] . ' - ' ?> <span class="amount"><?= number_format($value['price'], 2) ?></span></p>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                                <div class="bottom">
                                                    <div class="total">
                                                        <span>Total</span>
                                                        <span class="total-amount"><?= number_format($value['subtotal'], 2, ',', ',') ?></span>
                                                    </div>
                                                </div>
                                            <?php   } ?>
                                        </ul>

                                    </div>
                                    <!--/ End Shopping Item -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
    </header>
    <!-- End Header Area -->

    <?= $this->renderSection('content')  ?>





    <!-- Call the footer -->

    <?= $this->include('Layout/Footer')   ?>