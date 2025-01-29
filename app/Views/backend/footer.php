  <!-- begin:: Footer -->
  <div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
                    <div class="kt-container  kt-container--fluid ">
                        <div class="kt-footer__copyright">
                            &copy <?= date('Y') ?> CMS PanenSAHAM Sekuritas Indonesia.
                        </div>
                        <div class="kt-footer__menu">
                            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">About</a>
                            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Team</a>
                            <a href="http://keenthemes.com/metronic" target="_blank" class="kt-footer__menu-link kt-link">Contact</a>
                        </div>
                    </div>
                </div>
                <!-- end:: Footer -->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
        <i class="fa fa-arrow-up"></i>
    </div>
    <!-- end::Scrolltop -->


    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>
    <script>
        let base_url = "<?= base_url() ?>";
    </script>
    <!-- end::Global Config -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>  <script src="<?= base_url() ?>/assets_backend/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap/dist/js/bootstrap.min.js"type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="<?= base_url() ?>/assets_backend/vendors/general/sweetalert2/dist/sweetalert2.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/sweetalert2.init.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="<?= base_url('assets_backend/js/datatables-scripts.js') ?>"></script>
    <script src="<?= base_url('assets_backend/js/jquery.ajaxForm.js') ?>"></script>
    <script>

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.13.5/js/standalone/selectize.js" integrity="sha512-JFjt3Gb92wFay5Pu6b0UCH9JIOkOGEfjIi7yykNWUwj55DBBp79VIJ9EPUzNimZ6FvX41jlTHpWFUQjog8P/sw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>    
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script src="<?= base_url('assets_backend/vendors/fileuploader/js/jquery.dm-uploader.js') ?>"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"> </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/js-cookie/src/js.cookie.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/moment/min/moment.min.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/tooltip.js/dist/umd/tooltip.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/sticky-js/dist/sticky.min.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/wnumb/wNumb.js" type="text/javascript"></script>
    <!--end:: Global Mandatory Vendors -->

    <!--begin:: Global Optional Vendors -->
    <script src="<?= base_url() ?>/assets_backend/vendors/general/jquery-form/dist/jquery.form.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/block-ui/jquery.blockUI.js" type="text/javascript">
    </script>
    <script
        src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/bootstrap-datepicker.init.js"
        type="text/javascript"></script>
    <script
        src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/bootstrap-timepicker.init.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-daterangepicker/daterangepicker.js"
        type="text/javascript"></script>
    <script
        src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js"
        type="text/javascript"></script>
    <script
        src="<?= base_url() ?>/assets_backend/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-select/dist/js/bootstrap-select.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/bootstrap-switch.init.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/select2/dist/js/select2.full.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/ion-rangeslider/js/ion.rangeSlider.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/typeahead.js/dist/typeahead.bundle.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/handlebars/dist/handlebars.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/inputmask/dist/jquery.inputmask.bundle.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js"
        type="text/javascript"></script>
    <script
        src="<?= base_url() ?>/assets_backend/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/nouislider/distribute/nouislider.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/owl.carousel/dist/owl.carousel.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/autosize/dist/autosize.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/clipboard/dist/clipboard.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/dropzone/dist/dropzone.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/dropzone.init.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/quill/dist/quill.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/@yaireo/tagify/dist/tagify.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/summernote/dist/summernote.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/markdown/lib/markdown.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/bootstrap-markdown.init.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap-notify/bootstrap-notify.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/bootstrap-notify.init.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/jquery-validation/dist/jquery.validate.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/jquery-validation/dist/additional-methods.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/js/vendors/jquery-validation.init.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/toastr/build/toastr.min.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/dual-listbox/dist/dual-listbox.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/raphael/raphael.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/morris.js/morris.js" type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/chart.js/dist/Chart.bundle.js" type="text/javascript">
    </script>
    <script
        src="<?= base_url() ?>/assets_backend/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/waypoints/lib/jquery.waypoints.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/counterup/jquery.counterup.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/es6-promise-polyfill/promise.min.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/jquery.repeater/src/lib.js" type="text/javascript">
    </script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/jquery.repeater/src/jquery.input.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/jquery.repeater/src/repeater.js"
        type="text/javascript"></script>
    <script src="<?= base_url() ?>/assets_backend/vendors/general/dompurify/dist/purify.js" type="text/javascript">
    </script>
    <!--end:: Global Optional Vendors -->

    <!--begin::Global Theme Bundle(used by all pages) -->

    <script src="<?= base_url() ?>/assets_backend/js/demo1/scripts.bundle.js" type="text/javascript"></script>
    <!--end::Global Theme Bundle -->


    <?= $this->renderSection('javascript') ?>
    
</body>
<!-- end::Body -->

</html>