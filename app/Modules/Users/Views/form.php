<?= $this->extend('backend/layout') ?>
<?= $this->section('body') ?>
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon-squares"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                    <?= $title ?? 'No Title !' ?>                                     
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar"> 
                <div class="kt-portlet__head-wrapper">
                </div>
            </div>
        </div>

        <div class="kt-portlet__body">
            <?= form_open('admin/manage/users/save/'.($id ?? '-'), ['class' => 'kt-form kt-form--label-right','id' => 'userForm']); ?>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control mandatory" name="form[name]" value="<?= $name ?? '' ?>">
                    </div>
                    <div class="col-lg-6">
                        <label>Jenis Kelamin</label>
                        <select name="form[jenis_kelamin]" id="" class="selectize mandatory">
                            <option value="">Pilih</option>
                            <option <?= @$jenis_kelamin == 1 ? 'selected' : '' ?> value="1">Laki - Laki</option>
                            <option <?= @$jenis_kelamin == 2 ? 'selected' : '' ?> value="2">Perempuan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Username</label>
                        <input type="text" class="form-control mandatory" name="form[username]" value="<?= $username ?? '' ?>">
                    </div>
                    <div class="col-lg-6">
                        <label>Email</label>
                        <input type="email" class="form-control mandatory" name="form[email]" value="<?= $email ?? '' ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Password Baru</label>
                        <input type="password" class="form-control mandatory" name="form[password]" id="password" value="" placeholder="Masukan Password Baru">
                        <span class="form-text text-muted text-right" style="cursor: pointer;" onclick="myFunction()">Show Password</span>
                    </div>
                    <div class="col-lg-6">
                        <label>Konfirmasi Password</label>
                        <input type="password" class="form-control mandatory" name="form[confirm_password]" id="ulangPassword" value="<?= $confirm_password ?? '' ?>" placeholder="Ulangi Password Baru Anda">
                        <span class="form-text text-muted text-right" style="cursor: pointer;" onclick="myFunctionUlang()">Show Password</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control mandatory" name="form[tempat_lahir]" value="<?= $tempat_lahir ?? '' ?>">
                    </div>
                    <div class="col-lg-6">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control mandatory" name="form[tanggal_lahir]" id="datepicker-default" value="<?= $tanggal_lahir ?? '' ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Alamat</label>
                        <textarea name="form[alamat]" id="" cols="30" rows="10" class="form-control mandatory"><?= $alamat ?? '' ?></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <!-- <div class="col-lg-6">
                        <label>Role User</label>
                        <select name="form[role]" id="" class="selectize mandatory">
                            <option value="">Pilih</option>
                            <?php foreach($roles as $k => $v): ?>
                                <option <?= $k == @$role ? 'selected' : '' ?> value="<?= $k ?>"><?= $v ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div> -->
                    <div class="col-lg-12">
                        <label>Status User</label>
                        <select name="form[status]" id="" class="selectize mandatory">
                            <option value="">Pilih</option>
                            <option <?= @$status == 1 ? 'selected' : '' ?> value="1">Aktif</option>
                            <option <?= @$status == 0 ? 'selected' : '' ?> value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 ml-1">
                    <div class="btn-list justify-content-end">
                        <a href="<?= base_url('admin/manage/users') ?>" class="btn btn-danger mr-2 btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <a href="#" onclick="$(this).submitUserForm('#userForm', event)" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Simpan</a>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </div>
<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    $(document).ready(function(){
        const picker = new Litepicker({ 
            element: document.getElementById('datepicker-default') 
        });
    })
    $.fn.submitUserForm = function(form, event){
        event.preventDefault();
        let submit = $(this).submitAjax(form, event);
        if(submit.sucess == false){
            console.log(submit.error);
            $(':input').removeClass('is-invalid');
            $('.selectize').removeClass('is-invalid');

            Object.keys(submit.error).forEach(function(key){
                let formName = key.replace('form.', '');
                console.log(formName);
                $('input[name="form['+formName+']"').addClass('is-invalid');
                $('textarea[name="form['+formName+']"').addClass('is-invalid');
                $('select[name="form['+formName+']"').siblings('.selectize').addClass('is-invalid');

                $('input[name="form['+formName+']"').siblings('.invalid-feedback').text(submit.error[key]);
                $('textarea[name="form['+formName+']"').siblings('.invalid-feedback').text(submit.error[key]);
                $('select[name="form['+formName+']"').siblings('.invalid-feedback').text(submit.error[key]);
            })
            $(':input').not('.is-invalid').addClass('is-valid');
            $('.selectize').not('.is-invalid').find('.selectize-input').addClass('is-valid');
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

    function myFunctionUlang() {
        var y = document.getElementById("ulangPassword");
        if (y.type === "password") {
          y.type = "text";
        } else {
          y.type = "password";
        }
    }
</script>
<?= $this->endSection() ?>
