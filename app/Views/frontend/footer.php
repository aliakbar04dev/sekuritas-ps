<?php
    use CodeIgniter\HTTP\UserAgent;
    $this->request = \Config\Services::request();
    $agent = $this->request->getUserAgent();
    $mobile = $agent->isMobile();
?>

    <?php if ($mobile == true): ?>
        <!--footer section start-->
        <footer class="footer-section text-center" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">

            <!--footer top start-->
            <div class="footer-top" style="background-color: #fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row footer-top-wrap">
                                <div class="col-12">
                                    <div class="footer-nav-wrap text-white text-center">
                                        <h4 class="text-white"><img src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="200" alt="security" class="img-fluid" /></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <?= form_open(base_url('save_subscriber'), ['id' => 'subscriber-form']) ?>
                            <div class="row ">
                                <div class="col-md-12 d-flex my-auto">
                                    <input type="email" class="form-control mr-3" name="email" placeholder="Masukan alamat email anda" style="font-size:13px; padding-top:10px; padding-bottom:10px;" required>
                                    <button type="submit" onclick="event.preventDefault();$(this).submitAjax('#subscriber-form', event)" class="btn btn-warning" style="background-color:#FFDF4F; border:none; font-size:13px; font-weight: bold; color:#000; padding-top:9px; padding-bottom:9px; padding-right:20px; padding-left:20px;">SUBSCRIBE</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-4">
                    <div class="row">
                        <div class="col-md-3 mt-4">
                            <div class="row footer-top-wrap">
                                <div class="col-12">
                                    <div class="footer-nav-wrap text-white">
                                        <h4 style="font-weight: bold; color:#D19200;">ALAMAT</h4>
                                        <p style="color:#000; font-size:13px;">
                                        PANENSAHAM SEKURITAS INDONESIA <br>
                                        Gading Bukit Indah Blok A No 21. <br>
                                        Kelapa Gading, Jakarta Utara 14240
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 mt-4">
                            <div class="row footer-top-wrap">
                                <div class="col-md-3 col-sm-6">
                                    <div class="footer-nav-wrap text-white">
                                        <h4 style="font-weight: bold; color:#D19200;">TAUTAN PENTING</h4>
                                        <ul class="nav flex-column text-black">
                                            <li class="nav-item">
                                                <a class="nav-link " href="#" style="color: #000;">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" style="color: #000;">About Us</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" style="color: #000;">Product & Service</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" style="color: #000;">News & Event</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mt-4">
                                    <img src="<?= base_url() ?>/assets_frontend/img/textojkyuk.png" width="250">   
                                </div>
                                <div class="col-md-5 col-sm-6 mt-4">
                                    <div class="footer-nav-wrap text-white">
                                        <h4 style="font-weight: bold; color:#000;">Dapatkan aplikasi kami di:</h4>
                                        <a href="#" style="color: #000;"><img src="<?= base_url() ?>/assets_frontend/img/googleplay.svg" width="130"></a>
                                        <a href="#" style="color: #000;"><img src="<?= base_url() ?>/assets_frontend/img/appstore.svg" width="130"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer top end-->

            <!--footer copyright start-->
            <div class="footer-bottom gray-light-bg py-3">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-7 col-lg-6">
                            <div class="payment-method text-center">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <p class="copyright-text pb-0 mb-3" style="color: #000000;">© 2022 PT PanenSAHAM Sekuritas Indonesia. <br> All Rights Reserved. Follow Our Social Media:</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/ig_ungu.svg" alt="visa" width="30" /></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/youtube_merah.svg" alt="mastercard" width="30" /></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/fb_biru.svg" alt="paypal" width="30" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer copyright end-->
        </footer>
        <!--footer section end-->
    <?php else: ?>
        <!--footer section start-->
        <footer class="footer-section" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
            <!--footer top start-->
            <div class="footer-top" style="background-color: #fff;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row footer-top-wrap">
                                <div class="col-12">
                                    <div class="footer-nav-wrap text-white">
                                        <h4 class="text-white"><img src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="200" alt="security" class="img-fluid" /></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <?= form_open(base_url('save_subscriber'), ['id' => 'subscriber-form']) ?>
                            <div class="row ">
                                <div class="col-md-9 d-flex my-auto">
                                    <input type="email" class="form-control mr-3" name="email" placeholder="Masukan alamat email anda untuk berlangganan berita dari kami" style="font-size:13px; padding-top:10px; padding-bottom:10px;" required>
                                    <button onclick="event.preventDefault();$(this).submitAjax('#subscriber-form', event)" type="submit" class="btn btn-warning" style="background-color:#FFDF4F; border:none; font-size:13px; font-weight: bold; color:#000; padding-top:9px; padding-bottom:9px; padding-right:20px; padding-left:20px;">SUBSCRIBE</button>
                                </div>
                            </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-3">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="row footer-top-wrap">
                                <div class="col-12">
                                    <div class="footer-nav-wrap text-white">
                                        <h4 style="font-weight: bold; color:#D19200;">ALAMAT</h4>
                                        <p style="color:#000; font-size:13px;">
                                        PANENSAHAM SEKURITAS INDONESIA <br>
                                        Gading Bukit Indah Blok A No 21. <br>
                                        Kelapa Gading, Jakarta Utara 14240
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="row footer-top-wrap">
                                <div class="col-md-3 col-sm-6">
                                    <div class="footer-nav-wrap text-white">
                                        <h4 style="font-weight: bold; color:#D19200;">TAUTAN PENTING</h4>
                                        <ul class="nav flex-column text-black">
                                            <li class="nav-item">
                                                <a class="nav-link " href="#" style="color: #000;">Home</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" style="color: #000;">About Us</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" style="color: #000;">Product & Service</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#" style="color: #000;">News & Event</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-5 col-sm-6">
                                    <div class="footer-nav-wrap text-white">
                                        <h4 style="font-weight: bold; color:#000;">Dapatkan aplikasi kami di:</h4>
                                        <a href="https://play.google.com/store/apps/details?id=com.mandirisekuritas.most&hl=en&gl=US" target="_blank" style="color: #000;"><img src="<?= base_url() ?>/assets_frontend/img/googleplay.svg" width="130"></a>
                                        <a href="https://apps.apple.com/id/app/most-mobile-mandiri-sekuritas/id1104878671" target="_blank" style="color: #000;"><img src="<?= base_url() ?>/assets_frontend/img/appstore.svg" width="130"></a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6" style="margin-top: -15px;">
                                    <img src="<?= base_url() ?>/assets_frontend/img/textojkyuk.png" width="300">   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer top end-->

            <!--footer copyright start-->
            <div class="footer-bottom gray-light-bg py-3" style="box-shadow: rgba(0, 0, 0, 0.02) 0px 1px 3px 0px, rgba(27, 31, 35, 0.15) 0px 0px 0px 1px;">
                <div class="container">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-md-5 col-lg-5">
                            <p class="copyright-text pb-0 mb-0" style="color: #000000;">© 2022 PT PanenSAHAM Sekuritas Indonesia. All Rights Reserved.
                            </p>
                        </div>
                        <div class="col-md-7 col-lg-6">
                            <div class="payment-method text-right">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <p class="copyright-text pb-0 mb-0" style="color: #000000;">Follow Our Social Media:</p>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/ig_ungu.svg" alt="visa" width="30" /></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/youtube_merah.svg" alt="mastercard" width="30" /></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/fb_biru.svg" alt="paypal" width="30" /></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--footer copyright end-->
        </footer>
        <!--footer section end-->
    <?php endif; ?> 

<!--bottom to top button start-->
<button class="scroll-top scroll-to-target" data-target="html">
    <span class="ti-rocket"></span>
</button>
<!--bottom to top button end-->