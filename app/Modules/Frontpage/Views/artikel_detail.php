<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
<section>
    <div class="container">
        <div class="row title-artikel" style="margin-top: 6rem">
            <div class="col-md-6">
                <div class="col-md-12">
                    <h3 class="display-6">Jenis Jenis Corporate Action</h3>
                </div>
                <div class="col-md-12">
                    <p>Kamis, 24 Juni 2022 - By Author Bagikan ke - </p>
                </div>
            </div>
            <div class="col-md-6 text-align-end">
                <img src="https://www.pngmart.com/files/8/Presentation-PNG-Image.png" height="150" alt="">
            </div>
        </div>
        <div class="row body-artikel">
            <div class="col-md-12 text-justify" style="margin-top: 4rem">
                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce
                posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis
                urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique
                senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.
                Aenean nec lorem. In porttitor. Donec laoreet nonummy augue. Suspendisse dui purus, scelerisque at,
                vulputate vitae, pretium mattis, nunc. Mauris eget neque at sem venenatis eleifend. Ut nonummy.
            </div>
        </div>
        <div class="row footer-artikel">
            <div class="col-md-12" style="margin-top: 4rem">
                <p style="margin-bottom: 0 !important">Penulis: <b style="font-weight: bold !important">Adinda</b> </p>
                <p style="margin-top: 0 !important">Sumber: </p>
            </div>
        </div>
        <div class="row text-center">
            <p class="col-md-12">Bagikan :</p>
        </div>
        <div class="row">
            <div class="alert alert-danger border-round">
                <h3 class="text-white">DISCLAIMER ON!</h3>
                <p class="text-white">Pandangan diatas merupakan pandangan dari PanenSAHAM, dan kami tidak bertanggung
                    jawab atas keuntungan atau kerugian yang diterima oleh investor dalam bertransaksi. Semua Keputusan
                    ada di tangan investor</p>
            </div>
        </div>
        <hr style="margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 1);">
        <div class="row">
            <div class="col-md-12">
                <b>Artikel Menarik Lainnya :</b>
            </div>
            <div class="col-md-12 mt-3">
                <div class="row">
                    <?php 
                        for($i = 1; $i <=3; $i++){ ?>
                    <div class="col-md-4">
                        <div class="col-md-12">
                            <img src="https://www.pngmart.com/files/8/Presentation-PNG-Image.png" width="100%" height=""
                                alt="">
                        </div>
                        <div class="col-md-12 mt-2">
                            Apa itu Pasar Modal
                        </div>
                    </div>
                    <?php    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>