<?php
    use CodeIgniter\HTTP\UserAgent;
    $this->request = \Config\Services::request();
    $agent = $this->request->getUserAgent();
    $mobile = $agent->isMobile();
?>

<!--header section start-->
<header id="header" class="header-main">

    <?php if ($mobile == true): ?>

    <?php else: ?>
    <!-- <div id="header-top-bar" class="white-light-bg">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-7 col-lg-7"></div>
                <div class="col-md-4 col-lg-4">
                    <div class="topbar-text">
                        <ul class="list-inline text-right" style="margin-bottom: -90px;">
                            <li class="list-inline-item"><a href="#"
                                    style="font-size: 12px; color:#000; font-weight:bold;">Eng</a></li>
                            <li class="list-inline-item"><a style="font-size: 12px;">|</a></li>
                            <li class="list-inline-item"><a href="#"
                                    style="font-size: 12px; color:#145DA0; font-weight:bold;">Bahasa</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <?php endif; ?>

    <!--main header menu start-->
    <div id="logoAndNav" class="main-header-menu-wrap white-bg border-bottom" style="box-shadow: rgba(0, 0, 0, 0.04) 0px 3px 5px;">
        <div class="container">
            <nav class="js-mega-menu navbar navbar-expand-md header-nav">

                <!--logo start-->
                <?php if ($mobile == true): ?>
                <a class="navbar-brand" href="<?= base_url() ?>" style=""><img
                        src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="190" alt="logo"
                        class="img-fluid" /></a>
                <?php else: ?>
                <a class="navbar-brand" href="<?= base_url() ?>" style="margin-top: -10px;"><img
                        src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="210" alt="logo"
                        class="img-fluid" /></a>
                <?php endif; ?>
                <!--logo end-->

                <!--responsive toggle button start-->
                <button type="button" class="navbar-toggler btn" aria-expanded="false" aria-controls="navBar"
                    data-toggle="collapse" data-target="#navBar">
                    <span id="hamburgerTrigger">
                        <span class="fas fa-bars"></span>
                    </span>
                </button>
                <!--responsive toggle button end-->

                <!--main menu start-->
                <div id="navBar" class="collapse navbar-collapse mt-1 mb-1">
                    <ul class="navbar-nav ml-auto main-navbar-nav">
                        <?php if ($mobile == true): ?>
                            <li class="nav-item custom-nav-item">
                                <a href="<?= base_url('tentangkami') ?>" class="nav-link custom-nav-link" style="<?= $title == 'Tentang Kami' ? 'color: #D19200;' : 'color: #000;' ?> font-weight:bold; font-size:18px;">Tentang Kami</a>
                            </li>

                            <li class="nav-item custom-nav-item">
                                <a href="#" class="nav-link custom-nav-link"
                                    style="color: #000; font-weight:bold; font-size:18px;">Produk & Layanan</a>
                            </li>

                            <li class="nav-item hs-has-mega-menu custom-nav-item" data-max-width="250px" data-position="right">
                                <a id="aboutMegaMenu" class="nav-link custom-nav-link main-link-toggle" href="JavaScript:Void(0);" aria-haspopup="true" aria-expanded="false" style="<?php if($title == 'Artikel' || $title == 'Detail Artikel' || $title == 'Edukasi' || $title == 'Detail Edukasi' || $title == 'Cari Edukasi' || $title == 'Berita' || $title == 'Detail Berita') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold; font-size:18px;">Berita & Acara</a>

                                <div class="hs-mega-menu main-sub-menu" aria-labelledby="aboutMegaMenu" style="min-width: 330px;">
                                    <div class="title-with-icon-item">
                                        <a class="title-with-icon-link" href="<?= base_url('edukasi') ?>" style="<?php if($title == 'Edukasi' || $title == 'Cari Edukasi' || $title == 'Detail Edukasi') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold;">
                                            <div class="media align-items-center">
                                                <!-- <img class="menu-titile-icon" src="assets/img/chat-mobile.svg" alt="SVG"> -->
                                                <div class="media-body">
                                                    <span class="u-header__promo-title" style="font-size:14px;">Edukasi</span>
                                                    <small class="u-header__promo-text" style="font-size:14px;">Jadwal Acara Edukasi oleh Tim Edukasi PanenSAHAM
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="title-with-icon-item">
                                        <a class="title-with-icon-link" href="<?= base_url('berita') ?>" style="<?php if($title == 'Berita' || $title == 'Detail Berita') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold;">
                                            <div class="media align-items-center">
                                                <!-- <img class="menu-titile-icon" src="assets/img/chat-mobile.svg" alt="SVG"> -->
                                                <div class="media-body">
                                                    <span class="u-header__promo-title" style="font-size:14px;">Berita</span>
                                                    <small class="u-header__promo-text" style="font-size:14px;">Informasi terkini seputar pasar modal
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="title-with-icon-item">
                                        <a class="title-with-icon-link" href="<?= base_url('artikel') ?>" style="<?php if($title == 'Artikel' || $title == 'Detail Artikel') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold;">
                                            <div class="media align-items-center">
                                                <!-- <img class="menu-titile-icon" src="assets/img/chat-mobile.svg" alt="SVG"> -->
                                                <div class="media-body">
                                                    <span class="u-header__promo-title" style="font-size:14px;">Artikel</span>
                                                    <small class="u-header__promo-text" style="font-size:14px;">Artikel seputar pasar modal spesial dari Tim PanenSAHAM
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>


                            <li class="nav-item custom-nav-item">
                                <a href="<?= base_url('hubungikami') ?>" class="nav-link custom-nav-link" style="<?= $title == 'Hubungi Kami' ? 'color: #D19200;' : 'color: #000;' ?> font-weight:bold; font-size:18px;">Hubungi Kami</a>
                            </li>

                            <!--button start-->
                            <li class="nav-item header-nav-last-item d-flex align-items-center">
                                <a href="<?= base_url('register/oa') ?>" class="btn btn-warning mt-3"
                                    style="background-color: #FFDF4F; border-color:#FFDF4F; color: #000; font-weight:bold; font-size:16px; padding-top:8px; padding-bottom:8px;">
                                    Buka Akun
                                </a>
                            </li>
                            <!--button end-->
                        <?php else: ?>
                            <li class="nav-item custom-nav-item">
                                <a href="<?= base_url('tentangkami') ?>" class="nav-link custom-nav-link" style="<?= $title == 'Tentang Kami' ? 'color: #D19200;' : 'color: #000;' ?> font-weight:bold;">Tentang Kami</a>
                            </li>

                            <li class="nav-item custom-nav-item">
                                <a href="#" class="nav-link custom-nav-link"
                                    style="color: #000; font-weight:bold;">Produk & Layanan</a>
                            </li>

                            <li class="nav-item hs-has-mega-menu custom-nav-item" data-max-width="250px" data-position="right">
                                <a id="aboutMegaMenu" class="nav-link custom-nav-link main-link-toggle" href="JavaScript:Void(0);" aria-haspopup="true" aria-expanded="false" style="<?php if($title == 'Artikel' || $title == 'Detail Artikel' || $title == 'Edukasi' || $title == 'Detail Edukasi' || $title == 'Cari Edukasi' || $title == 'Berita' || $title == 'Detail Berita') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold;">Berita & Acara</a>

                                <div class="hs-mega-menu main-sub-menu" aria-labelledby="aboutMegaMenu" style="min-width: 330px;">
                                    <div class="title-with-icon-item">
                                        <a class="title-with-icon-link" href="<?= base_url('edukasi') ?>" style="<?php if($title == 'Edukasi' || $title == 'Cari Edukasi' || $title == 'Detail Edukasi') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold;">
                                            <div class="media align-items-center">
                                                <!-- <img class="menu-titile-icon" src="assets/img/chat-mobile.svg" alt="SVG"> -->
                                                <div class="media-body">
                                                    <span class="u-header__promo-title">Edukasi</span>
                                                    <small class="u-header__promo-text">Jadwal Acara Edukasi oleh Tim Edukasi PanenSAHAM
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="title-with-icon-item">
                                        <a class="title-with-icon-link" href="<?= base_url('berita') ?>" style="<?php if($title == 'Berita' || $title == 'Detail Berita') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold;">
                                            <div class="media align-items-center">
                                                <!-- <img class="menu-titile-icon" src="assets/img/chat-mobile.svg" alt="SVG"> -->
                                                <div class="media-body">
                                                    <span class="u-header__promo-title">Berita</span>
                                                    <small class="u-header__promo-text">Informasi terkini seputar pasar modal
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                    <div class="title-with-icon-item">
                                        <a class="title-with-icon-link" href="<?= base_url('artikel') ?>" style="<?php if($title == 'Artikel' || $title == 'Detail Artikel') { echo 'color: #D19200;'; }else{ echo 'color: #000;';} ?> font-weight:bold;">
                                            <div class="media align-items-center">
                                                <!-- <img class="menu-titile-icon" src="assets/img/chat-mobile.svg" alt="SVG"> -->
                                                <div class="media-body">
                                                    <span class="u-header__promo-title">Artikel</span>
                                                    <small class="u-header__promo-text">Artikel seputar pasar modal spesial dari Tim PanenSAHAM
                                                    </small>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item custom-nav-item">
                                <a href="<?= base_url('hubungikami') ?>" class="nav-link custom-nav-link" style="<?= $title == 'Hubungi Kami' ? 'color: #D19200;' : 'color: #000;' ?> font-weight:bold;">Hubungi Kami</a>
                            </li>

                            <!--button start-->
                            <li class="nav-item header-nav-last-item d-flex align-items-center">
                                <a href="<?= base_url('register/oa') ?>" class="btn btn-warning"
                                    style="font-size:12px; background-color: #FFDF4F; border-color:#FFDF4F; color: #000; font-weight:bold;">
                                    Buka Akun
                                </a>
                            </li>
                            <!--button end-->
                        <?php endif; ?>
                    </ul>
                </div>
                <!--main menu end-->
            </nav>
        </div>
    </div>
    <!--main header menu end-->
    
</header>
<!--header section end-->