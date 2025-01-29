<?= $this->extend('frontend/index') ?>

<?= $this->section('head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/edukasi/css/style.css?v=<?= date('ymdhis') ?>">
<?= $this->endSection(); ?>

<?= $this->section('body') ?>

    <div id="edukasi">
        <div id="main-header">
            <h1>Terimakasih Sudah Hadir</h1>
        </div>
        <div id="main-content">
            <div class="text-center">
                <?php 
                    $date=date_create($edukasi->tanggal_edukasi);
                    $tanggal_edukasi = date_format($date,"d F Y");
                ?>
                Selamat, anda telah berhasil mengisi daftar hadir pada acara Edukasi <strong><?= $edukasi->nama_edukasi ?></strong> pada tanggal <strong><?= $tanggal_edukasi ?> <?= $edukasi->waktu_acara ?></strong>.
            </div>
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
    <script src="//www.google.com/recaptcha/api.js"></script>

    <script>
        $(function() {
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