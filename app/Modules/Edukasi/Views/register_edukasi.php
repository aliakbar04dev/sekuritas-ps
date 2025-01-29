<?= $this->extend('frontend/index') ?>

<?= $this->section('head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/edukasi/css/style.css?v=<?= date('ymdhis') ?>">
    <link href="<?= base_url() ?>/assets_frontend/lomba/js/int-tel-input/css/intlTelInput.min.css" rel="stylesheet">
    <style>
        .iti {
            display: block;
        }
    </style>
<?= $this->endSection(); ?>

<?= $this->section('body') ?>

    <div id="edukasi">
        <div id="main-header">
            <h1>Formulir Registrasi</h1>
        </div>
        <div id="main-content">
            <div id="info">
                <div class="text-center">
                    <h3><?= $edukasi->nama_edukasi ?></h3>
                </div>
                <table class="table table-borderless table-sm">
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td>
                            <?php 
                            $date=date_create($edukasi->tanggal_edukasi);
                            echo $tanggal_edukasi = date_format($date,"d F Y");
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Tempat Acara</td>
                        <td>:</td>
                        <td><?= $edukasi->tempat_acara ?></td>
                    </tr>
                    <tr>
                        <td>Waktu Acara</td>
                        <td>:</td>
                        <td><?= $edukasi->waktu_acara ?></td>
                    </tr>
                    <tr>
                        <td>Pembicara</td>
                        <td>:</td>
                        <td><?= $edukasi->pembicara ?></td>
                    </tr>
                    <tr>
                        <td>Level Edukasi</td>
                        <td>:</td>
                        <td><?= $edukasi->level_edukasi ?></td>
                    </tr>
                </table>
            </div>
            <form id="form-edukasi" action="<?= site_url('edukasi/save') ?>" method="post">
                <?= csrf_field(); ?>

                <input type="hidden" value="<?= $edukasi->id ?>" name="id_edukasi">
                <input type="hidden" value="<?= current_url() ?>" name="redirect">
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Alamat Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label class="d-block">No Handphone</label>
                    <input type="text" name="handphone" class="form-control phone-format" required>
                </div>
                <div class="form-group">
                    <label>Client ID</label>
                    <input type="text" name="client_id" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Kode Referal</label>
                    <input type="text" name="kode_referal" class="form-control" value="<?= ($referal != '') ? $referal : ''; ?>" <?= ($referal != '') ? 'readonly' : ''; ?>>
                </div>
                <!-- <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="check" id="check-input" required>
                    <label class="form-check-label" for="check-input">Dengan ini Saya sudah membaca & menyetujui <a href="#" class="text-orange" data-toggle="modal" data-target="#modal-tnc">Syarat & Ketentuan</a> yang berlaku</label>
                </div> -->
                <!-- <div class="mb-3">
                    <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeFoW8bAAAAAINEObi_ll2LBv7IwhPJUJuVrQhE"></div>
                </div> -->

                <div class="text-center mt-5">
                    <button class="btn btn-submit px-5" type="submit">Konfirmasi</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal-tnc" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Syarat & Ketentuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </div>

    <?php 
    $request = service('request');
    $status = $request->getGet('status');

    if($status == 'ok'){
        ?>
        <div class="modal fade" id="modal-thanks" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Terima Kasih</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Selamat anda telah terdaftar pada edukasi <strong class="font-weight-bold"><?= $edukasi->nama_edukasi ?></strong> tanggal <strong class="font-weight-bold"><?= $tanggal_edukasi ?></strong>.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }

    ?>

<?= $this->endSection(); ?>

<?= $this->section('script') ?>

    <script src="<?= base_url() ?>/assets_frontend/lomba/js/jq-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/lomba/js/int-tel-input/js/intlTelInput-jquery.min.js"></script>
    <script src="//www.google.com/recaptcha/api.js"></script>

    <script>
        $(function() {
            if($(".phone-format").length){
                var iti = $(".phone-format").intlTelInput({
                    preferredCountries: ["id","sg"],
                    hiddenInput: "handphone",
                    nationalMode: false,
                    utilsScript: "<?= base_url('assets_frontend/lomba/js/int-tel-input/js/utils.js') ?>",
                    customPlaceholder: function(selectedCountryPlaceholder, selectedCountryData) {
                        str = selectedCountryPlaceholder.replace(/-/g, '');
                        return str = str.replace(/\s+/g, '');
                    },
                });			
            };
            //form validation
            var form = $( "#form-edukasi" );
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

                    var response = grecaptcha.getResponse();
                    if (response.length == 0) {
                        Swal.fire(
                            'Alert!',
                            "please check I'm not a robot box",
                            'error'
                        );
                        return false;
                    }else{
                        form.submit();
                    }

                    return false;

                    e.preventDefault();
                }
            });
        });

        $(window).on('load',function(){
            if($('#modal-thanks').length){
                $('#modal-thanks').modal('show');
            }
        });
    </script>

<?= $this->endSection(); ?>