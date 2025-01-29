<?= $this->extend('frontend/index')?>
<?= $this->section('body') ?>

    <div class="main">
        <section class="hero-slider-section">
            <div class="owl-carousel owl-theme hero-slider-one custom-dot dot-right-center">
                <!-- looping disini -->
                <!-- <div class="item">
                    <div class=" hero-equal-height ptb-100" style="background: url('<?= base_url() ?>/assets_frontend/img/banner3.jpg')no-repeat center center / cover">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-9 col-lg-8">
                                    <?php if ($mobile == true): ?>
                                        <div class="header-content text-white text-left" style="margin-left: -10%;">
                                            <h1 class="text-white">Kini, Berinvestasi Jadi <br> Lebih Mudah Dan Nyaman</h1>
                                            <p class="lead">Bermitra dengan Mandiri Sekuritas dengan sistem trading <br> (MOST) yang mumpuni dan edukasi <font style="font-weight: bold;">gratis setiap hari.</font> <br> Menjadi <font style="font-weight: bold;">Investor Cerdas & Mandiri</font> bukan lagi mimpi. </p>
                                            <div class="action-btns mt-3">
                                                <a href="<?= base_url('register/oa') ?>" class="btn solid-white-btn mr-3" style="font-weight: bold; color:#000; background-image: linear-gradient(to right, #ECAB49 , #FFDF4F);  border: none;">Investasi Sekarang!</a>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="header-content text-white">
                                            <h1 class="text-white">Kini, Berinvestasi Jadi <br> Lebih Mudah Dan Nyaman</h1>
                                            <p class="lead">Bermitra dengan Mandiri Sekuritas dengan sistem trading <br> (MOST) yang mumpuni dan edukasi <font style="font-weight: bold;">gratis setiap hari.</font> <br> Menjadi <font style="font-weight: bold;">Investor Cerdas & Mandiri</font> bukan lagi mimpi. </p>
                                            <div class="action-btns mt-3">
                                                <a href="<?= base_url('register/oa') ?>" class="btn solid-white-btn mr-3" style="font-weight: bold; color:#000; background-image: linear-gradient(to right, #ECAB49 , #FFDF4F);  border: none;">Investasi Sekarang!</a>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <?php foreach ($daftarGambar as $gambar) : ?>
                    <div class="item">
                        <div class=" hero-equal-height ptb-100" style="background: url('<?= $gambar->src_headers_image ?>')no-repeat center center / cover">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-9 col-lg-8">
                                        <?php if ($mobile == true): ?>
                                            <div class="header-content text-white text-left" style="margin-left: -10%;">
                                        <?php else: ?>
                                            <div class="header-content text-white">
                                        <?php endif; ?>
                                            <h1 class="text-white"><?= $gambar->title ?></h1>
                                            <p class="lead"><?= $gambar->subtitle ?></p>

                                            <?php if ($gambar->use_button == 1) : ?>
                                                <div class="action-btns mt-3">
                                                    <a href="<?= $gambar->link ?>" class="btn solid-white-btn mr-3" style="font-weight: bold; color:#000; background-image: linear-gradient(to right, #ECAB49 , #FFDF4F);  border: none;">
                                                        <?= $gambar->text_button ?>
                                                    </a>
                                                </div>
                                            <?php else : ?>
                                                
                                            <?php endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                
            </div>
        </section>

        <section style="margin-top: 7%; margin-bottom: 7%;"></section>

        <?php if ($mobile == true): ?>
            <section class="call-to-action ptb-100 " style="background-color: #FBDC8E;">
        <?php else: ?>
            <section class="call-to-action ptb-50" style="background-color: #FBDC8E;">
        <?php endif; ?>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-3 col-12 order-lg-first align-self-center">
                        <div class="image-box fadein text-xl-center">
                            <img src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="250" alt="wp-hosting" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-9 col-12 order-xl-last" style="background-color: #FBDC8E; padding-top:50px; padding-bottom:50px;">
                        <h2 style="color: #000;">PanenSAHAM Sekuritas Indonesia</h2>
                        <p style="font-size:14px; color: #000;">Merupakan Perusahaan Efek Non Anggota Bursa yang bekerjasama dengan Mandiri Sekuritas. Kami berdiri <br> sejak 20 April 2015 dan sudah memiliki Izin OJK. <br><br> Kami akan membantu anda untuk melakukan pembukaan rekening efek maupun memberikan anda edukasi <br> seputar dunia pasar modal.</p>
                        <div class="action-btns mt-4">
                            <a href="<?= base_url('tentangkami') ?>" class="btn primary-solid-btn mr-2" style="background-color: #492E1F; color:#fff; border:none; font-weight:bold">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pricing-section ptb-100">
            <div class="container">
                    <?php if ($mobile == true): ?>
                        <div class="row justify-content-center">
                    <?php else: ?>
                        <div class="row justify-content-center" style="margin-bottom:4%;">
                    <?php endif; ?>
                    <div class="col-md-9 col-lg-8">
                        <div class="section-heading text-center mb-5">
                            <h3>Apa yang anda butuhkan?</h3>
                            <p class="lead" style="color: #000;">
                                Melayani kebutuhan Anda dalam bertransaksi di dunia Pasar Modal
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php if ($mobile == true): ?>
                        <div class="col-lg-6 col-md-6 col-12 text-center">
                            <a href="<?= base_url('register/oa') ?>">
                                <img src="<?= base_url() ?>/assets_frontend/img/efek2.png" width="300" alt="wp-hosting" style="margin-top:-8%; margin-bottom:3%;">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-center">
                            <a href="<?= base_url('edukasi') ?>">
                                <img src="<?= base_url() ?>/assets_frontend/img/edukasi2.png" width="300" alt="wp-hosting" style="">
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-6 col-md-6 col-12 text-right">
                            <a href="<?= base_url('register/oa') ?>">
                                <img src="<?= base_url() ?>/assets_frontend/img/efek.png" width="370" alt="wp-hosting" style="margin-top: -78px; ">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-left">
                            <a href="<?= base_url('edukasi') ?>">
                                <img src="<?= base_url() ?>/assets_frontend/img/edukasi.png" width="370" alt="wp-hosting">
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <?php if ($mobile == true): ?>
            <section class="call-to-action ptb-30 " style="background-color:#492E1F;">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-12 order-xl-last text-center">
                            <div style="margin-bottom: 15%;"></div>
                            <img src="<?= base_url() ?>/assets_frontend/img/radiopanensaham.svg" class="mb-5" width="200" alt="wp-hosting">
                            <audio controls>
                                <source src="https://stream-ssl.arenastreaming.com:8024/stream" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                            <div style="margin-bottom: 10%;"></div>
                            <h3 style="color: #fff;">Yuk Trading rame-rame <br> di <font style="color: #FFDF4F;">Radio PanenSAHAM</font>!</h3>
                            <p style="font-size:14px; color: #FFDF4F; margin-bottom:10%;">karena <font style="font-weight: bold;">#kamugasendirian</font></p>
                            <img src="<?= base_url() ?>/assets_frontend/img/jadwalradio.svg" alt="wp-hosting" style="width: 400px; margin-left:-200px;">
                            <p style="font-size:14px; color: #000; font-weight:bold; margin-top:-35px;  margin-bottom:30px;">Jadwal Radio:</p>
                            <p style="font-size:14px; color: #fff; font-weight:bold; margin-bottom:40px;">Senin - Jum'at, <br>06.00 s/d 20.00 WIB</p>
                            <img src="<?= base_url() ?>/assets_frontend/img/linkzoom.svg" alt="wp-hosting" style="width: 400px; margin-left:-50px;">
                            <p style="font-size:14px; color: #000; font-weight:bold; margin-top:-33px;  margin-bottom:30px;">Link ZOOM Meeting</p>
                            <p style="font-size:14px; color: #fff; font-weight:bold; margin-bottom:10px;">ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 345 123 8888 <br> Password : panensaham</p>
                        </div>
                    </div>
                </div>
            </section>
        <?php else: ?>
            <section class="call-to-action ptb-50" style="background: url('<?= base_url() ?>/assets_frontend/img/bgcoklat2.png')no-repeat center center / cover">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-3 col-12 order-xl-last">
                            <div style="margin-bottom: 78%;"></div>
                            <audio controls>
                                <source src="https://stream-ssl.arenastreaming.com:8024/stream" type="audio/mp3">
                                Your browser does not support the audio element.
                            </audio>
                        </div>
                        <div class="col-xl-8 col-lg-9 col-12 order-xl-first" style="padding-top:50px; padding-bottom:50px;">
                            <img src="<?= base_url() ?>/assets_frontend/img/radiopanensaham.svg" class="mb-4" width="200" alt="wp-hosting">
                            <h2 style="color: #fff;">Yuk Trading rame-rame <br> di <font style="color: #FFDF4F;">Radio PanenSAHAM</font>!</h2>
                            <p style="font-size:14px; color: #FFDF4F;">karena <font style="font-weight: bold;">#kamugasendirian</font></p>
                            <img src="<?= base_url() ?>/assets_frontend/img/jadwalradio.svg" alt="wp-hosting" style="width: 400px; margin-left:-200px;">
                            <p style="font-size:14px; color: #000; font-weight:bold; margin-top:-35px;  margin-bottom:30px;">Jadwal Radio:</p>
                            <p style="font-size:14px; color: #fff; font-weight:bold; margin-bottom:40px;">Senin - Jum'at, <br>06.00 s/d 20.00 WIB</p>
                            <img src="<?= base_url() ?>/assets_frontend/img/linkzoom.svg" alt="wp-hosting" style="width: 400px; margin-left:-50px;">
                            <p style="font-size:14px; color: #000; font-weight:bold; margin-top:-33px;  margin-bottom:30px;">Link ZOOM Meeting</p>
                            <p style="font-size:14px; color: #fff; font-weight:bold; margin-bottom:10px;">ID &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : 345 123 8888 <br> Password : panensaham</p>

                        </div>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <section class="pricing-section ptb-100">
            <div class="container">
                <div class="row">
                    <?php if ($mobile == true): ?>
                        <div class="col-lg-6 col-md-6 col-12 text-center">
                            <a href="">
                                <img src="<?= base_url() ?>/assets_frontend/img/efek2.png" width="300" alt="wp-hosting" style="margin-top:-8%; margin-bottom:3%;">
                            </a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12 text-center">
                            <a href="">
                                <img src="<?= base_url() ?>/assets_frontend/img/edukasi2.png" width="300" alt="wp-hosting" style="">
                            </a>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h4 class="text-center">Pengumuman &nbsp; <img src="<?= base_url() ?>/assets_frontend/img/toa.png" width="60" style="margin-top: -3%;"></h4>
                            <!-- looping disini -->
                            <div class="card text-left single-pricing-pack mt-4">
                                <div class="p-4">
                                    <h6 class="mb-3">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">2022-03-21 &nbsp;&nbsp;&nbsp; 10:44</p>
                                    <p class="mb-0" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Read More</font>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; margin-right:45%; font-weight:bold;">Download</font>
                                        </a>
                                        <img style="width: 70px; margin-top:-10px" alt="image" src="https://monika.panensaham.com/public/assets/img/hot.svg">
                                    </p>
                                </div>
                            </div>
                            <div class="card text-left single-pricing-pack mt-4">
                                <div class="p-4">
                                    <h6 class="mb-3">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">2022-03-21 &nbsp;&nbsp;&nbsp; 10:44</p>
                                    <p class="mb-0" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Read More</font>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; margin-right:45%; font-weight:bold;">Download</font>
                                        </a>
                                        <img style="width: 70px; margin-top:-10px" alt="image" src="https://monika.panensaham.com/public/assets/img/hot.svg">
                                    </p>
                                </div>
                            </div>
                            <div class="card text-left single-pricing-pack mt-4">
                                <div class="p-4">
                                    <h6 class="mb-3">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">2022-03-21 &nbsp;&nbsp;&nbsp; 10:44</p>
                                    <p class="mb-0" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Read More</font>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; margin-right:45%; font-weight:bold;">Download</font>
                                        </a>
                                        <img style="width: 70px; margin-top:-10px" alt="image" src="https://monika.panensaham.com/public/assets/img/hot.svg">
                                    </p>
                                </div>
                            </div>
                            <br>
                            <a href="" class="tebel" style="color: #000; text-align:right;"><p class="text-right">Selengkapnya</p></a>
                        </div>
                        <div class="col-lg-6 col-md-6 col-12">
                            <h4 class="text-center">Riset &nbsp; <img src="<?= base_url() ?>/assets_frontend/img/microscope.png" width="50" style="margin-top: -4%;"></h4>
                            <!-- looping disini -->
                            <div class="card text-left single-pricing-pack mt-4">
                                <div class="p-4">
                                    <h6 class="mb-3">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">2022-03-21 &nbsp;&nbsp;&nbsp; 10:44</p>
                                    <p class="mb-0" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Read More</font>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; margin-right:45%; font-weight:bold;">Download</font>
                                        </a>
                                        <img style="width: 70px; margin-top:-10px" alt="image" src="https://monika.panensaham.com/public/assets/img/hot.svg">
                                    </p>
                                </div>
                            </div>
                            <div class="card text-left single-pricing-pack mt-4">
                                <div class="p-4">
                                    <h6 class="mb-3">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">2022-03-21 &nbsp;&nbsp;&nbsp; 10:44</p>
                                    <p class="mb-0" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Read More</font>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; margin-right:45%; font-weight:bold;">Download</font>
                                        </a>
                                        <img style="width: 70px; margin-top:-10px" alt="image" src="https://monika.panensaham.com/public/assets/img/hot.svg">
                                    </p>
                                </div>
                            </div>
                            <div class="card text-left single-pricing-pack mt-4">
                                <div class="p-4">
                                    <h6 class="mb-3">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">2022-03-21 &nbsp;&nbsp;&nbsp; 10:44</p>
                                    <p class="mb-0" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Read More</font>
                                        </a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; margin-right:45%; font-weight:bold;">Download</font>
                                        </a>
                                        <img style="width: 70px; margin-top:-10px" alt="image" src="https://monika.panensaham.com/public/assets/img/hot.svg">
                                    </p>
                                </div>
                            </div>
                            <br>
                            <a href="" class="tebel" style="color: #000; text-align:right;"><p class="text-right">Selengkapnya</p></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="call-to-action ptb-100" style="background: url('<?= base_url() ?>/assets_frontend/img/bgdownloadmost.svg')no-repeat center center / cover fixed">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-9 col-lg-8">
                        <div class="call-to-action-content text-white text-center">
                            <h2 class="text-white">Download &nbsp; <img src="<?= base_url() ?>/assets_frontend/img/logomost1.png" width="100"></h2>
                            <p style="margin-bottom: 10%;">Untuk Pengalaman Berinvestasi yang Lebih Mudah</p>
                            <h4 class="text-white">Mobile App &nbsp;&nbsp; | &nbsp;&nbsp; Windows</h4>
                            <div class="container mt-4">
                                <div class="row">
                                    <div class="col text-right mr-5">
                                        <img src="<?= base_url() ?>/assets_frontend/img/logomost3.png" width="80" class="mt-1">
                                    </div>
                                    <div class="col text-left mr-3">
                                        <a target="_blank" href="https://play.google.com/store/apps/details?id=com.mandirisekuritas.most&hl=en&gl=US"><img src="<?= base_url() ?>/assets_frontend/img/googleplay.svg" width="130" class="mb-2"></a>
                                        <br>
                                        <a target="_blank" href="https://apps.apple.com/id/app/most-mobile-mandiri-sekuritas/id1104878671"><img src="<?= base_url() ?>/assets_frontend/img/appstore.svg" width="130"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?= $this->endSection(); ?>