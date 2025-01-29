<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>

    <!--end::Base Path -->
    <meta charset="utf-8" />

    <title>CMS PanenSaham Sekuritas Indonesia | <?= $title ?></title>
    <meta name="description" content="CMS PanenSaham Sekuritas Indonesia">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="icon" href="https://monika.panensaham.com/public/assets/img/favicon.png" type="image/gif">

    <!--begin::Fonts -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->

    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="<?= base_url() ?>/assets_backend/vendors/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendors Styles -->


    <!--begin:: Global Mandatory Vendors -->
    <link href="<?= base_url() ?>/assets_backend/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css"
        rel="stylesheet" type="text/css" />
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <link href="<?= base_url() ?>/assets_backend/vendors/general/tether/dist/css/tether.css" rel="stylesheet"
        type="text/css" />
    <link
        href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-daterangepicker/daterangepicker.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-select/dist/css/bootstrap-select.css"
        rel="stylesheet" type="text/css" />
    <link
        href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/select2/dist/css/select2.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/ion-rangeslider/css/ion.rangeSlider.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/nouislider/distribute/nouislider.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/owl.carousel/dist/assets/owl.carousel.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/owl.carousel/dist/assets/owl.theme.default.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/dropzone/dist/dropzone.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/quill/dist/quill.snow.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/summernote/dist/summernote.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/animate.css/animate.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/toastr/build/toastr.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/morris.js/morris.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet" type="text/css" />

    <link href="<?= base_url() ?>/assets_backend/vendors/general/socicon/css/socicon.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/custom/vendors/line-awesome/css/line-awesome.css"
        rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/custom/vendors/flaticon/flaticon.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/custom/vendors/flaticon2/flaticon.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/vendors/general/@fortawesome/fontawesome-free/css/all.min.css"
        rel="stylesheet" type="text/css" />
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Styles(used by all pages) -->

    <!--end::Global Theme Styles -->

    <!--begin::Layout Skins(used by all pages) -->

    <link href="<?= base_url() ?>/assets_backend/css/demo1/skins/header/base/light.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/css/demo1/skins/header/menu/light.css" rel="stylesheet"
        type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/css/demo1/skins/brand/light.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/css/demo1/skins/aside/light.css" rel="stylesheet" type="text/css" />
    <!--end::Layout Skins -->

    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="<?= base_url() ?>/assets_backend/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url() ?>/assets_backend/css/custom.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.bootstrap4.min.css" integrity="sha512-VL5zQAJyFw5RL9wN3a5nF508dBqgOAYOZeww5RuEq8A8JQLiWy20iG2lLyiTuF6bv7gz48UGMcxuMlUycoHfJw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/css/selectize.css" integrity="sha512-odPJhwLP/gEyLX0KL88nXv42rXrMsHg41K93LJQDyPu7DVBS+oQS9xhnj+pImKV4I1DmlH/6P4f5J87xqChSZQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets_backend/vendors/fileuploader/css/jquery.dm-uploader.css') ?>">
    <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>

</head>
<!-- end::Head -->

<!-- begin::Body -->

<body onbeforeunload="ajaxLoader.show()" onload="ajaxLoader.show()"  class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <!-- begin:: Page -->
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
        <div class="kt-header-mobile__logo">
            <a href="demo1/index.html">
                <img src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="150"/>
            </a>
        </div>
        <div class="kt-header-mobile__toolbar">
            <button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
            <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
        </div>
    </div>
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
            <!-- begin:: Aside -->
            <button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

            <div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">

                <!-- HALAMAN SIDEBAR -->
                <?= $this->include('backend/sidebar') ?>

            </div>
            <!-- end:: Aside -->
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

                <!-- HALAMAN HEADER -->
                <?= $this->include('backend/header') ?>

                <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                    <!-- begin:: Subheader -->
                    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
                        <div class="kt-container  kt-container--fluid ">
                            <div class="kt-subheader__main">
                                <h3 class="kt-subheader__title"><?= $title ?? '' ?></h3>
                                <span class="kt-subheader__separator kt-hidden"></span>
                                <div class="kt-subheader__breadcrumbs">
                                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="" class="kt-subheader__breadcrumbs-link"><?= $pretitle ?? '' ?></a>
                                    <span class="kt-subheader__breadcrumbs-separator"></span>
                                    <a href="" class="kt-subheader__breadcrumbs-link"><?= $title ?? '' ?></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- end:: Subheader -->

                    <!-- begin:: Content -->
                    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                            <?= $this->renderSection('body') ?>
                    </div>
                    <!-- end:: Content -->
                </div>

<!-- HALAMAN FOOTER -->
<?= $this->include('backend/footer') ?>

              