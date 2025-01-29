<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
    <section>
        <div class="jumbotron bg-title-edukasi" style="margin-bottom: 0 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <h2 class="tebel kiri">Acara Edukasi</h2>
                            <p class="biasa">Jadwal Acara Edukasi oleh Tim Edukasi PanenSAHAM</p>
                    </div>
                    <div class="col-md-6">
                        <?= form_open(base_url('edukasi'), ['method' => 'get']) ?>
                            <div class="row">
                                <div class="col-md-10 d-flex my-auto">
                                    <input value="<?= @$var->q ?>" name="q" type="text" placeholder="cari sesuatu disini ..." class="form-control" style="font-size:13px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" required>
                                    <?= form_hidden('bulan', @$var->bulan ?? '') ?>
                                    <?= form_hidden('kota', @$var->kota ?? '') ?>
                                    <?= form_hidden('level', @$var->level ?? '') ?>

                                    <button class="btn btn-warning" style="border-top-left-radius: 0px; border-bottom-left-radius: 0px; border-top-right-radius: 5px; border-bottom-right-radius: 5px;"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pricing-section ptb-50">
        <div class="container">
            <?= form_open(base_url('edukasi'), ['method' => 'GET', 'id' => 'auto-form']) ?>
                <?= form_hidden('q', @$var->q ?? '') ?>
                <?php if ($mobile == true): ?>
                    <div class="row" style="margin-top: -5%;">
                        <div class="col-md-3">
                            <select name="bulan" onchange="$('#auto-form').submit()" id="" class="selectpicker mb-2" data-live-search="true" data-width="100%" data-container="body" title="Pilih Bulan" data-size="5" style="border-radius: 10px;">
                            <?php foreach($list_bulan as $k => $v): ?>
                                    <option value="<?= $k ?>"><?= $v ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="kota" onchange="$('#auto-form').submit()" id="" class="selectpicker mb-2" data-live-search="true" data-width="100%" data-container="body" data-size="5" title="Pilih Kota" style="border-radius: 10px;">
                            <?php foreach($list_kota as $k => $v): ?>
                                <option value="<?= $v->region_id ?>"><?= $v->kabupaten_kota ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="level" onchange="$('#auto-form').submit()" id="" class="selectpicker" data-live-search="true" data-width="100%" data-container="body" title="Pilih Level" data-size="5" style="border-radius: 10px;">
                            <?php foreach($list_level as $k => $v): ?>
                                <option value="<?= $k ?>"><?= $v ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="row">
                        <div class="col-md-3">
                            <select name="bulan"  id="" class="selectpicker" data-live-search="true" data-width="100%" data-container="body" title="Pilih Bulan" data-size="5" style="border-radius: 10px;">
                            <option value="">Pilih Bulan</option>
                            <?php foreach($list_bulan as $k => $v): ?>
                                    <option <?= @$var->bulan == $k ? 'selected' : '' ?> value="<?= $k ?>"><?= $v ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="kota" id="" class="selectpicker" data-live-search="true" data-width="100%" data-container="body" data-size="5" title="Pilih Kota" style="border-radius: 10px;">
                            <option value="">Pilih Kota</option>

                            <?php foreach($list_kota as $k => $v): ?>
                                <option <?= @$var->kota == $v->region_id ? 'selected' : '' ?> value="<?= $v->region_id ?>"><?= $v->kabupaten_kota ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="level" id="" class="selectpicker" data-live-search="true" data-width="100%" data-container="body" title="Pilih Level" data-size="5" style="border-radius: 10px;">
                            <option value="">Pilih Level</option>

                            <?php foreach($list_level as $k => $v): ?>
                                <option <?= @$var->level == $k ? 'selected' : '' ?> value="<?= $k ?>"><?= $v ?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-sm btn-warning"><span class="fa fa-search"></span></button>
                        </div>
                    </div>
                <?php endif; ?>
            <?= form_close() ?>
            
            <div class="row">
                <!-- looping disini -->
                <?php foreach ($list_acara as $acara) : ?>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card text-left mt-4" style="border:none;">
                            <a href="<?= base_url().'/detailedukasi/'.$acara->slug ?>"><img src="<?= $acara->src_gambar_depan ?? base_url().'/assets_frontend/img/strategicuan.svg' ?>" width="100%" alt=""></a>
                        </div>
                        <a href="<?= base_url().'/detailedukasi/'.$acara->slug ?>" style="text-align:left;">
                            <p class="mt-2" style="font-size: 13px; color:#888888;">
                                <?php if(strpos($acara->kota_list, 'Kota') !== false) : ?>
                                    <?= substr($acara->kota_list, 5) ?>
                                <?php elseif (strpos($acara->kota_list, 'Kabupaten') !== false) : ?>
                                    <?= substr($acara->kota_list, 10) ?>
                                <?php endif ?>,
                                <?= $acara->hari.' '.$acara->local_date.'. '.$acara->jam.':'.$acara->menit.' '.$acara->waktu_bagian ?>
                            </p>
                        </a>

                        <a href="<?= base_url().'/detailedukasi/'.$acara->slug ?>" class="tebel" style="color: #000;"><p class="text-left" style="margin-top: -5%;"><?= substr($acara->judul, 0, 80) ?> ...</p></a>

                        <div class="row" style="margin-left: 0px;">
                            <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $acara->bulan_text ?? '-' ?></button>
                            <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;">
                                <?php if(strpos($acara->kota_list, 'Kota') !== false) : ?>
                                   <?= substr($acara->kota_list, 5) ?>
                                <?php elseif (strpos($acara->kota_list, 'Kabupaten') !== false) : ?>
                                    <?= substr($acara->kota_list, 10) ?>
                                <?php endif ?>
                            </button>
                            <button class="btn btn-outline-secondary mr-2" style="border-radius: 10px; border-color:#757575; font-size:12px; color:#000;"><?= $acara->level_text ?? '-' ?></button>
                        </div>
                    </div>
                <?php endforeach ?>

            </div>
            <div class="row text-center" style="margin-bottom: 2rem;">
                <div class="col-12 text-center">
                    <?= $pager->links('btcorona', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>