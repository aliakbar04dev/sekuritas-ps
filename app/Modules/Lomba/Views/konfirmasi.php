<?= $this->extend('frontend/index') ?>

<?= $this->section('head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/lomba/css/style.css?v=<?= date('ymdhis') ?>">
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/lomba/js/datepicker/css/bootstrap-datepicker.min.css">
<?= $this->endSection(); ?>

<?= $this->section('body') ?>
    <div id="lomba">
        <div id="konfirmasi" class="container py-5">
            <div class="content p-4">
                <div class="heading">
                    Konfirmasi Pembayaran
                </div>

                <div class="px-3">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    
                    <form action="<?= site_url('lomba/konfirm_save') ?>" method="post" enctype='multipart/form-data'>
                        <?= csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= old('nama'); ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" value="<?= old('email'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Tanggal Pembayaran</label>
                                    <!-- <input type="text" name="tanggal_pembayaran" class="form-control datepicker" required readonly> -->
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control date-picker bg-white" name="tanggal_pembayaran" value="<?= old('tanggal_pembayaran'); ?>" required readonly>
                                        <div class="input-group-append">
                                            <button class="btn btn-submit" id="btn_calendar" type="button">
                                                <img src="<?= base_url('/assets_frontend/lomba/img/ico-calendar.png') ?>" alt="">
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Bank Pengirim</label>
                                    <input type="text" name="bank" class="form-control" value="<?= old('bank'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nama Pemilik Rekening</label>
                                    <input type="text" name="nama_rekening" class="form-control" value="<?= old('nama_rekening'); ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Nomor Rekening</label>
                                    <input type="text" name="nomor_rekening" class="form-control" value="<?= old('nomor_rekening'); ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Jumlah Bayar <span class="font-weight-light">(termasuk kode unik)</span></label>
                                    <input type="number" name="jumlah_bayar" class="form-control" value="<?= old('jumlah_bayar'); ?>" required>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label>Upload Bukti Pembayaran (optional)</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="bukti_pembayaran" value="<?= old('bukti_pembayaran'); ?>">
                                        <label class="custom-file-label" for="customFile">Browse</label>
                                    </div>
                                    <small class="form-text text-muted"><span class="text-danger">*</span>format jpeg/jpg/png max 1MB</small>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="mb-3">
                            <div class="g-recaptcha" data-callback="recaptchaCallback" data-sitekey="6LeFoW8bAAAAAINEObi_ll2LBv7IwhPJUJuVrQhE"></div>
                        </div> -->

                        <div class="text-center mt-3">
                            <button class="btn btn-submit px-5" type="submit">Konfirmasi</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
    <script src="<?= base_url() ?>/assets_frontend/lomba/js/jq-validation/jquery.validate.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/lomba/js/datepicker/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="//www.google.com/recaptcha/api.js"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();

            $('.date-picker').datepicker({
                format: 'dd/mm/yyyy',
            });

            $("#btn_calendar").click(function() {
                $(".date-picker").datepicker('show')
            });

            //form submit
            $("form").validate({
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
                rules: {
                    city: {
                        required:true,              
                        number: true,
                        notEqual: 0
                    },
                },
                messages: {
                    "minat[]": { 
                        minlength: jQuery.validator.format("Minimal pilih satu opsi.")
                    },
                    "sosmed[]": { 
                        minlength: jQuery.validator.format("Minimal pilih satu opsi.")
                    }
                },
                submitHandler: function(form) {

                    // var response = grecaptcha.getResponse();
                    // if (response.length == 0) {
                    //     Swal.fire(
                    //         'Alert!',
                    //         "please check I'm not a robot box",
                    //         'error'
                    //     );
                    //     return false;
                    // }else{
                    //     form.submit();
                    // }

                    form.submit();

                    return false;

                    e.preventDefault();
                }
            });
        });

        function recaptchaCallback() {
            $('#submitBtn').removeAttr('disabled');
        };
    </script>
<?= $this->endSection(); ?>