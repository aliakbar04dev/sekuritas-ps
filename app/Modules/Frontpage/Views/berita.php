<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
    <section>
        <div class="jumbotron bg-title-berita" style="margin-bottom: 0 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <h2 class="tebel kiri">Berita Terkini</h2>
                            <p class="biasa">Informasi terkini seputar pasar modal</p>
                    </div>
                    <div class="col-md-6">
                        <?= form_open(base_url('berita'),['method' => 'GET']) ?>
                            <div class="row">
                                <div class="col-md-10 d-flex my-auto">
                                    <input type="text" value="<?= @$var['q'] ?>" name="q" placeholder="cari sesuatu disini ..." class="form-control" style="font-size:13px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" required>
                                    <button class="btn btn-warning" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php if ($mobile == true): ?>
        <section class="pricing-section ptb-10">
            <div class="container">
                <!-- <div class="row ml-3">
                    <button class="btn btn-warning mr-2 biasa" style="border-radius: 10px; color:#fff; background-color:#D19200; border:none;">Semua</button>
                    <button class="btn btn-outline-dark mr-2 biasa" style="border-radius: 10px;">Terbaru</button>
                    <button class="btn btn-outline-dark mr-2 biasa" style="border-radius: 10px;">Terpopuler</button>
                </div> -->
                <div class="container">
                    <div class="row">

                        <?php foreach ($beritaAll as $beritaRow): ?>
                            <?php 
                                $days = array('Minggu', 'Senin', 'Selasa', 'Rabu','Kamis','Jum\'at', 'Sabtu');
                                $date = date('w', strtotime($beritaRow['_Date']));
                                $hariBanyak = $days[$date];
                            ?>
                            <div class="col-12">
                                <div class="card text-left single-pricing-pack mt-4" style="border-color: #000;">
                                    <div class="p-3">

                                        <h6 class="mt-2">    
                                            <?= $beritaRow['Headline'] ?>
                                        </h6>

                                        <p class="mb-2" style="font-size: 13px;"><?= $hariBanyak ?>, <?= date('d F Y', strtotime($beritaRow['_Date'])) ?>. <?= date('H:i', strtotime($beritaRow['_Time'])) ?> WIB</p>
                                        <p class="mb-2" style="font-size: 13px; margin-top:2%;"><?= substr( $beritaRow['Content'], 0, 200) ?> ...</p>
                                        <p class="mb-0 kanan" style="font-size: 13px;">
                                            <a href="<?= base_url('detailberita/'.$beritaRow['_ID']) ?>">
                                                <font style="color: #000;  font-size: 13px; font-weight:bold;">Selengkapnya</font>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>

                <div class="row text-center" style="margin-top: 2rem; margin-bottom: 5rem">
                    <div class="col-12 text-center">
                        <?= $beritaPager->links('btcorona', 'bootstrap_pagination') ?>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="pricing-section ptb-30">
            <div class="container">
                <!-- <div class="row" style="margin-left: 75%;">
                    <button class="btn btn-warning mr-2 biasa" style="border-radius: 10px; color:#fff; background-color:#D19200; border:none;">Semua</button>
                    <button class="btn btn-outline-dark mr-2 biasa" style="border-radius: 10px;">Terbaru</button>
                    <button class="btn btn-outline-dark mr-2 biasa" style="border-radius: 10px;">Terpopuler</button>
                </div> -->
                <div class="container">
                    <div class="row">

                        <?php foreach ($beritaAll as $beritaRow): ?>
                            <?php 
                                $days = array('Minggu', 'Senin', 'Selasa', 'Rabu','Kamis','Jum\'at', 'Sabtu');
                                $date = date('w', strtotime($beritaRow['_Date']));
                                $hariBanyak = $days[$date];
                            ?>
                            <div class="col-4">
                                <div class="card text-left single-pricing-pack mt-4" style="border-color: #000;">
                                    <div class="p-3">

                                        <h6 class="mt-2">    
                                            <?php if (strlen($beritaRow['Headline']) > 48): ?>
                                                <?= substr( $beritaRow['Headline'], 0, 48) ?> ...
                                            <?php else: ?>
                                                <?= $beritaRow['Headline'] ?>
                                            <?php endif; ?>
                                        </h6>

                                        <p class="mb-2" style="font-size: 13px;"><?= $hariBanyak ?>, <?= date('d F Y', strtotime($beritaRow['_Date'])) ?>. <?= date('H:i', strtotime($beritaRow['_Time'])) ?> WIB</p>
                                        <p class="mb-2" style="font-size: 13px; margin-top:2%;"><?= substr( $beritaRow['Content'], 0, 200) ?> ...</p>
                                        <p class="mb-0 kanan" style="font-size: 13px;">
                                            <a href="<?= base_url('detailberita/'.$beritaRow['_ID']) ?>">
                                                <font style="color: #000;  font-size: 13px; font-weight:bold;">Selengkapnya</font>
                                            </a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
                
                <!-- <div class="container mb-1">
                    <div class="row">
                        <div class="col-5 tengah">
                            <hr style="height:2px;border-width:0; color:#888888; background-color:#888888;">
                        </div>
                        <div class="col-2 tengah">
                        <p style="font-size: 15px;">Berita Sebelumnya</p>

                        </div>
                        <div class="col-5 tengah">
                            <hr style="height:2px;border-width:0; color:#888888; background-color:#888888;">
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <div class="card text-left single-pricing-pack mt-4" style="border-color: #000;">
                                <div class="p-3">
                                    <h6 class="mt-2">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">Selasa, 31 Mei 2022. 07:44 WIB</p>
                                    <p class="mb-2" style="font-size: 13px; margin-top:2%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non est eget odio....</p>
                                    <p class="mb-0 kanan" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Selengkapnya</font>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card text-left single-pricing-pack mt-4" style="border-color: #000;">
                                <div class="p-3">
                                    <h6 class="mt-2">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">Selasa, 31 Mei 2022. 07:44 WIB</p>
                                    <p class="mb-2" style="font-size: 13px; margin-top:2%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non est eget odio....</p>
                                    <p class="mb-0 kanan" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Selengkapnya</font>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card text-left single-pricing-pack mt-4" style="border-color: #000;">
                                <div class="p-3">
                                    <h6 class="mt-2">[UPDATE] Jadwal Libur Bursa 2022</h6>
                                    <p class="mb-2" style="font-size: 13px;">Selasa, 31 Mei 2022. 07:44 WIB</p>
                                    <p class="mb-2" style="font-size: 13px; margin-top:2%;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla non est eget odio....</p>
                                    <p class="mb-0 kanan" style="font-size: 13px;">
                                        <a href="">
                                            <font style="color: #000;  font-size: 13px; font-weight:bold;">Selengkapnya</font>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row text-center" style="margin-top: 2rem; margin-bottom: 5rem">
                    <div class="col-12 text-center">
                        <?= $beritaPager->links('btcorona', 'bootstrap_pagination') ?>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?= $this->endSection() ?>