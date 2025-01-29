<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
    <?php if ($mobile == true): ?>
        <section>
            <div class="jumbotron bg-title-hubungikami" style="margin-bottom: 0 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="tebel kiri">Hubungi Kami</h2>       
                        </div>
                        <div class="col-md-6">
                            <?= form_open() ?>
                                <div class="row">
                                    <div class="col-md-10 d-flex my-auto">
                                        <input type="text" placeholder="cari sesuatu disini ..." class="form-control" style="font-size:13px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                                        <button class="btn btn-warning" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="call-to-action" style="background: url('<?= base_url() ?>/assets_frontend/img/bgburam.svg')no-repeat center center / cover fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-1 mb-1">
                        <h3 style="margin-top: 12%" class="text-warning">Kantor Pusat</h3>
                        <p class="text-white">
                            PANENSAHAM SEKURITAS INDONESIA <br>
                            Gading Bukit Indah Blok A No 21. <br>
                            Kelapa Gading, Jakarta Utara. 14240.
                        </p>
                        <p class="mt-3 mb-0 text-white"><img src="<?= base_url() ?>/assets_frontend/img/telponhk.svg" alt="" width="20"> 021 45877522 <br></p>
                        <p class="mb-0 text-white" style="margin-top: 0 !Important"><img src="<?= base_url() ?>/assets_frontend/img/chathk.svg" alt="" width="20"> 0821 12898149</p>
                        <p class="mb-0 text-white" style="margin-top: 0 !Important"><img src="<?= base_url() ?>/assets_frontend/img/smshk.svg" alt="" width="20"> care_center@panensaham.com</p>
                    </div>
                    <div class="col-md-6 mt-5 mb-5 tengah">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.40655012187!2d106.898343!3d-6.150618!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf10d3a3df71e1ffd!2sPanen%20Saham!5e0!3m2!1sen!2sid!4v1655540745195!5m2!1sen!2sid" width="320" height="350" style="border:0; border-radius:10px;" allowfullscreen="" loading="eager"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="ptb-50 white-light-bg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading text-center">
                            <h2>Cabang Kami</h2>
                            <hr style="border: 1px solid black; margin-top:-3px;">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/balikpapan.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="tebel mt-3">Balikpapan</h4>
                        <p style="color:black; font-size:13px;">
                        Ruku Sentra Eropa Blok AA. No.8 <br>
                        Kel. Gunung Samarinda, Kec. Balikpapan Utara, <br>
                        Balikpapan, Kalimantan Timur. 76125. <br>
                        +62542 8769 47
                        </p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/banjarmasin.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="tebel mt-3">Banjarmasin</h4>
                        <p style="color:black; font-size:13px;">
                        Jl. A. Yani km. 7,8 Komp Citraland Type Ruko I-Walk Kawasan - The Downtown IW, <br>
                        Kav. No. 25, Desa Manarap, Kec Kertak Hanyar, Kab. Banjar, Kalimantan Selatan. 70654. <br>
                        +62511 3261 723 <br>
                        +62511 3261 794
                        </p>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/padang.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="tebel mt-3">Padang</h4>
                        <p style="color:black; font-size:13px;">
                        Jl. Niaga 165 Kel. Kampung Pondok <br>
                        Padang, Sumatera Barat. 25119. <br>
                        +62751 893 788 <br>
                        +62751 321 78
                        </p>
                    </div>
                    <div class="col-md-6 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/makassar.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-6 text-center">
                        <h4 class="tebel mt-3">Makassar</h4>
                        <p style="color:black; font-size:13px;">
                        Jl. Veteran Utara No.255 B (Samping Lorong Jl. Abubakar Lambogo) Kec. Maradekaya Utara, Makassar, Sulawesi Selatan. 90142. <br>
                        +62411 4092 960
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="" style="padding-top: 10%; padding-bottom: 10%; background-color: #D9D9D9;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 tengah">
                        <h2>Hubungi Kami</h2>
                        <hr style="border: 1px solid black; margin-top:-3px;">
                        <p style="color:black; font-size:13px;">Silahkan isikan formulir ini dan sampaikan pendapat maupun pertanyaan anda.</p>
                    </div>
                    <div class="col-md-8">
                        <?= form_open('save_hubungi_kami', ['id' => 'hubungi-form']) ?>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="" style="color:black; font-size:13px;">Nama</label>
                                    <input style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap Anda" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="" style="color:black; font-size:13px;">Email</label>
                                    <input style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" type="email" name="email" class="form-control" placeholder="Masukkan Alamat Email Anda" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""  style="color:black; font-size:13px;">Subjek</label>
                                    <input style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" type="text" name="subjek" class="form-control" placeholder="Subjek" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="" style="color:black; font-size:13px;">Pesan</label>
                                    <textarea class="form-control" style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" name="pesan" id="" cols="30" rows="5" required placeholder="Pesan"></textarea>
                                </div>
                                <div class="col-md-12 tengah">
                                    <button id="save-button"class="btn btn-warning tengah" style="background-color:#D19200; border:none; border-radius:10px; font-size:13px; color:#fff; padding-top:9px; padding-bottom:9px; padding-right:40px; padding-left:40px;">Kirim</button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            
            </div>
        </section>

        <section class="contact-us-section ptb-50">
            <div class="container">
                <div class="row justify-content-around tengah">
                    <div class="col-md-6">
                        <img src="<?= base_url() ?>/assets_frontend/img/getintouch.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="contact-us-content tengahvertikal">
                            <h1>Get In Touch!</h1>
                            <p class="biasa">Ikuti Media Sosial Kami untuk update informasi terkini.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href=""><img src="<?= base_url() ?>/assets_frontend/img/ig_ungu.svg" alt="visa" width="50" c/></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href=""><img src="<?= base_url() ?>/assets_frontend/img/fb_biru.svg" alt="paypal" width="50"/></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section>
            <div class="jumbotron bg-title-hubungikami" style="margin-bottom: 0 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                                <h2 class="tebel kiri">Hubungi Kami</h2>
                        </div>
                        <div class="col-md-6">
                            <?= form_open() ?>
                                <div class="row">
                                    <div class="col-md-10 d-flex my-auto">
                                        <input type="text" placeholder="cari sesuatu disini ..." class="form-control" style="font-size:13px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;">
                                        <button class="btn btn-warning" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="call-to-action" style="background: url('<?= base_url() ?>/assets_frontend/img/bgburam.svg')no-repeat center center / cover fixed">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mt-5 mb-5">
                        <h3 style="margin-top: 12%" class="text-warning">Kantor Pusat</h3>
                        <p class="text-white">
                            PANENSAHAM SEKURITAS INDONESIA <br>
                            Gading Bukit Indah Blok A No 21. <br>
                            Kelapa Gading, Jakarta Utara. 14240.
                        </p>
                        <p class="mt-3 mb-0 text-white"><img src="<?= base_url() ?>/assets_frontend/img/telponhk.svg" alt="" width="20"> 021 45877522 <br></p>
                        <p class="mb-0 text-white" style="margin-top: 0 !Important"><img src="<?= base_url() ?>/assets_frontend/img/chathk.svg" alt="" width="20"> 0821 12898149</p>
                        <p class="mb-0 text-white" style="margin-top: 0 !Important"><img src="<?= base_url() ?>/assets_frontend/img/smshk.svg" alt="" width="20"> care_center@panensaham.com</p>
                    </div>
                    <div class="col-md-6 mt-5 mb-5">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15867.40655012187!2d106.898343!3d-6.150618!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xf10d3a3df71e1ffd!2sPanen%20Saham!5e0!3m2!1sen!2sid!4v1655540745195!5m2!1sen!2sid" width="500" height="350" style="border:0; border-radius:10px;" allowfullscreen="" loading="eager"></iframe>
                    </div>
                </div>
            </div>
        </section>

        <section class="ptb-70 white-light-bg">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading mb-3 text-center">
                            <h2>Cabang Kami</h2>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 mr-5">
                    <div class="col-md-3 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/balikpapan.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-3 text-justify">
                        <h4 class="tebel">Balikpapan</h4>
                        <p style="color:black; font-size:13px;">
                        Ruku Sentra Eropa Blok AA. No.8 <br>
                        Kel. Gunung Samarinda, Kec. Balikpapan Utara, <br>
                        Balikpapan, Kalimantan Timur. 76125. <br>
                        +62542 8769 47
                        </p>
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/banjarmasin.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-3 text-justify">
                        <h4 class="tebel">Banjarmasin</h4>
                        <p style="color:black; font-size:13px;">
                        Jl. A. Yani km. 7,8 Komp Citraland Type Ruko I-Walk Kawasan - The Downtown IW, <br>
                        Kav. No. 25, Desa Manarap, Kec Kertak Hanyar, Kab. Banjar, Kalimantan Selatan. 70654. <br>
                        +62511 3261 723 <br>
                        +62511 3261 794
                        </p>
                    </div>
                </div>
                <div class="row mt-4 mr-5">
                    <div class="col-md-3 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/padang.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-3 text-justify">
                        <h4 class="tebel">Padang</h4>
                        <p style="color:black; font-size:13px;">
                        Jl. Niaga 165 Kel. Kampung Pondok <br>
                        Padang, Sumatera Barat. 25119. <br>
                        +62751 893 788 <br>
                        +62751 321 78
                        </p>
                    </div>
                    <div class="col-md-3 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/makassar.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-3 text-justify">
                        <h4 class="tebel">Makassar</h4>
                        <p style="color:black; font-size:13px;">
                        Jl. Veteran Utara No.255 B (Samping Lorong Jl. Abubakar Lambogo) Kec. Maradekaya Utara, Makassar, Sulawesi Selatan. 90142. <br>
                        +62411 4092 960
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-3" style="padding-top: 4rem !Important; padding-bottom: 4rem !important; background-color: #D9D9D9;">
            <div class="container ">
                <div class="row">
                    <div class="col-md-4">
                        <div style="margin-bottom: 25%;"></div>
                        <h2>Hubungi <br> Kami</h2>
                        <br>
                        <p style="color:black; font-size:13px;">Silahkan isikan formulir ini dan sampaikan pendapat maupun pertanyaan anda.</p>
                    </div>
                    <div class="col-md-8">
                        <?= form_open('save_hubungi_kami', ['id' => 'hubungi-form']) ?>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="" style="color:black; font-size:13px;">Nama</label>
                                    <input style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" type="text" name="nama" class="form-control" placeholder="Masukkan Nama Lengkap Anda" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="" style="color:black; font-size:13px;">Email</label>
                                    <input style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" type="email" name="email" class="form-control" placeholder="Masukkan Alamat Email Anda" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for=""  style="color:black; font-size:13px;">Subjek</label>
                                    <input style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" type="text" name="subjek" class="form-control" placeholder="Subjek" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <label for="" style="color:black; font-size:13px;">Pesan</label>
                                    <textarea class="form-control" style="color:black; font-size:13px; border-color:#888888; border-radius:10px;" name="pesan" id="" cols="30" rows="5" required placeholder="Pesan"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button id="save-button"class="btn btn-warning" style="background-color:#D19200; border:none; border-radius:10px; font-size:13px; color:#fff; padding-top:9px; padding-bottom:9px; padding-right:40px; padding-left:40px;">Kirim</button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            
            </div>
        </section>

        <section class="contact-us-section ptb-70">
            <div class="container">
                <div class="row justify-content-around">
                    <div class="col-12 px-5 pb-3 message-box d-none">
                        <div class="alert alert-danger"></div>
                    </div>
                    <div class="col-md-6">
                        <img src="<?= base_url() ?>/assets_frontend/img/getintouch.svg" width="70%" alt="">
                    </div>
                    <div class="col-md-5">
                        <div class="contact-us-content tengahvertikal">
                            <h1 style="font-size: 50px;">Get In Touch!</h1>
                            <p class="biasa">Ikuti Media Sosial Kami untuk update informasi terkini.</p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href=""><img src="<?= base_url() ?>/assets_frontend/img/ig_ungu.svg" alt="visa" width="50" class="mr-3"/></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href=""><img src="<?= base_url() ?>/assets_frontend/img/fb_biru.svg" alt="paypal" width="50"/></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?> 
<?= $this->endSection() ?>

<?= $this->section('script') ?>
    <script>
        $('#hubungi-form').on('submit', function(e){
            e.preventDefault();
            let id = '#'+$(this).attr('id');
            let save = $(this).submitAjax(id, e);
            if(save.error != undefined && save.error != ''){
                Object.keys(save.error).forEach(function(key){
                    $('input[name='+key+']').notify(save.error[key], 'error');
                })
            }
        })
    </script>
<?= $this->endSection() ?>