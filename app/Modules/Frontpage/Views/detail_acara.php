<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
<section>
    <div class="container">
        <div class="row" style="margin-top: 4rem">
            <div class="col-md-12">
                <div class="heading">
                    <h4 class="display-5" style="margin-bottom: 0">
                        Strategi Cuan di Kala Market Galau
                    </h4>
                    <p style="margin-top: 0">
                        14/15/16 Mei 202 | Bekasi, Kelapa Gading, Tangerang Selatan
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <img src="" alt="">
            </div>
            <div class="col-md-8">
                <div class="col-md-12">
                   <p>
                   Halo Sobat PanenSAHAM! Gimana Kabarnya? Semoga Luar Biasa ya
                   </p>
                   <p>Yuk untuk yang berada di Jakarta dan sekitarnya</p>
                </div>
                <?php for($i=1;$i<=3;$i++){ ?>
                    <div class="col-md-12">
                        <h6>Day <?= $i ?></h6>
                    </div>
                    <div class="col-md-12 mt-3">
                        Sabtu, 14 Mei 2022 <br>
                        09:30 - Selesai <br>
                        Kantor PanenSAHAM
                    </div>
                    <div class="col-md-12 mt-3">
                        Kuota: <b style="font-weight: bold !important"> 25 Orang </b>
                    </div>
                    <div class="col-md-8">
                    <hr style="margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 5px dashed rgba(0, 0, 0, 1);">
                    </div>
                <?php } ?>
                <div class="col-md-12">
                    <p>Untuk Info Lebih Lanjut, silahkan Hubungi WA kami di :<br>
                    Naufal <br>
                    Boy <br>
                    Aksal</p>
                </div>
            </div>
           
        </div>
        <div class="row">
            <div class="col-md-12">
            <hr style="margin-top: 1rem;
  margin-bottom: 1rem;
  border: 0;
  border-top: 1px solid rgba(0, 0, 0, 1);">
            </div>
            <div class="col-md-12" style="font-weight: bold">
                Event Lainnya :
            </div>
            <div class="col-md-12">
                <div class="row">
                <?php for($i = 1; $i <=3;$i++){ ?>
                  <div class="col-md-4">
                    <div class="col-md-12">
                        <img src="" alt="">
                    </div>
                    <div class="col-md-12">
                        Sell On May Go Away?
                    </div>
                    <div class="col-md-12">
                        
                    </div>
                  </div>
                <?php } ?>
                </div>
                <div class="row">
                   
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>
<?= $this->section('script') ?>
<?= $this->endSection() ?>