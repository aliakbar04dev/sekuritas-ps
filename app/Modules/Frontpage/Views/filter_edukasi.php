<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
    <?php if ($mobile == true): ?>
        <section>
            <div class="jumbotron bg-title-edukasi" style="margin-bottom: 0 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                                <h2 class="tebel kiri">Cari Edukasi</h2>
                                <p class="biasa">Cari Acara Edukasi Semau Anda</p>
                        </div>
                        <div class="col-md-6">
                            <?= form_open() ?>
                                <div class="row">
                                    <div class="col-md-10 d-flex my-auto">
                                        <input type="text" placeholder="cari sesuatu disini ..." class="form-control" style="font-size:13px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" required>
                                        <button class="btn btn-warning" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="ptb-30 white-light-bg">
            <div class="container">
                <div class="row mt-1 mb-5">
                    <div class="col-md-5 mb-4">
                        <h5 class="tebel ml-3">Filter <a href="<?= base_url('edukasi') ?>" style="font-size: 11px; color:#612D11; font-weight:bolder; margin-left:60%;">Atur Ulang</a></h5>
                        <div class="container">
                            <div class="card p-3" style="background-color: #D9D9D9; border:none;">
                                <?= form_open() ?>
                                <div class="row">
                                    <div class="col-md-12 d-flex my-auto">
                                        <input type="text" placeholder="cari kota, tema, judul...." class="form-control" style="font-size:13px; border:none; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" required>
                                        <button class="btn btn-light" style="background-color:#fff; border:none; border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                                <?= form_close() ?>
                                <h6 class="tebel mt-3">Tags</h6>
                                <div class="row" style="margin-left: 0px;">
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="background-color:#D19200; border:none; border-radius: 10px; border-color:#757575; font-size:12px; color:#fff;">Semua</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Beginner</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Intermediate</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Intermediate</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Intermediate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="container">
                            <div class="card p-3" style="border-color: #000;">
                                <h5 class="hitam tebel">Semua</h5>
                                <hr style="border: 1px solid black; margin-top:5px;">
                                <div class="row mb-4">
                                    <!-- looping disini -->
                                    <?php foreach ($list_edukasi as $row) : ?>
                                        <div class="col-lg-6 col-md-6 col-12">
                                            <div class="card text-left mt-4" style="border:none;">
                                                <a href="<?= base_url().'/detailedukasi/'.$row->slug ?>"><img src="<?= $row->src_gambar_depan ?>" width="100%" alt=""></a>
                                            </div>
                                            <a href="<?= base_url().'/detailedukasi/'.$row->slug ?>" style="text-align:left;">
                                                <p class="mt-2" style="font-size: 13px; color:#888888;">
                                                    <?php if(strpos($row->kota_list, 'Kota') !== false) : ?>
                                                        <?= substr($row->kota_list, 5) ?>
                                                    <?php elseif (strpos($row->kota_list, 'Kabupaten') !== false) : ?>
                                                        <?= substr($row->kota_list, 10) ?>
                                                    <?php endif ?>
                                                    , <?= $row->hari.' '.$row->local_date.'. '.$row->jam.':'.$row->menit.' '.$row->waktu_bagian ?>
                                                </p>
                                            </a>
                                            <a href="<?= base_url().'/detailedukasi/'.$row->slug ?>" class="tebel" style="color: #000;"><p class="text-left" style="margin-top: -5%;"><?= substr($row->judul, 0, 80) ?> ...</p></a>
                                            <div class="row" style="margin-left: 0px;">
                                                <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $row->bulan_text ?></button>
                                                <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">
                                                    <?php if(strpos($row->kota_list, 'Kota') !== false) : ?>
                                                        <?= substr($row->kota_list, 5) ?>
                                                    <?php elseif (strpos($row->kota_list, 'Kabupaten') !== false) : ?>
                                                        <?= substr($row->kota_list, 10) ?>
                                                    <?php endif ?>
                                                </button>
                                                <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $row->level_text ?></button>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- selesai disini -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else: ?>
        <section>
            <div class="jumbotron bg-title-edukasi" style="margin-bottom: 0 !important;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                                <h2 class="tebel kiri">Cari Edukasi</h2>
                                <p class="biasa">Cari Acara Edukasi Semau Anda</p>
                        </div>
                        <div class="col-md-6">
                            <?= form_open() ?>
                                <div class="row">
                                    <div class="col-md-10 d-flex my-auto">
                                        <input type="text" placeholder="cari sesuatu disini ..." class="form-control" style="font-size:13px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" required>
                                        <button class="btn btn-warning" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                    </div>
                                </div>
                            <?= form_close() ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="ptb-30 white-light-bg">
            <div class="container">
                <div class="row mt-1 mb-5">
                    <div class="col-md-4">
                        <h5 class="tebel ml-3">Filter <a href="<?= base_url('edukasi') ?>" style="font-size: 11px; color:#612D11; font-weight:bolder; margin-left:60%;">Atur Ulang</a></h5>
                        <div class="container">
                            <div class="card p-3" style="background-color: #D9D9D9; border:none;">
                                <?= form_open() ?>
                                    <div class="row">
                                        <div class="col-md-12 d-flex my-auto">
                                            <input type="text" placeholder="cari kota, tema, judul...." class="form-control" style="font-size:13px; border:none; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" required>
                                            <button class="btn btn-light" style="background-color:#fff; border:none; border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                        </div>
                                    </div>
                                <?= form_close() ?>
                                <h6 class="tebel mt-3">Tags</h6>
                                <div class="row" style="margin-left: 0px;">
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="background-color:#D19200; border:none; border-radius: 10px; border-color:#757575; font-size:12px; color:#fff;">Semua</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Beginner</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Intermediate</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Intermediate</button>
                                    <button class="btn btn-outline-secondary mr-2 mb-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">Intermediate</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card p-3" style="border-color: #000;">
                            <h5 class="hitam tebel">Semua</h5>
                            <hr style="border: 1px solid black; margin-top:5px;">
                            <div class="row mb-4">
                                <!-- looping disini -->
                                <?php foreach ($list_edukasi as $row) : ?>
                                    <div class="col-lg-6 col-md-6 col-12">
                                    <div class="card text-left mt-4" style="border:none;">
                                        <a href="<?= base_url().'/detailedukasi/'.$row->slug ?>"><img src="<?= $row->src_gambar_depan ?>" width="100%" alt=""></a>
                                    </div>

                                    <a href="<?= base_url().'/detailedukasi/'.$row->slug ?>" style="text-align:left;">
                                        <p class="mt-2" style="font-size: 13px; color:#888888;">
                                            <?php if(strpos($row->kota_list, 'Kota') !== false) : ?>
                                                <?= substr($row->kota_list, 5) ?>
                                            <?php elseif (strpos($row->kota_list, 'Kabupaten') !== false) : ?>
                                                <?= substr($row->kota_list, 10) ?>
                                            <?php endif ?>
                                            , <?= $row->hari.' '.$row->local_date.'. '.$row->jam.':'.$row->menit.' '.$row->waktu_bagian ?>
                                        </p>
                                    </a>

                                    <a href="<?= base_url().'/detailedukasi/'.$row->slug ?>" class="tebel" style="color: #000;"><p class="text-left" style="margin-top: -5%;"><?= substr($row->judul, 0, 80) ?> ...</p></a>
                                    <div class="row" style="margin-left: 0px;">
                                        <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $row->bulan_text ?></button>
                                        <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">
                                            <?php if(strpos($row->kota_list, 'Kota') !== false) : ?>
                                                <?= substr($row->kota_list, 5) ?>
                                            <?php elseif (strpos($row->kota_list, 'Kabupaten') !== false) : ?>
                                                <?= substr($row->kota_list, 10) ?>
                                            <?php endif ?>
                                        </button>
                                        <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $row->level_text ?></button>
                                    </div>
                                </div>
                                <?php endforeach ?>
                                <!-- selesai disini -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?> 
<?= $this->endSection() ?>
