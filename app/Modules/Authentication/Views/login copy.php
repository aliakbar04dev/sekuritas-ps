<?php $this->extend('backend/layout') ?>
<?php $this->section('body') ?>
    <div class="page page-center" style="background: url('https://www.teahub.io/photos/full/117-1177685_media-analytics-investment.png')">
      <div class="container-tight py-4">
        
        <?= form_open(base_url('admin/auth/login_attempt'), ['id' => 'form-login', 'class' => 'card']) ?>
          <div class="card-body">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="https://iqplusinfo.files.wordpress.com/2016/06/cropped-logo-real-time.jpg?w=816" alt="" height="100"></a>
            </div>
            <h2 class="card-title text-center mb-4">Login to your account</h2>
            <div class="mb-3">
              <label class="form-label">Username or e-Mail</label>
              <input type="email" name="username" class="form-control" placeholder="Enter email" autocomplete="off">
              <div class="invalid-feedback"></div>
            </div>
            <div class="mb-2">
              <label class="form-label">
                Password
                
              </label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" autocomplete="off">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" onmouseleave="$(this).maskInput('#password')" onmouseover="$(this).showInput('#password')" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><desc>Download more icon variants from https://tabler-icons.io/i/eye</desc><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><circle cx="12" cy="12" r="2"></circle><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path></svg>
                  </a>
                </span>
                <div class="invalid-feedback"></div>

              </div>
            </div>
            
            <div class="form-footer">
              <button type="submit" onclick="event.preventDefault(); $(this).submitLogin('#form-login', event)" class="btn btn-primary w-100">Sign in</button>
              <div class="text-end">
                <a href="./forgot-password.html">forgot password</a>
              </div>

            </div>
          </div>
          
        </form>
        
      </div>
    </div>
<?php $this->endSection() ?>
<?php $this->section('javascript') ?>
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
        $('input').not('.is-invalid').addClass('is-valid');
      }
    }
</script>
<?php $this->endSection() ?>