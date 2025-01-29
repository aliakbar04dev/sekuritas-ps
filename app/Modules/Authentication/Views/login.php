<!DOCTYPE html>
<html lang="en">
<!-- begin::Head -->

<head>
  <meta charset="utf-8" />

  <title>CMS PanenSaham Sekuritas Indonesia | <?= $title ?></title>
  <meta name="description" content="Login page CMS PanenSaham Sekuritas Indonesia">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="icon" href="https://monika.panensaham.com/public/assets/img/favicon.png" type="image/gif">

  <!--begin::Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
  <!--end::Fonts -->

  <!--begin::Page Custom Styles(used by this page) -->
  <link href="<?= base_url() ?>/assets_backend/css/demo1/pages/login/login-1.css" rel="stylesheet" type="text/css" />
  <!--end::Page Custom Styles -->

  <!--begin:: Global Mandatory Vendors -->
  <link href="<?= base_url() ?>/assets_backend/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" type="text/css" />
  <!--end:: Global Mandatory Vendors -->

  <!--begin::Global Theme Styles(used by all pages) -->
  <link href="<?= base_url() ?>/assets_backend/css/demo1/style.bundle.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href=" https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css"/>

  <!--end::Global Theme Styles -->
</head>
<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">


  <?php if ($mobile == true): ?>
    <div class="kt-grid kt-grid--ver kt-grid--root">
      <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile text-center">

        
          <!--begin::Aside-->
          <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside" style="background-image: url(<?= base_url() ?>/assets_backend/media//bg/bg-9.jpg);">
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
              <div class="kt-grid__item kt-grid__item--middle mt-3">
                <h3 class="kt-login__title" style="color: #000;">Selamat datang di <br> CMS PanenSAHAM Sekuritas Indonesia
                </h3>
                <h4 class="kt-login__subtitle" style="color: #000;">Content Management System (CMS) adalah sebuah aplikasi
                  yang dapat membantu pengguna untuk membuat, mengatur, dan mengubah konten di dalam website.</h4>
              </div>
            </div>
            <div class="kt-grid__item">
              <div class="kt-login__info">
                <div class="kt-login__copyright" style="color: #000; font-weight:bold;">
                  &copy <?= date('Y') ?> CMS PanenSAHAM Sekuritas Indonesia.
                </div>
              </div>
            </div>
          </div>
          <!--begin::Aside-->

          <!--begin::Content-->
          <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
            <!--begin::Body-->
            <div class="kt-login__body">

              <!--begin::Signin-->
              <div class="kt-login__form" style="margin-top: -15%;">
                <div class="kt-grid__item">
                  <a href="<?= base_url() ?>" class="kt-login__logo">
                    <img src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="70%">
                  </a>
                </div>

                <!--begin::Form-->
                <?= form_open(base_url('admin/auth/login_attempt'), ['id' => 'form-login', 'class' => 'kt-form']) ?>
                  <div class="form-group">
                    <input class="form-control" type="email" placeholder="Username / Email" name="username" required
                      autofocus>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password" name="password" id="password" required>
                    <span class="form-text text-muted mt-3 text-right" style="cursor: pointer;" onclick="myFunction()">Show Password</span>
                  </div>
                  <!--begin::Action-->
                  <div class="kt-login__actions">
                    <a href="#" class="kt-link kt-login__link-forgot">
                      Lupa Password ?
                    </a>
                    <button type="submit" onclick="event.preventDefault(); $(this).submitLogin('#form-login', event)" class="btn btn-primary btn-elevate kt-login__btn-primary"
                      style="background-color: #ffdf4f; border:none; color:#492e1f;">Masuk</button>
                  </div>
                  <!--end::Action-->
                </form>
                <!--end::Form-->

              </div>
              <!--end::Signin-->
            </div>
            <!--end::Body-->
          </div>
          <!--end::Content-->

          
        </div>
      </div>
    </div>
  <?php else: ?>
    <div class="kt-grid kt-grid--ver kt-grid--root">
      <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
        <div
          class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
          <!--begin::Aside-->
          <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
            style="background-image: url(<?= base_url() ?>/assets_backend/media//bg/bg-9.jpg);">
            <div class="kt-grid__item">
              <a href="<?= base_url() ?>" class="kt-login__logo">
                <img src="<?= base_url() ?>/assets_frontend/img/logopsi.svg" width="50%">
              </a>
            </div>
            <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
              <div class="kt-grid__item kt-grid__item--middle">
                <h3 class="kt-login__title" style="color: #000;">Selamat datang di <br> CMS PanenSAHAM Sekuritas Indonesia <?= $mobile ?>
                </h3>
                <h4 class="kt-login__subtitle" style="color: #000;">Content Management System (CMS) adalah sebuah aplikasi
                  yang dapat membantu pengguna untuk membuat, mengatur, dan mengubah konten di dalam website.</h4>
              </div>
            </div>
            <div class="kt-grid__item">
              <div class="kt-login__info">
                <div class="kt-login__copyright" style="color: #000; font-weight:bold;">
                  &copy <?= date('Y') ?> CMS PanenSAHAM Sekuritas Indonesia.
                </div>
              </div>
            </div>
          </div>
          <!--begin::Aside-->

          <!--begin::Content-->
          <div class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">

            <!--begin::Body-->
            <div class="kt-login__body">

              <!--begin::Signin-->
              <div class="kt-login__form">
                <div class="kt-login__title">
                  <h3>Masuk</h3>
                </div>

                <!--begin::Form-->
                <?= form_open(base_url('admin/auth/login_attempt'), ['id' => 'form-login', 'class' => 'kt-form']) ?>
                  <div class="form-group">
                    <input class="form-control" type="email" placeholder="Username / Email" name="username" required
                      autofocus>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password" name="password" id="password" required>
                    <span class="form-text text-muted mt-3 text-right" style="cursor: pointer;" onclick="myFunction()">Show Password</span>
                  </div>
                  <!--begin::Action-->
                  <div class="kt-login__actions">
                    <a href="#" class="kt-link kt-login__link-forgot">
                      Lupa Password ?
                    </a>
                    <button type="submit" onclick="event.preventDefault(); $(this).submitLogin('#form-login', event)" class="btn btn-primary btn-elevate kt-login__btn-primary"
                      style="background-color: #ffdf4f; border:none; color:#492e1f;">Masuk</button>
                  </div>
                  <!--end::Action-->
                </form>
                <!--end::Form-->

              </div>
              <!--end::Signin-->
            </div>
            <!--end::Body-->
          </div>
          <!--end::Content-->
        </div>
      </div>
    </div>
  <?php endif; ?>

  <script>
    let base_url = "<?= base_url() ?>"
  </script>
  <script src="<?= base_url() ?>/assets_backend/vendors/general/jquery/dist/jquery.js" type="text/javascript"></script>
  <script src="<?= base_url() ?>/assets_backend/vendors/general/popper.js/dist/umd/popper.js" type="text/javascript"></script>
  <script src="<?= base_url() ?>/assets_backend/vendors/general/bootstrap/dist/js/bootstrap.min.js"type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script src="<?= base_url('assets_backend/js/jquery.ajaxFormLogin.js') ?>"></script>
  <script src="<?= base_url() ?>/assets_backend/js/demo1/pages/login/login-1.js" type="text/javascript"></script>
  <script>
      $.fn.showInput = function(text){
        $(text).attr('type', 'text');
      }
      $.fn.maskInput = function(text){
        $(text).attr('type', 'password');
      }
      $.fn.submitLogin = function(form, event){
        let ajax = $(this).submitAjax(form, event);
        if( ajax.error != undefined && ajax.error != ''){
          $('input').removeClass('is-invalid');
          $('input').removeClass('is-valid');
          Object.keys(ajax.error).forEach(function(key){
            if(key == 'password'){
              $('input[name='+key+']').addClass('is-invalid');
            }else{
              $('input[name='+key+']').addClass('is-invalid');
            }
            $('input[name='+key+']').parent().find('.invalid-feedback').html(ajax.error[key]);
          })
          $('input').not('.is-invalid').addClass('is-invalid');
        }
      }
      function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
  </script>
</body>

</html>