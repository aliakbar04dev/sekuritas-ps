<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>

    <?php if($mobile) : ?>
        <section class="mt-5">
            <div class="container">
                <div class="row mb-3" style="margin-top: -20px;">
                    <div class="col-12 tengah">
                        <h4>Panen SAHAM Sekuritas Indonesia sebagai Perusahaan Efek Non <br> Anggota Bursa yang merupakan Mitra Mandiri Sekuritas</h4>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12 text-center">
                        <p>Nikmati Kemudahan dan Kenyamanan Berinvestasi</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <div class="alert alert-warning" style="background-color: #FFF7E4; border-color:#D19200;">                        
                            <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Bisa</font> Dengan atau Tanpa NPWP</p>                         
                            <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Bebas</font> Pilih Rekening Tabungan Apa Saja</p>                        
                            <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Fleksibel</font> Tanpa Setoran Minimal</p>                             
                            <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Gratis</font> Edukasi Setiap Hari</p>
                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>

                <?= form_open(base_url('register_user'), ['id' => 'register-form']) ?>
                    <div class="row mb-3">
                            <div class="col-1"></div>
                            <div class="col-10">
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                        <label for="" class="tebel" style="font-size: 14px;">Nama Lengkap</label>
                                        <input type="text" name="full_name" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="tebel" style="font-size: 14px;">No Handphone</label>
                                        <input type="text" name="no_wa" class="form-control" required>
                                    </div>
                                    <div class="col-md-6 form-group" style="font-size: 14px;">
                                        <label for="" class="tebel">Alamat Email</label>
                                        <input type="email" name="email" class="form-control" required>
                                    </div>
                                    <?php if(!empty($referal_id)): ?>
                                        <div class="col-md-6 form-group">
                                            <label for="" class="tebel" style="font-size: 14px;">Kode Yang Mereferensikan</label>
                                            <input type="text" name="referal_submit" value="<?= $referal_id ?>" class="form-control" readonly>
                                            <input type="hidden" name="referal_submit" value="<?= $referal_id ?>">
                                        </div> 
                                    <?php else: ?>

                                    <?php endif; ?>

                                    <div class="col-md-6 form-group">
                                        <label for="" class="tebel" style="font-size: 14px;">Nama Yang Mereferensikan</label>
                                        <?php if(!empty($referal_id)): ?>
                                            <input type="text" name="nama_referal" placeholder="Isi jika ada" class="form-control">
                                        <?php else: ?>
                                            <input type="text" name="referal_submit" class="form-control">
                                        <?php endif; ?>
                                    </div> 
                                    <div class="col-md-6 form-group" style="font-size: 14px;">
                                        <label for="" class="tebel">Provinsi</label>
                                        <select name="provinsi" id="provinsi" class="form-control" required>
                                            <option value="">Pilih Provinsi</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="tebel" style="font-size: 14px;">Kota/Kabupaten</label>
                                        <select name="region_id" class="form-control" id="kota" required>
                                            <option value="">Pilih Kabupaten/Kota</option>
                                        </select>
                                    </div>
                                    <div class="col-md-12 text-center">
                                        <div class="g-recaptcha" data-sitekey="6LfQU_sgAAAAAP8icLMfbB7KZXGEeQYfc29yGxKZ" data-callback="successCaptcha" data-expired-callback="reloadPage" data-error-callback="reloadPage"></div>
                                    </div>

                                    <div class="col-md-12 mt-3 mb-4 text-center">
                                        <button class="btn btn-warning pl-4 pr-4" style=" border:none;"><font class="tebel putih" style="font-size: 22px;">DAFTAR SEKARANG!</font> <br> <font class="putih" style="font-size: 13px;">Lanjut Membuka Rekening Saham!</font></button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-1"></div>
                    </div>
                <?= form_close() ?>


                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">
                        <p class="justify" style="font-size: 14px;">
                            Sebagai Informasi, pada halaman berikutnya anda akan menemukan Nama dan Logo <font class="tebel">PT Carmel Sekuritas Nusantara</font> yang saat ini telah berganti nama menjadi <font class="tebel">PT PanenSAHAM Sekuritas Indonesia</font> yang terdaftar dan diawasi oleh Otoritas Jasa Keuangan (OJK).
                        </p>
                    </div>
                    <div class="col-1"></div>
                    </div>


                <div class="row mt-3 mb-5 text-center py-auto">
                    <div class="col-lg-4 offset-lg-4 col-sm-4 offset-sm-3">
                            <img src="<?= base_url('assets_frontend/img/halaman_registrasi/pengumuman-perubahan-nama.svg') ?>" width="300" alt="">
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="mt-5">
            <div class="container">
            <div class="row mb-3">
                <div class="col-12 text-center">
                    <h4>Panen SAHAM Sekuritas Indonesia sebagai Perusahaan Efek Non <br> Anggota Bursa yang merupakan Mitra Mandiri Sekuritas</h4>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 text-center">
                    <p>Nikmati Kemudahan dan Kenyamanan Berinvestasi</p>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="alert alert-warning" style="background-color: #FFF7E4; border-color:#D19200;">
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Bisa</font> Dengan atau Tanpa NPWP</p>
                            </div>
                            <div class="col-md-6">
                                <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Bebas</font> Pilih Rekening Tabungan Apa Saja</p>
                            </div>
                            <div class="col-md-6">
                                <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Fleksibel</font> Tanpa Setoran Minimal</p>
                            </div>
                            <div class="col-md-6">
                                <p style="font-size: 14px;"><img src="<?= base_url() ?>/assets_frontend/img/ceklis_oren.svg" width="30" class="mr-2"><font class="tebel">Gratis</font> Edukasi Setiap Hari</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>

            <?= form_open(base_url('register_user'), ['id' => 'register-form']) ?>

                <div class="row mb-3">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="" class="tebel" style="font-size: 14px;">Nama Lengkap</label>
                                    <input type="text" name="full_name" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="" class="tebel" style="font-size: 14px;">No Handphone</label>
                                    <input type="text" name="no_wa" class="form-control" required>
                                </div>
                                <div class="col-md-6 form-group" style="font-size: 14px;">
                                    <label for="" class="tebel">Alamat Email</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <?php if(!empty($referal_id)): ?>
                                    <div class="col-md-6 form-group">
                                        <label for="" class="tebel" style="font-size: 14px;">Kode Yang Mereferensikan</label>
                                        <input type="text" name="referal_submit" value="<?= $referal_id ?>" class="form-control" readonly>
                                        <input type="hidden" name="referal_submit" value="<?= $referal_id ?>">
                                    </div> 
                                <?php else: ?>

                                <?php endif; ?>

                                <div class="col-md-6 form-group">
                                    <label for="" class="tebel" style="font-size: 14px;">Nama Yang Mereferensikan</label>
                                    <?php if(!empty($referal_id)): ?>
                                        <input type="text" name="nama_referal" placeholder="Isi jika ada" class="form-control">
                                    <?php else: ?>
                                        <input type="text" name="referal_submit" class="form-control">
                                    <?php endif; ?>
                                </div> 
                               
                                <div class="col-md-6 form-group" style="font-size: 14px;">
                                    <label for="" class="tebel">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-control" required>
                                        <option value="">Pilih Provinsi</option>
                                    </select>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="" class="tebel" style="font-size: 14px;">Kota/Kabupaten</label>
                                    <select name="region_id" class="form-control" id="kota" required>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div class="g-recaptcha" data-sitekey="6LfQU_sgAAAAAP8icLMfbB7KZXGEeQYfc29yGxKZ" data-callback="successCaptcha" data-expired-callback="reloadPage" data-error-callback="reloadPage"></div>
                                </div>
                                <div class="col-md-12 text-center">
                                    <div id="recaptcha-error" style="color:red"></div>
                                </div>
                                <div class="col-md-12 mt-3 mb-4 text-center">
                                    <button id="btn-submit" type="submit"  class="btn btn-warning pl-4 pr-4" style=" border:none;"><font class="tebel putih" style="font-size: 22px;">DAFTAR SEKARANG!</font> <br> <font class="putih" style="font-size: 13px;">Lanjut Membuka Rekening Saham!</font></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-2"></div>
                </div>
            <?= form_close() ?>


            <div class="row mt-3">
                <div class="col-1"></div>
                <div class="col-10">
                    <p class="justify">
                        Sebagai Informasi, pada halaman berikutnya anda akan menemukan Nama dan Logo <font class="tebel">PT Carmel Sekuritas Nusantara</font> yang saat ini telah berganti nama menjadi <font class="tebel">PT PanenSAHAM Sekuritas Indonesia</font> yang terdaftar dan diawasi oleh Otoritas Jasa Keuangan (OJK).
                    </p>
                </div>
                <div class="col-1"></div>
            </div>

            <div class="row mt-3 mb-5 text-center py-auto">
                <div class="col-lg-4 offset-lg-4 col-sm-4 offset-sm-3">
                    <img src="<?= base_url('assets_frontend/img/halaman_registrasi/pengumuman-perubahan-nama.svg') ?>" alt="">
                </div>
            </div>

            </div>
        </section>
    <?php endif ?>
    
<?= $this->endSection() ?>
<?= $this->section('script') ?>
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback" async defer></script>

<script>
    function onloadCallback(){
        // console.log('Captcha Loaded !');
        $('.g-recaptcha > div').addClass('mx-auto');

    }
    function reloadPage(){
        window.location.reload();
    }
    function successCaptcha(){
    }
    
    
    $(document).ready(function(){
        $.ajax({
            method: 'GET',
            url: "<?= base_url('region') ?>",
            success: function(data){
                let result = data.provinsi;
                $('#provinsi').selectize()[0].selectize.destroy();
                data.provinsi.map(function(i,v){
                   $('#provinsi').append('<option value="'+i.id+'">'+i.nama+'</option>');
                })
                $('#provinsi').selectize({create: false})

            }
        })

        $('#provinsi').on('change', function(){
            let output = '<option value="">Pilih Kabupaten/Kota</option>';
            ajaxLoader.show();
            $.ajax({
                method: 'GET',
                url: "<?= base_url('region').'?id_provinsi=' ?>"+this.value,
                success: function(data){
                    let result = data.provinsi;
                    $('#kota').selectize()[0].selectize.destroy();
                    ajaxLoader.hide();
                    data.kota_kabupaten.map(function(i,v){
                        output = output + '<option value="'+i.id+'">'+i.nama+'</option>';
                        $('#kota').html(output)
                    })
                    $('#kota').selectize({create: false})
                }
            })
        })

        $('#register-form').on('submit', function(e){
            e.preventDefault();
            let id = $(this).attr('id');
            let recaptchaResp = grecaptcha.getResponse();
            if(recaptchaResp == ''){
                $('#recaptcha-error').html('<font style="font-size: 14px;">reCAPTCHA harus terisi</font>');
                return false;
            }
            let result = $(this).submitAjaxRegister('#'+id, e);
            if(result.error != undefined && result.error != ''){
                Object.keys(result.error).forEach(function(i){
                    $('input[name='+i+']').notify(result.error[i], 'error')
                    $('select[name='+i+']').siblings('.selectize-control').notify(result.error[i], 'error')
                    $('select[name='+i+']').not('.selectized').notify(result.error[i], 'error')
                })
            }
        })
    })
</script>
<?= $this->endSection() ?>