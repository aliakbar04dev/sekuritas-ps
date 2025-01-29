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
        <?= form_open((isset($data->id_header) ? base_url('admin/content/headers/saveForm/'.$data->id_header) : base_url('admin/content/headers/saveForm/-') ), ['id'=>'header-form']) ?>
            <!-- <div id="validation-errors" class="row mb-3"></div> -->
            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Judul</label>
                    <input type="text" value="<?= $data->title ?? '' ?>" id="judul" name="form[title]" placeholder="Contoh: Kini, Berinvestasi Jadi Lebih Mudah Dan Nyaman" class="form-control">
                </div>
                <div class="col-lg-6">
                    <label>Sub Judul</label>
                    <input type="text" value="<?= $data->subtitle ?? '' ?>" name="form[subtitle]" placeholder="Contoh: Bermitra dengan Mandiri Sekuritas dengan sistem trading ..." class="form-control">
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <label>Gambar</label>
                    <input type="file" name="files" class="form-control" title="click to add file" id="file-input-control-1">
                    <span class="form-text text-danger mt-1 font-weight-bold">Ukuran gambar harus 2880x1450 pixel</span>
                </div>
                <div class="col-lg-6 uploaded-files">
                    <label></label>
                    <div style="border:none; overflow: hidden; padding: 0;">
                    <img src="<?= isset($attachment->file_path) ? base_url('open_attachment?path=').$attachment->file_path : '' ?>" alt="" id="preview-upload-headers" class="img-thumbnail">
                    <input value="<?= $attachment->file_path ?? '' ?>" type="hidden" name="attachment[path]" id="pathFile">
                    <input value="<?= $attachment->file_name ?? '' ?>" type="hidden" name="attachment[file_name]" id="nameFile">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-4">
                    <label>Perlu Tombol ?</label>
                    <select name="form[use_button]" id="" class="selectize form-control">
                        <option <?= isset($data->use_button) && $data->use_button == 1 ? 'selected' : '' ?> value="1">Ya</option>
                        <option <?= isset($data->use_button) && $data->use_button == 2 ? 'selected' : '' ?> value="2">Tidak</option>
                    </select>                
                </div>
                <div class="col-lg-4">
                    <label>Teks Di Tombol</label>
                    <input type="text" value="<?= $data->text_button ?? '' ?>" name="form[text_button]" placeholder="Contoh: Investasi Sekarang!" class="form-control">
                </div>
                <div class="col-lg-4">
                    <label>Alamat Tujuan Tombol</label>
                    <input type="text" value="<?= $data->link ?? '' ?>" name="form[link]" placeholder="Contoh: register/oa" class="form-control">
                </div>
            </div>

            <input type="hidden" value="1" name="form[status]" class="form-control">

            <!-- <div class="form-group row">
                <div class="col-lg-12">
                    <label>Status</label>
                    <select name="form[status]" id="" class="selectize">
                        <option <?= isset($data->status) && $data->status == '1' ? 'selected' : '' ?> value="1">Aktif</option>
                        <option <?= isset($data->status) && $data->status == '2' ? 'selected' : '' ?> value="2">Tidak Aktif</option>
                    </select>                
                </div>
            </div> -->

            <div class="row mb-3 ml-1">
                <div class="btn-list justify-content-end">
                    <a href="<?= base_url('admin/content/headers') ?>" class="btn btn-danger mr-2 btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <a href="#" onclick="event.preventDefault();saveForm('#header-form', this,event)" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Simpan</a>
                </div>
            </div>
        <?= form_close(); ?>
    </div>
</div>

<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
  $(document).ready(function(){
    $('#file-input-control-1').dmUploader({
        url: '<?= base_url('upload/attachment') ?>',
        headers: {
            'X-CSRF-TOKEN': '<?= csrf_hash() ?>'
        },
        allowedTypes: "image/*",
        maxFileSize: (3*1024*1024),
        fieldName: 'files',
        multiple:false,
        dnd: true,
        onUploadSuccess: function(id,resp){
            if(resp.sucess == true){
                $('#preview-upload-headers').attr('src', '<?= base_url('open_attachment').'?path=' ?>'+resp.file_path)
                $('#pathFile').val(resp.file_path);
                $('#nameFile').val(resp.file_name);
            }
        }
    })
    
  })
  $('.text-editor').on('keyup', function(){
    let target = $(this).attr('data-target'), value = $($(this).find('.ql-editor')).html();
    console.log(value);
    $(target).val(value);
  })

  function saveForm(formName, el, event){
    $('#validation-errors').html('');
    let rsp = $(el).submitAjax(formName,event);
    if(rsp.error != undefined && rsp.error != ''){
        for(var i in rsp.error){
            $('#validation-errors').append('<div class="alert alert-danger col-md-12">'+rsp.error[i]+'</div>')
        }
    }
  }
  $('#judul').on('change', function(){
    let value = $(this).val();
    value = value.replace(/\s+/gm, "-");
    value = value.toLowerCase();
    $('#slug').val(value);
  })
</script>
<?= $this->endSection() ?>