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
                <!-- <div class="kt-portlet__head-actions">
                    <a href="<?= base_url('admin/manage/members') ?>" class="btn btn-danger btn-sm btn-elevate btn-icon-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                </div> -->
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <?= form_open($action, ['id' => 'register-form']) ?>
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Nama Lengkap</label>
                    <input type="text" value="<?= $data->full_name ?? '' ?>" name="full_name" class="form-control" placeholder="Contoh: John Doe" required>
                </div>
                <div class="col-lg-6">
                    <label>Email</label>
                    <input type="email" value="<?= $data->email ?? '' ?>" name="email" class="form-control" placeholder="Contoh: contoh@mail.com" required>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label>No Handphone</label>
                    <input type="number" value="<?= $data->no_wa ?? '' ?>" name="no_wa" class="form-control" placeholder="Contoh: 089456464354" required>
                </div>
                <div class="col-lg-6">
                    <label>Referal ID Member</label>
                    <input type="text" name="referal_id" value="<?= $data->referal_id ?>" class="form-control" placeholder="Contoh: XXXX1 (5 Digit Huruf atau Angka)">
                </div>

            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Kode Yang Mereferensikan</label>
                    <input type="text" name="referal_submit" value="<?= $data->referal_submit ?>" class="form-control" placeholder="Isi jika ada">
                </div>
                <div class="col-lg-6">
                    <label>Nama Yang Mereferensikan</label>
                    <input type="text" value="<?= $data->nama_referal ?? '' ?>" name="nama_referal" placeholder="Isi jika ada" class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Provinsi</label>
                    <select name="provinsi" data-id="<?= $data->region_id ?? '' ?>" id="provinsi" class="form-control" required></select>                
                </div>
                <div class="col-lg-6">
                    <label>Email</label>
                    <select name="region_id" data-id="<?= $data->region_id ?? '' ?>" id="kota" class="form-control" required></select>                
                </div>
            </div>

            <!-- <?php if(!empty($data->referal_submit)): ?>
                <div class="col-lg-6">
                    <label>Kode Yang Mereferensikan</label>
                    <input type="text" name="referal_submit" value="<?= $data->referal_submit ?>" class="form-control" placeholder="Contoh: ">
                </div>
            <?php else: ?>
            <?php endif; ?> -->

            <div class="col-md-12 mt-3 mb-4 ">
                <a href="<?= base_url('admin/manage/members') ?>" class="btn btn-danger mr-2 btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                <button id="btn-submit" type="button" onclick="event.preventDefault();$(this).submitAjax('#register-form',event)"  class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Simpan</button>
            </div>
        <?= form_close() ?>
    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    $(document).ready(function(){
        $.ajax({
            method: 'GET',
            url: "<?= base_url('region') ?>",
            success: function(data){
                let result = data.provinsi;
                $('#provinsi').selectize()[0].selectize.destroy();
                let trigger = false;
                data.provinsi.map(function(i,v){
                   let value = $('#provinsi').attr('data-id');
                   value = value.substring(0,2)+'00';

                    if(value != '' && i.id == value ){
                        trigger = true;
                        $('#provinsi').append('<option selected value="'+i.id+'">'+i.nama+'</option>');

                    }else{
                        $('#provinsi').append('<option value="'+i.id+'">'+i.nama+'</option>');

                    }
                })
                $('#provinsi').selectize({create: false})
                if(trigger){
                    $('#provinsi').trigger('change');
                }

            }
        })
        $('#provinsi').on('change', function(){
            let output = '<option value="">Pilih Kabupaten/Kota</option>';
            ajaxLoader.show();
            $.ajax({
                method: 'GET',
                url: "<?= base_url('region').'?id_provinsi=' ?>"+this.value,
                success: function(data){
                    let result = data.provinsi;
                    $('#kota').selectize()[0].selectize.destroy();
                    ajaxLoader.hide();
                    data.kota_kabupaten.map(function(i,v){
                        let value = $('#kota').attr('data-id');

                        if(value != '' && i.id == value ){
                            output = output + '<option selected value="'+i.id+'">'+i.nama+'</option>';

                        }else{
                            output = output + '<option value="'+i.id+'">'+i.nama+'</option>';

                        }
                        $('#kota').html(output)
                    })
                    $('#kota').selectize({create: false})
                }
            })
        })
    })
</script>
<?= $this->endSection(); ?>