<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
    <?php if ($mobile == true): ?>
        <section class="ptb-30 white-light-bg">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading mb-3 tengah">
                            <h4 class="tebel tengah"><?= $content->judul ?? '-' ?></h4>
                            <p class="biasa">
                                <?= $content->hari.' '.$content->local_date.'. '.$content->jam.':'.$content->menit.' '.$content->waktu_bagian ?>

                                &nbsp; | &nbsp; 

                                <?php if(strpos($content->kota_list, 'Kota') !== false) : ?>
                                <?= substr($content->kota_list, 5) ?>
                                <?php elseif (strpos($content->kota_list, 'Kabupaten') !== false) : ?>
                                    <?= substr($content->kota_list, 10) ?>
                                <?php endif ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 mb-1 justify">
                    <div class="col-md-6 tengah">
                        <img src="<?= $content->src_gambar_depan ?? base_url().'/assets_frontend/img/strategicuan.svg' ?>" style="max-width: 80%; height: auto;">
                    </div>
                    <div class="col-md-6 mt-4">
                        <?= $content->content ?? '-' ?>
                    </div>
                </div>
                <div class="row tengah mb-1">
                    <div class="col-12 tengah biasa hitam">
                        <hr style="border: 1px solid black;">
                    </div>
                    <div class="col-12 kiri tebel hitam">
                        Event Lainnya :
                    </div>
                </div>
                <div class="row mb-4">
                    <!-- looping disini -->
                    <?php foreach($event_lainnya as $k => $v): ?>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card text-left mt-4" style="border:none;">
                            <a href="<?= base_url().'/detailedukasi/'.$v->slug ?>"><img src="<?= $v->src_gambar_depan ?? base_url().'/assets_frontend/img/coveredukasi.svg' ?>" width="100%" alt=""></a>
                        </div>
                        <a href="<?= base_url().'/detailedukasi/'.$v->slug ?>" style="text-align:left;">
                            <p class="mt-2" style="font-size: 13px; color:#888888;">
                                <?php if(strpos($v->kota_list, 'Kota') !== false) : ?>
                                    <?= substr($v->kota_list, 5) ?>
                                <?php elseif (strpos($v->kota_list, 'Kabupaten') !== false) : ?>
                                    <?= substr($v->kota_list, 10) ?>
                                <?php endif ?>
                                , <?= $v->hari.' '.$v->local_date.'. '.$v->jam.':'.$v->menit.' '.$v->waktu_bagian ?>
                            </p>
                        </a>

                        <a href="<?= base_url().'/detailedukasi/'.$v->slug ?>" class="tebel" style="color: #000;"><p class="text-left" style="margin-top: -5%;"><?= substr($v->judul, 0, 80) ?></p></a>
                        <div class="row" style="margin-left: 0px;">
                            <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $v->bulan_text ?? '-' ?></button>
                            <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">
                                <?php if(strpos($v->kota_list, 'Kota') !== false) : ?>
                                    <?= substr($v->kota_list, 5) ?>
                                <?php elseif (strpos($v->kota_list, 'Kabupaten') !== false) : ?>
                                    <?= substr($v->kota_list, 10) ?>
                                <?php endif ?>
                            </button>
                            <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $v->level_text ?? '-' ?></button>
                        </div>
                    </div>
                    <?php endforeach; ?>
                    
                    <!-- selesai disini -->
                </div>
                <div class="col-12 tengah hitam mt-4 mb-4">
                    <a href="<?= base_url('edukasi') ?>" class="tebel hitam tengah">Selengkapnya</a>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section class="ptb-30 white-light-bg">
            <div class="container">
                <div class="row mb-2">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading mb-3 kiri">
                            <h2 class="tebel kiri"><?= $content->judul ?? '-' ?></h2>
                            <p class="biasa">
                                <?= $content->hari.' '.$content->local_date.'. '.$content->jam.':'.$content->menit.' '.$content->waktu_bagian ?>

                                &nbsp; | &nbsp; 

                                <?php if(strpos($content->kota_list, 'Kota') !== false) : ?>
                                   <?= substr($content->kota_list, 5) ?>
                                <?php elseif (strpos($content->kota_list, 'Kabupaten') !== false) : ?>
                                    <?= substr($content->kota_list, 10) ?>
                                <?php endif ?>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row mt-1 mb-5">
                    <div class="col-md-6">
                        <img src="<?= $content->src_gambar_depan ?? base_url().'/assets_frontend/img/strategicuan.svg' ?>" style="max-width: 70%; height: auto;">
                    </div>
                    <div class="col-md-6">
                        <?= $content->content ?? '-' ?>
                    </div>
                </div>
                <div class="row tengah mb-4">
                    <div class="col-12 tengah biasa hitam">
                        <hr style="border: 1px solid black;">
                    </div>
                    <div class="col-12 kiri tebel hitam">
                        Event Lainnya :
                    </div>

                    <!-- looping disini -->
                    <?php foreach($event_lainnya as $k => $v): ?>
                        <div class="col-4">
                            <div class="card text-left mt-4" style="border:none;">
                                <a href="<?= base_url().'/detailedukasi/'.$v->slug ?>"><img src="<?= $v->src_gambar_depan ?? base_url().'/assets_frontend/img/coveredukasi.svg' ?>" width="100%" alt=""></a>
                            </div>
                            
                            <a href="<?= base_url().'/detailedukasi/'.$v->slug ?>" style="text-align:left;">
                                <p class="mt-2" style="font-size: 13px; color:#888888;">
                                    <?php if(strpos($v->kota_list, 'Kota') !== false) : ?>
                                        <?= substr($v->kota_list, 5) ?>
                                    <?php elseif (strpos($v->kota_list, 'Kabupaten') !== false) : ?>
                                        <?= substr($v->kota_list, 10) ?>
                                    <?php endif ?>
                                    , <?= $v->hari.' '.$v->local_date.'. '.$v->jam.':'.$v->menit.' '.$v->waktu_bagian ?>
                                </p>
                            </a>

                            <a href="<?= base_url().'/detailedukasi/'.$v->slug ?>" class="tebel" style="color: #000;"><p class="text-left" style="margin-top: -5%;"><?= substr($v->judul, 0, 80) ?></p></a>
                            <div class="row" style="margin-left: 0px;">
                                <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $v->bulan_text ?? '-' ?></button>
                                <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">
                                    <?php if(strpos($v->kota_list, 'Kota') !== false) : ?>
                                        <?= substr($v->kota_list, 5) ?>
                                    <?php elseif (strpos($v->kota_list, 'Kabupaten') !== false) : ?>
                                        <?= substr($v->kota_list, 10) ?>
                                    <?php endif ?>
                                </button>
                                <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $v->level_text ?? '-' ?></button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    
                    <div class="col-12 tengah hitam mt-4">
                        <a href="<?= base_url('edukasi') ?>" class="tebel hitam tengah">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?> 
<?= $this->endSection() ?>
