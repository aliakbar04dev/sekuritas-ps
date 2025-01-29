<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
    <section>
        <div class="jumbotron bg-title-artikel" style="margin-bottom: 0 !important;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                            <h2 class="tebel kiri">Artikel</h2>
                            <p class="biasa">Artikel seputar pasar modal spesial dari Tim PanenSAHAM</p>
                    </div>
                    <div class="col-md-6">
                        <?= form_open(base_url('artikel'),['method' => 'GET']) ?>
                            <div class="row">
                                <div class="col-md-10 d-flex my-auto">
                                    <input value="<?= @$var['q'] ?>" name="q" type="text" placeholder="cari sesuatu disini ..." class="form-control" style="font-size:13px; border-top-left-radius: 5px; border-bottom-left-radius: 5px; border-top-right-radius: 0px; border-bottom-right-radius: 0px;" required>
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
            <div class="row ml-2">
                <button class="btn btn-outline-warning mr-2 biasa" style="border-radius: 10px;">Semua</button>
                <button class="btn btn-outline-dark mr-2 biasa" style="border-radius: 10px;">Terbaru</button>
                <button class="btn btn-outline-dark mr-2 biasa" style="border-radius: 10px;">Terpopuler</button>
            </div>
            <div class="row">
                <!-- looping disini -->
                <?php foreach($list_artikel as $k => $data): ?>
                    <div class="col-lg-4 col-md-4 col-12">
                   
                        <div class="card text-left mt-4" style="border:none; text-align: center; overflow: hidden; padding: 0;">
                            <a href="<?= base_url('detailartikel/'.$data->slug) ?>"><img src="<?= $data->src_thumbnail ?? base_url().'/assets_frontend/img/noimage.jpg' ?>" alt="" style="max-height: 250px;"></a>
                        </div>

                        <a href="" class="tebel" style="color: #000; text-align:left;">
                            <p class="text-left">
                                <?= strlen($data->judul) <= 76 ? $data->judul : substr($data->judul, 0, 76).' ...' ?> 
                            </p>
                        </a>

                        <div class="ratting-author">
                            <h6>
                                <?php if($data->kategori == 1) : ?>
                                    <img src="<?= base_url() ?>/assets_frontend/img/hot.svg" width="70%" alt="">
                                <?php elseif ($data->kategori == 2) : ?>
                                    <img src="<?= base_url() ?>/assets_frontend/img/new.svg" width="70%" alt="">
                                <?php endif ?>
                            </h6>
                            <small class="text-right mt-2"><?= date('d/m/Y', strtotime($data->created_at)) ?></small>
                        </div>
                    </div>
                <?php endforeach; ?>
               
            </div>
            <div class="row text-center" style="margin-top: 4rem; margin-bottom: 5rem">
                <div class="col-12 text-center">
                    <?= $list_artikel_pager->links('btcorona', 'bootstrap_pagination') ?>
                </div>
            </div>
        </div>
    </section>

<?= $this->endSection() ?>