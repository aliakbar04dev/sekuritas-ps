<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- SEO Meta description -->
    <meta name="keywords" content="Panen Saham, Saham, Edukasi Saham">
    <meta name="description" content="PanenSAHAM Sekuritas Indonesia merupakan Perusahaan Efek Non Anggota Bursa yang bekerjasama dengan Mandiri Sekuritas. Kami berdiri sejak 20 April 2015 dan sudah memiliki Izin OJK.">
    <meta name="author" content="Ali Akbar, Ageng Muhammad Wijayanto">

    <!--favicon icon-->
    <link rel="icon" href="https://monika.panensaham.com/public/assets/img/favicon.png" type="image/gif">

    <!--google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

    <!--title-->
    <title>PanenSaham Sekuritas Indonesia | <?= $title ?></title>

    <!--build:css-->
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/css/main.css">

    <!-- endbuild -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.css" integrity="sha512-odPJhwLP/gEyLX0KL88nXv42rXrMsHg41K93LJQDyPu7DVBS+oQS9xhnj+pImKV4I1DmlH/6P4f5J87xqChSZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.css" integrity="sha512-M0fkc9GMhTLHze2/hto0+HPuXk8rCHCCAsDDyX4IqUB62nrKFlFgFtzy3pjrsi/GZM4gWKo7jxigM3U6Sh4xtQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/css/custom.css">
    <link href="<?= base_url() ?>/assets_backend/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>

    <?= $this->renderSection('head') ?>
</head>

<body>
    <?php
        use CodeIgniter\HTTP\UserAgent;
        $this->request = \Config\Services::request();
        $agent = $this->request->getUserAgent();
        $mobile = $agent->isMobile();
    ?>

    <!-- <?php if ($mobile == true): ?>
        
    <?php else: ?>
        
    <?php endif; ?>  -->

    <!--loader start-->
    <div id="preloader">
        <div class="loader1">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <!--loader end-->

    <script>
        let base_url = "<?= base_url() ?>";
    </script>

    <?= $this->include('frontend/head'); ?>
    <?= $this->renderSection('body') ?>
    <?= $this->include('frontend/footer'); ?>
    
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/bootstrap-slider.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/jquery.countdown.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/validator.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/jquery.waypoints.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/jquery.rcounterup.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/vendors/hs.megamenu.js"></script>
    <script src="<?= base_url() ?>/assets_frontend/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.js" integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="<?= base_url() ?>/assets_backend/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>

    <script src="<?= base_url('assets_backend/js/datatables-scripts.js') ?>"></script>
    <script src="<?= base_url() ?>/assets_backend/js/jquery.ajaxForm.js"></script>

    <!-- <script src="<?= base_url() ?>/assets_backend/js/notify.min.js"></script> -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <?= $this->renderSection('script') ?>
    
    <script>
        $(function () {
            $('.selectpicker').selectpicker();
        });
    </script>

</body>

</html>