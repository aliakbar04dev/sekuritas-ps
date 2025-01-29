<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>

    <?php if ($mobile == true): ?>
        <section class="pricing-section ptb-50">
            <div class="container">
                <div class="row ml-2 mr-2">
                    <p class="biasa hitam kiri">
                        <font class="tebel">Berita &nbsp; | &nbsp; <?= $content['Headline'] ?></font>
                        <br>
                        <font style="font-size: 20px; color:#000; font-weight:bold;"><?= $content['Headline'] ?></font>
                        <br>
                        <font style="color: #535353;"><?= $hari ?>, <?= date('d F Y', strtotime($content['_Date'])) ?>. <?= date('H:i', strtotime($content['_Time'])) ?> WIB</font>
                    </p>
                </div>
                <div class="row ml-2 mr-2">
                    <p class="biasa hitam justify">
                        <?= $content['Content'] ?>
                        <br><br>
                        Sumber : <font class="tebel"><?= $content['Source'] ?></font>
                    </p>
                </div>
                <div class="row ml-2 mr-2 tengah mb-5">
                    <div class="col-12 tengah biasa hitam mb-4">
                        Bagikan :
                    </div>
                    <div class="col-12 tengah biasa hitam mb-4">
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/fbbulet.svg" class="mr-3" width="25"></a>
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/wabulet.svg" class="mr-3" width="25"></a>
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/twitterbulet.svg" class="" width="25"></a>
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
                    <div class="col-12 tebel hitam tengah">
                        Anda Mungkin Menyukai Ini :
                    </div>
                    <div class="row row ml-2 mr-2 tengah mb-1">
                        <!-- looping disini -->
                        <?php foreach ($content_lainnya as $dataRow): ?>
                            <?php 
                                $days = array('Minggu', 'Senin', 'Selasa', 'Rabu','Kamis','Jum\'at', 'Sabtu');
                                $date = date('w', strtotime($dataRow['_Date']));
                                $hariBanyak = $days[$date];
                            ?>
                            <div class="col-lg-4 col-md-4 col-12">
                                <div class="card text-left single-pricing-pack mt-4" style="border-color: #000;">
                                    <div class="p-3">
                                        <h6 class="mt-2"><?= $dataRow['Headline'] ?></h6>
                                        <p class="mb-2" style="font-size: 13px;"><?= $hariBanyak ?>, <?= date('d F Y', strtotime($dataRow['_Date'])) ?>. <?= date('H:i', strtotime($dataRow['_Time'])) ?> WIB</p>
                                        <p class="mb-2" style="font-size: 13px; margin-top:2%;"><?= substr( $dataRow['Content'], 0, 200) ?> ...</p>
                                        <p class="mb-0 kanan" style="font-size: 13px;">
                                            <a href="<?= base_url('detailberita/'.$dataRow['_ID']) ?>">
                                                <font style="color: #000;  font-size: 13px; font-weight:bold;">Selengkapnya</font>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="pricing-section ptb-50">
            <div class="container">
                <div class="row ml-2 mr-2">
                    <p class="biasa hitam justify">
                        <font class="tebel">Berita &nbsp; | &nbsp; <?= $content['Headline'] ?></font>
                        <br>
                        <font style="font-size: 25px; color:#000; font-weight:bold;"><?= $content['Headline'] ?></font>
                        <br>
                        <font style="color: #535353;"><?= $hari ?>, <?= date('d F Y', strtotime($content['_Date'])) ?>. <?= date('H:i', strtotime($content['_Time'])) ?> WIB</font>
                    </p>
                </div>
                <div class="row ml-2 mr-2">
                    <p class="biasa hitam justify">
                        <?= $content['Content'] ?>
                        <br><br>
                        Sumber : <font class="tebel"><?= $content['Source'] ?></font>
                    </p>
                </div>
                <div class="row ml-2 mr-2 tengah mb-5">
                    <div class="col-12 tengah biasa hitam mb-3">
                        Bagikan :
                    </div>
                    <div class="col-12 tengah biasa hitam mb-4">
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/fbbulet.svg" class="mr-3" width="25"></a>
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/wabulet.svg" class="mr-3" width="25"></a>
                        <a href=""><img src="<?= base_url() ?>/assets_frontend/img/twitterbulet.svg" class="" width="25"></a>
                    </div>
                    <div class="col-12 tengah biasa hitam mb-1">
                        <img src="<?= base_url() ?>/assets_frontend/img/disclaimermarun.svg" width="90%">
                    </div>
                </div>
                <div class="row  ml-2 mr-2 tengah mb-5">
                    <div class="col-12 tengah biasa hitam">
                        <hr style="border: 1px solid black;">
                    </div>
                    <div class="col-12 kiri tebel hitam">
                        Anda Mungkin Menyukai Ini :
                    </div>
                    <div class="row row ml-2 mr-2 tengah mb-4">
                        <!-- looping disini -->
                        <?php foreach ($content_lainnya as $dataRow): ?>
                            <?php 
                                $days = array('Minggu', 'Senin', 'Selasa', 'Rabu','Kamis','Jum\'at', 'Sabtu');
                                $date = date('w', strtotime($dataRow['_Date']));
                                $hariBanyak = $days[$date];
                            ?>
                            <div class="col-4">
                                <div class="card text-left single-pricing-pack mt-4" style="border-color: #000;">
                                    <div class="p-3">

                                        <h6 class="mt-2">    
                                            <?php if (strlen($dataRow['Headline']) > 48): ?>
                                                <?= substr( $dataRow['Headline'], 0, 48) ?> ...
                                            <?php else: ?>
                                                <?= $dataRow['Headline'] ?>
                                            <?php endif; ?>
                                        </h6>

                                        <p class="mb-2" style="font-size: 13px;"><?= $hariBanyak ?>, <?= date('d F Y', strtotime($dataRow['_Date'])) ?>. <?= date('H:i', strtotime($dataRow['_Time'])) ?> WIB</p>
                                        <p class="mb-2" style="font-size: 13px; margin-top:2%;"><?= substr( $dataRow['Content'], 0, 200) ?> ...</p>
                                        <p class="mb-0 kanan" style="font-size: 13px;">
                                            <a href="<?= base_url('detailberita/'.$dataRow['_ID']) ?>">
                                                <font style="color: #000;  font-size: 13px; font-weight:bold;">Selengkapnya</font>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?> 

<?= $this->endSection() ?>