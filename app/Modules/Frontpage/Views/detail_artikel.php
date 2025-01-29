<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>

    <?php if ($mobile == true): ?>
        <section>
            <div class="jumbotron bg-title-artikel" style="margin-bottom: 0 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" style="padding: 4% 0;">
                                <h2 class="tebel kiri">Detail Artikel</h2>
                                <h5 class="tebel"><?= $content->judul ?></h5>
                                <p class="hitam"><?= $content->local_date ?> &nbsp; | &nbsp;  By <?= $content->author ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pricing-section ptb-30">
            <div class="container">
                <div class="row ml-2 mr-2">
                    <div class="col-md-6 tengah mb-4">
                        <img src="<?= $content->src_thumbnail ?? base_url().'/assets_frontend/img/noimage.jpg' ?>" alt="" style="max-width: 100%; height: auto;">
                    </div>
                    <div class="col-md-12">
                        <?= $content->content ?>
                    </div>
                    <div class="col-md-12">
                        Penulis : <font class="tebel"><?= $content->author ?></font> <br>
                    </div>
                    <div class="col-md-12">
                        Sumber : <?= anchor($content->sumber) ?>
                    </div>
                </div>
                <div class="row ml-2 mr-2 tengah mb-5">
                    <div class="col-12 tengah hitam mb-2 mt-3">
                        Bagikan :
                    </div>
                    <div class="col-12 tengah biasa hitam mb-4">
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/fbbulet.svg" class="mr-3" ></a>
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/wabulet.svg" class="mr-3" ></a>
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/twitterbulet.svg" class="" ></a>
                    </div>
                    <div class="col-12 tengah biasa hitam mb-1">
                        <div class="card p-4" style="background-color: #CA7979; color:#fff;">
                            <h4 class="putih">DISCLAIMER ON!</h4>
                            <p>
                                Pandangan diatas merupakan pandangan dari PanenSAHAM, dan kami tidak bertanggung jawab atas keuntungan atau kerugian yang diterima oleh investor dalam bertransaksi. Semua keputusan ada di tangan investor
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row  ml-2 mr-2 tengah mb-5">
                    <div class="col-12 tengah biasa hitam">
                        <hr style="border: 1px solid black;">
                    </div>
                    <div class="col-12 kiri tebel hitam">
                        Artikel Menarik Lainnya :
                    </div>
                    <div class="row ml-2 mr-2 tengah mb-4">
                        <!-- looping disini -->
                        <?php foreach($artikel_lainnya as $k => $v): ?>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="card text-left mt-4" style="border:none;">
                                    <a href="<?= base_url('detailartikel/'.@$v->slug) ?>"><img src="<?= $v->src_thumbnail ?>" width="100%" alt=""></a>
                                </div>
                                <a href="<?= base_url('detailartikel/'.@$v->slug) ?>" class="tebel justify hitam">
                                    <p class="tengah mt-3"><?= strlen($v->judul) <= 76 ? $v->judul : substr($v->judul, 0, 76).' ...' ?></p>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="col-12 tengah hitam">
                        <a href="" class="tebel hitam tengah">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section>
            <div class="jumbotron bg-title-artikel" style="margin-bottom: 0 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6" style="padding: 4% 0;">
                                <h2 class="tebel kiri">Detail Artikel</h2>
                                <h4 class="tebel"><?= $content->judul ?></h4>
                                <p class="biasa">
                                    <?= $content->local_date ?> &nbsp; | &nbsp;  By <?= $content->author ?>
                                </p>
                        </div>
                        <div class="col-md-6 tengah">
                            <img src="<?= $content->src_thumbnail ?? base_url().'/assets_frontend/img/noimage.jpg' ?>" alt="" class="zoom" style="max-width: 60%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pricing-section ptb-50">
            <div class="container">
                <div class="row ml-2 mr-2">
                    <div class="col-md-12 biasa">
                        <?= $content->content ?>
                    </div>
                    <div class="col-md-12 biasa">
                        Penulis : <font class="tebel"><?= $content->author ?></font> <br>
                    </div>
                    <div class="col-md-12 biasa">
                        Sumber : <?= anchor($content->sumber) ?>
                    </div>
                </div>
                <div class="row ml-2 mr-2 tengah mb-5">
                    <div class="col-12 tengah biasa hitam mb-3">
                        Bagikan :
                    </div>
                    <div class="col-12 tengah biasa hitam mb-4">
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=<?= base_url('detailartikel/'.$content->slug) ?>"><img src="<?= base_url() ?>/assets_frontend/img/fbbulet.svg" class="mr-3" width="25"></a>
                        <a target="_blank" href="whatsapp://send?text=This is WhatsApp sharing example using link"><img src="<?= base_url() ?>/assets_frontend/img/wabulet.svg" class="mr-3" width="25"></a>
                        <a target="_blank" href="https://twitter.com/share?url=<?= base_url('detailartikel/'.$content->slug) ?>"><img src="<?= base_url() ?>/assets_frontend/img/twitterbulet.svg" class="" width="25"></a>
                    </div>
                    <div class="col-12 tengah hitam mb-1">
                        <img src="<?= base_url() ?>/assets_frontend/img/disclaimermarun.svg" width="90%">
                    </div>
                </div>
                <div class="row ml-2 mr-2 tengah mb-4">
                    <div class="col-12 tengah biasa hitam">
                        <hr style="border: 1px solid black;">
                    </div>
                    <div class="col-12 kiri tebel hitam">
                        Artikel Menarik Lainnya :
                    </div>
                    <div class="row ml-5 mr-2 tengah mb-4">
                        <!-- looping disini -->
                        <?php foreach($artikel_lainnya as $k => $v): ?>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="card text-left mt-4" style="border:none; text-align: center; overflow: hidden; padding: 0;">
                                    <a href="<?= base_url('detailartikel/'.@$v->slug) ?>"><img src="<?= $v->src_thumbnail ?>" alt="" style="max-height: 250px;"></a>
                                </div>
                                <a href="<?= base_url('detailartikel/'.@$v->slug) ?>" class="hitam tebel biasa">
                                    <p class="kiri mt-3">
                                        <?= strlen($v->judul) <= 76 ? $v->judul : substr($v->judul, 0, 76).' ...' ?> 
                                    </p>
                                </a>

                                <!-- <?php if($v->kategori == 1) : ?>
                                    <img src="<?= base_url() ?>/assets_frontend/img/hot.svg" width="30%" alt="">
                                <?php elseif ($v->kategori == 2) : ?>
                                    <img src="<?= base_url() ?>/assets_frontend/img/new.svg" width="30%" alt="">
                                <?php endif ?> -->
                                
                            </div>
                        <?php endforeach; ?>
                        
                    </div>
                    <div class="col-12 tengah hitam">
                        <a href="<?= base_url('artikel') ?>" class="tebel hitam biasa tengah">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?> 

<?= $this->endSection() ?>