<?= $this->extend('frontend/index') ?>

<?= $this->section('head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/lomba/css/style.css?v=<?= date('ymdhis') ?>">
    <link href="<?= base_url() ?>/assets_frontend/lomba/js/int-tel-input/css/intlTelInput.min.css" rel="stylesheet">

    <style>
        .iti {
            display: block;
        }
        .iti__flag-container {
            max-height: 43px;
        }
    </style>
<?= $this->endSection(); ?>

<?= $this->section('body') ?>

    <div id="lomba">
        <div id="main-banner">
            <div class="pc">
                <img src="<?= base_url() ?>/assets_frontend/lomba/img/banner-lomba.jpg" class="w-100" alt="">
            </div>
            <h1><?= $title; ?></h1>
        </div>

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="form-heading">
                        <p>Selamat datang di halaman registrasi. Silahkan isi pertanyaan & data diri di bawah ini untuk mengikuti PanenSaham Online Trading Competition 2022.</p>
                        <p><strong class="font-weight-bold">Are you ready to be the next champion?</strong></p>
                    </div>

                    <form id="form-lomba" action="<?= site_url('lomba/save') ?>" method="post">
                        <?= csrf_field(); ?>

                        <ul class="nav nav-tabs d-none <?= 'active-'.$step ?>">
                            <li class="nav-item">
                                <a class="nav-link <?= ($step == 1) ? 'active' : '' ?> " href="#">1. Pilih Cabang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($step == 2) ? 'active' : '' ?>" href="#">2</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link <?= ($step == 3) ? 'active' : '' ?>" href="#">3</a>
                            </li>
                        </ul>

                        <!-- <div class="box <?= ($step == 1) ? 'active' : '' ?>" id="step-1">
                            

                            <div class="box-footer">
                                <button class="btn btn-submit" type="button" onclick="next_form(2)">Selanjutnya</button>
                            </div>
                        </div> -->

                        <div class="box <?= ($step == 2) ? 'active' : '' ?>" id="step-2">

                            <div class="item">
                                <div class="q">
                                    <span>1. Pilih Cabang</span>
                                </div>
                                <div class="a">
                                    <p>Pilih Cabang PanenSAHAM Sekuritas Indonesia terdekat dari domisili Anda:</p>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cabang" id="cb-1" value="Jakarta" checked>
                                        <label class="form-check-label" for="cb-1">
                                            Jakarta
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cabang" id="cb-2" value="Semarang">
                                        <label class="form-check-label" for="cb-2">
                                            Semarang
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cabang" id="cb-3" value="Surabaya">
                                        <label class="form-check-label" for="cb-3">
                                            Surabaya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cabang" id="cb-4" value="Padang">
                                        <label class="form-check-label" for="cb-4">
                                            Padang
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cabang" id="cb-5" value="Balikpapan">
                                        <label class="form-check-label" for="cb-5">
                                            Balikpapan
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cabang" id="cb-6" value="Banjarmasin">
                                        <label class="form-check-label" for="cb-6">
                                            Banjarmasin
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cabang" id="cb-7" value="Makassar">
                                        <label class="form-check-label" for="cb-7">
                                            Makassar
                                        </label>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="item">
                                <div class="q">
                                    <span>2. Data Peserta</span>
                                </div>
                                <div class="a">
                                    <p>Silahkan isi data diri Anda dibawah ini:</p>
                                
                                    <div class="form-group">
                                        <label>Nama Lengkap:</label>
                                        <input type="text" name="nama" class="form-control" placeholder="contoh John Doe..." required>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-block">Nomor Telepon/WhatsApp:</label>
                                        <input type="text" name="telepon" class="form-control phone-format" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="johndoe@gmail.com" required>
                                    </div>

                                    <h4 class="mt-5">Apakah Anda nasabah PanenSAHAM Sekuritas Indonesia?</h4>
                                    <div class="mt-1 mb-3">
                                        *Dapatkan <span class="font-weight-bold">diskon 50%</span> biaya pendaftaran dengan menjadi nasabah PanenSAHAM Sekuritas Indonesia
                                    </div>
                                    <div class="form-check form-group">
                                        <input class="form-check-input" type="radio" name="nasabah" id="nasabah-1" value="Nasabah" required>
                                        <label class="form-check-label" for="nasabah-1">
                                            Nasabah
                                        </label>
                                        <div id="cek-nasabah" class="input-group mb-0" style="max-width: 300px;">
                                            <input type="hidden" name="client_id" class="input-client-id f-input" id="client_id_valid">
                                            <input type="text" name="cek_client_id" class="form-control f-input" placeholder="Masukkan Client ID...">
                                            <div class="input-group-append">
                                                <button class="btn btn-warning text-white cek-client-id" type="button">CEK</button>
                                            </div>
                                        </div>
                                        <small class="form-text text-muted mb-2">
                                            <span class="badge badge-warning">Klik Cek Client ID untuk memastikan anda mendapatkan diskon.</span>
                                        </small>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nasabah" id="nasabah-2" value="Tertarik menjadi nasabah" required>
                                        <label class="form-check-label" for="nasabah-2">
                                            Tertarik menjadi nasabah

                                            <div class="mt-1 mb-2">
                                                <div class="text-muted">
                                                    Silahkan buka tautan dibawah ini untuk mendaftar menjadi nasabah PanenSAHAM Sekuritas Indonesia:
                                                </div>
                                                <a class="text-yellow" href="https://sekuritas.panensaham.com/register/oa/compepsi" target="_blank">www.sekuritas.panensaham.com/open_acc</a>
                                            </div>
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nasabah" id="nasabah-3" value="Tidak tertarik menjadi nasabah" required>
                                        <label class="form-check-label" for="nasabah-3">
                                            Tidak tertarik menjadi nasabah
                                        </label>
                                    </div>

                                    <h4 class="mt-5">Apakah Anda ingin mendaftar bersama teman?</h4>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bersama_teman" id="bersama_teman-1" value="Ya" required>
                                        <label class="form-check-label" for="bersama_teman-1">
                                            Ya, saya mendaftar bersama teman
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="bersama_teman" id="bersama_teman-2" value="Tidak" required>
                                        <label class="form-check-label" for="bersama_teman-2">
                                            Tidak, saya mendaftar sendiri
                                        </label>
                                    </div>

                                    <div id="teman-wrap" style="display:none">
                                        <h4 class="mt-5">Silahkan isi data teman Anda dibawah ini:</h4>
                                        <div class="clonable-block" data-toggle="cloner">
                                            <div class="clonable" data-clone-number="1">
                                                <div class="text-right">
                                                    <button type="button" class="clonable-button-close btn btn-danger">Delete</button>
                                                </div>

                                                <div class="form-group">
                                                    <label>Nama Lengkap:</label>
                                                    <input id="teman_nama_1" type="text" class="f-input form-control clonable-increment-id clonable-increment-name" name="teman[0][nama]" placeholder="contoh John Doe...">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nomor Telepon/WhatsApp:</label>
                                                    <input id="teman_telepon_1" type="number" class="f-input form-control clonable-increment-id clonable-increment-name" name="teman[0][telepon]" placeholder="08122334455">
                                                </div>
                                                <div class="form-group">
                                                    <label>Alamat Email:</label>
                                                    <input id="teman_email_1" type="email" class="f-input form-control clonable-increment-id clonable-increment-name" name="teman[0][email]" placeholder="johndoe@gmail.com">
                                                </div>
                                                <div class="form-check form-group">
                                                    <input class="check-nasabah f-input form-check-input clonable-increment-id clonable-increment-name" type="radio" name="teman[0][nasabah]" id="teman_nasabah_y_1" value="Ya">
                                                    <label class="form-check-label clonable-increment-for" for="teman_nasabah_y_1">
                                                        Nasabah

                                                        <div class="input-group mb-0">
                                                            <input type="hidden" name="teman[0][client_id]" class="input-client-id clonable-increment-id clonable-increment-name" id="teman_client_id_1">
                                                            <input type="text" name="teman[0][cek_client_id]" class="form-control" placeholder="Masukkan Client ID...">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-warning text-white cek-client-id" type="button">CEK</button>
                                                            </div>
                                                        </div>
                                                        <small class="form-text text-muted mb-2">
                                                            <span class="badge badge-warning">Klik Cek Client ID untuk memastikan anda mendapatkan diskon.</span>
                                                        </small>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="check-nasabah f-input form-check-input clonable-increment-id clonable-increment-name" type="radio" name="teman[0][nasabah]" id="teman_nasabah_tt_1" value="Tertarik menjadi nasabah">
                                                    <label class="form-check-label" for="teman_nasabah_tt_1">
                                                        Tertarik menjadi nasabah

                                                        <div class="mt-1 mb-2">
                                                            <div class="text-muted">
                                                                Silahkan buka tautan dibawah ini untuk mendaftar menjadi nasabah PanenSAHAM Sekuritas Indonesia:
                                                            </div>
                                                            <a class="text-yellow" href="https://sekuritas.panensaham.com/register/oa/compepsi" target="_blank">www.sekuritas.panensaham.com/open_acc</a>
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="check-nasabah f-input form-check-input clonable-increment-id clonable-increment-name" type="radio" name="teman[0][nasabah]" id="teman_nasabah_t_1" value="Tidak">
                                                    <label class="form-check-label clonable-increment-for" for="teman_nasabah_t_1">
                                                        Tidak tertarik menjadi nasabah
                                                    </label>
                                                </div>
                                            </div>
                                            <button class="clonable-button-add btn btn-dark px-4" type="button">Tambah Peserta Lain</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <div class="mt-4">
                                *Dapatkan tambahan <strong>Diskon 10%</strong> biaya pendaftaran dengan mendaftar bersama teman.
                            </div>

                            <div class="box-footer mt-5">
                                <!-- <button class="btn btn-secondary" type="button" onclick="back_form(1)">Kembali</button> -->
                                <button class="btn btn-submit" type="button" onclick="next_form(3)">Selanjutnya</button>
                            </div>
                        </div>

                        <div class="box <?= ($step == 3) ? 'active' : '' ?>" id="step-3">
                            <p>Berikut rincian biaya pendaftaran <span class="font-weight-bold">PanenSaham Online Trading Competition 2022:</span></p>
                            
                            <div class="table-responsive">
                                <table class="table table-borderless table-sm mb-3">
                                    <tr>
                                        <td class="text-left">Early Bird</td>
                                        <td>:</td>
                                        <td class="text-left"><b>Rp 100.000,-</b> (periode 17 Oktober - 25 Desember 2022)</td>
                                    </tr>
                                    <tr>
                                        <td class="text-left">Reguler</td>
                                        <td>:</td>
                                        <td class="text-left"><b>Rp 150.000,-</b> (periode 26 - 31 Desember 2022)</td>
                                    </tr>
                                </table>
                            </div>

                            <div class="table-responsive mb-3">
                                <table id="tabel-harga" class="table table-bordered mb-3">
                                    <tr>
                                        <th class="heading">Tabel Harga</th>
                                        <th>Non Nasabah</th>
                                        <th class="c1">Non Nasabah & Ajak Teman</th>
                                        <th class="c2">Nasabah</th>
                                        <th class="c3">Nasabah & <br> Ajak Teman</th>
                                    </tr>
                                    <tr class="early">
                                        <td>Early Bird</td>
                                        <td>Rp 100.000,-</td>
                                        <td><b>Rp 90.000,-</b> <br> (hemat 10%)</td>
                                        <td><b>Rp 50.000,-</b> <br> (hemat 50%)</td>
                                        <td><b>Rp 40.000,-</b> <br> (hemat 60%)</td>
                                    </tr>
                                    <tr>
                                        <td>Reguler</td>
                                        <td>Rp 150.000,-</td>
                                        <td><b>Rp 135.000,-</b> <br> (hemat 10%)</td>
                                        <td><b>Rp 75.000,-</b> <br> (hemat 50%)</td>
                                        <td><b>Rp 60.000,-</b> <br> (hemat 60%)</td>
                                    </tr>
                                </table>
                            </div>
                            
                            <p><b>Pembayaran Pendaftaran:</b> Bank Mandiri 1250014629059 (PT Carmel Anugerah Cemerlang)</p>

                            <hr>

                            <table class="table table-bordered" id="cart" class="mb-5 mt-5">
                                
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tagihan</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                            </table>
                            <div id="total-wrap" class="text-center mb-5 mt-5">
                                <h3>Total Tagihan Biaya</h3>
                                <div id="total">Rp 235.120,-</div>
                                <input type="hidden" id="total_value" name="total_value">
                            </div>

                            <p class="text-muted mb-3">Silahkan bayar sesuai dengan total tagihan yang tertera. Kode unik diterapkan di akhir nominal sebagai elemen keamanan saat transaksi.</p>

                            <div class="box-footer d-flex justify-content-between mt-5">
                                <button class="btn btn-secondary" type="button" onclick="back_form(2)">Kembali</button>
                                <button class="btn btn-submit px-5" type="submit">DAFTAR</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?= $this->endSection(); ?>

<?= $this->section('script') ?>

    <script src="<?= base_url() ?>/assets_frontend/lomba/js/jq-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/lomba/js/jquery.cloner.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/lomba/js/int-tel-input/js/intlTelInput-jquery.min.js"></script>

    <script>
        $(function() {
            if($(".phone-format").length){
                var iti = $(".phone-format").intlTelInput({
                    preferredCountries: ["id","sg"],
                    hiddenInput: "telepon",
                    nationalMode: false,
                    utilsScript: "<?= base_url('assets_frontend/lomba/js/int-tel-input/js/utils.js') ?>",
                    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                        str = selectedCountryPlaceholder.replace(/-/g, '');
                        return str = str.replace(/\s+/g, '');
                    },
                });			
            };

            $('input[type=radio][name=nasabah]').change(function() {
                if (this.value == 'Nasabah') {
                    // $("#teman-wrap").show();
                    $('#cek-nasabah').closest('.form-group').find( ".input-group" ).show();
                    $('#cek-nasabah').closest('.form-group').find( ".badge" ).show();
                    $('#cek-nasabah .f-input').prop('required',true);
                    $('#cek-nasabah .f-input').rules('add', 'required');
                }
                else{
                    // $("#teman-wrap").hide();
                    $('#cek-nasabah .f-input').prop('required',false);
                    $('#cek-nasabah .f-input').rules('remove', 'required');
                    $('#cek-nasabah').closest('.form-group').find( ".input-group" ).hide();
                    $('#cek-nasabah').closest('.form-group').find( ".badge" ).hide();
                }
            });

            $('input[type=radio][name=bersama_teman]').change(function() {
                if (this.value == 'Ya') {
                    $("#teman-wrap").show();
                    $('.clonable-source .f-input').prop('required',true);
                }
                else if (this.value == 'Tidak') {
                    $("#teman-wrap").hide();
                    $('.clonable-source .f-input').prop('required',false);
                }
            });

            // $('.check-nasabah').change(function() {
            //     console.log(this);
            //     if (this.value == 'Ya') {
            //         $(this).closest('.form-group').find( ".input-group" ).show();
            //         $(this).closest('.form-group').find( ".badge" ).show();
            //         $(this).closest('.form-group').find( ".form-control" ).prop('required',true);
            //         $(this).closest('.form-group').find( ".form-control" ).rules('add', 'required');
            //     }
            //     else{
            //         $(this).closest('.form-group').find( ".input-group" ).hide();
            //         $(this).closest('.form-group').find( ".badge" ).hide();
            //         $(this).closest('.form-group').find( ".form-control" ).prop('required',false);
            //         $(this).closest('.form-group').find( ".form-control" ).rules('remove', 'required');
            //     }
            // });

            //form validation
            var form = $( "#form-lomba" );
            form.validate({
                // errorLabelContainer: ".messageBox",
                errorClass: "error invalid-feedback",
                highlight: function(element) {
                    $(element)
                        .addClass('is-invalid')
                        .removeClass('is-valid')
                        .parent()
                        .removeClass('has-success')
                        .addClass('has-danger');
                },
                success: function(label, element) {
                    $(element)
                        .removeClass('is-invalid')
                        .addClass('is-valid')
                        .parent()
                        .removeClass('has-danger')
                        .addClass('has-success')
                        .find('label.error')
                        .remove();
                },
                errorPlacement: function(error, element) {
                    if (element.attr('type') == 'radio' || element.attr('type') == 'checkbox') {
                        error.appendTo(element.closest('.form-group'));
                    } else {
                        error.insertAfter(element);
                    }
                },
                submitHandler: function(form) {
                    // var response = grecaptcha.getResponse();
                    // if (response.length == 0) {
                    //     alertify.alert("Alert!", "please check I'm not a robot box");
                    //     return false;
                    // }else{
                    //     form.submit();
                    // }

                    form.submit();

                    return false;
                    e.preventDefault();
                }
            });

            //cek klien id
            $( ".cek-client-id" ).each(function(index) {
                $(this).on("click", function(){
                    // var index = $( this ).index();
                    var button = $(this);

                    // var client_id = $('input[name="teman[0][client_id]"]').val();
                    var client_id = button.closest('.input-group').find( ".form-control" ).val();
                    console.log(client_id);

                    if(client_id){
                        $("#preloader").show();

                        $.ajax({
                            type: "POST",
                            url: "<?= site_url('lomba/cekid') ?>",
                            data: {
                                'cms_token' : $('input[name=cms_token]').val(),
                                'client_id' : client_id
                            },
                            dataType: "json",
                            encode: true,
                        }).done(function (response) {
                            $('input[name=cms_token]').val(response.token);

                            if(response.data.status == 200){
                                button.closest('.input-group').find( ".input-client-id" ).val(response.data.data.client_id);
                                button.closest('.form-group').find( ".badge" ).removeClass('badge-warning');
                                button.closest('.form-group').find( ".badge" ).addClass('badge-success');
                                button.closest('.form-group').find( ".badge" ).html('Client ID Valid, Anda berhasil mendapatkan diskon Nasabah');

                                Swal.fire(
                                    'Info',
                                    'Client ID Valid',
                                    'success'
                                );
                            }else{
                                Swal.fire(
                                    'Alert!',
                                    'Client ID tidak ditemukan',
                                    'error'
                                );

                                button.closest('.input-group').find( ".input-client-id" ).val('');
                                button.closest('.form-group').find( ".badge" ).removeClass('badge-success');
                                button.closest('.form-group').find( ".badge" ).addClass('badge-warning');
                                button.closest('.form-group').find( ".badge" ).html('Klik Cek Client ID untuk memastikan anda mendapatkan diskon.');
                            }

                            $("#preloader").hide();
                        });

                    }else{
                        Swal.fire(
                            'Alert!',
                            'Client ID Kosong',
                            'error'
                        );
                    }

                    
                });
            });
        });
        function next_form(idx){
            var prev = parseInt(idx) - parseInt(1);

            if(idx == 2){
                set_active(idx);

                $( ".nav-tabs li:nth-child("+ prev +") a" ).html("1");
                $( ".nav-tabs li:nth-child("+ idx +") a" ).html("2. Data Peserta");

            }else if(idx == 3){
                var form = $( "#form-lomba" );
                form.validate();
                if(form.valid()){

                    $("#preloader").show();
                    $.ajax({
                        type: "POST",
                        url: "<?= site_url('lomba/cek_harga') ?>",
                        data: $('#form-lomba').serialize(),
                        dataType: "json",
                        encode: true,
                    }).done(function (response) {
                        $('input[name=cms_token]').val(response.token);

                        var counter = 1;
                        jQuery.each(response.cart, function(index, item) {
                            $('#cart > tbody:last-child').append('<tr><td>'+counter+'</td><td>'+item+'</td></tr>');
                            counter++;
                        });

                        // $("#cart").html(response.cart);
                        $("#total").html(response.grand_text);
                        $("#total_value").val(response.grand);

                        set_active(idx);

                        $( ".nav-tabs li:nth-child("+ prev +") a" ).html("2");
                        $( ".nav-tabs li:nth-child("+ idx +") a" ).html("3. Rincian Biaya");

                        console.log(response);
                        $("#preloader").hide();
                    });

                    
                }
            }
        }

        function back_form(idx){
            var next = parseInt(idx) + parseInt(1);

            if(idx == 1){
                set_previous(idx);

                $( ".nav-tabs li:nth-child("+ idx +") a" ).html("1. Pilih Cabang");
                $( ".nav-tabs li:nth-child("+ next +") a" ).html("2");
            }
            else if(idx == 2){

                $('#cart > tbody:last-child').html('');

                set_previous(idx);

                $( ".nav-tabs li:nth-child("+ idx +") a" ).html("2. Data Peserta");
                $( ".nav-tabs li:nth-child("+ next +") a" ).html("3");
            }
        }

        function set_active(idx){
            var prev = parseInt(idx) - parseInt(1);

            $(".box").removeClass('active');
            $("#step-" + idx).addClass('active');

            $(".nav-tabs").removeClass('active-' + prev);
            $(".nav-tabs").addClass('active-' + idx);

            $( ".nav-tabs li:nth-child("+ prev +") a" ).removeClass("active");
            $( ".nav-tabs li:nth-child("+ idx +") a" ).addClass("active");
        }

        function set_previous(idx){
            var next = parseInt(idx) + parseInt(1);

            $(".box").removeClass('active');
            $("#step-" + idx).addClass('active');

            $(".nav-tabs").removeClass('active-' + next);
            $(".nav-tabs").addClass('active-' + idx);

            $( ".nav-tabs li:nth-child("+ next +") a" ).removeClass("active");
            $( ".nav-tabs li:nth-child("+ idx +") a" ).addClass("active");
        }
    </script>

<?= $this->endSection(); ?>