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
            <?= form_open((isset($data->id_artikel) ? base_url('admin/content/articles/saveForm/'.$data->id_artikel) : base_url('admin/content/articles/saveForm/-') ), ['id'=>'article-form']); ?>
                <!-- <div id="validation-errors" class="row mb-3"></div> -->
                <div class="form-group row">
                    <div class="col-lg-12">
                        <label>Judul Artikel</label>
                        <input type="text" value="<?= $data->judul ?? '' ?>" id="judul" name="form[judul]" placeholder="Contoh: Cuan di market fluktuatif" class="form-control">
                    </div>
                    <!-- <div class="col-lg-6">
                        <label>Slug</label> -->
                        <input type="hidden" value="<?= $data->slug ?? '' ?>" id="slug" name="form[slug]" class="form-control" readonly>
                    <!-- </div> -->
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Sumber Artikel</label>
                        <input type="text" value="<?= $data->sumber ?? '' ?>" name="form[sumber]" placeholder="Contoh: https://www.fringilla-mauris-eget-nibh-mollis-facilisis.com" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label>Status <font style="color: #D30000;">Hot</font> Atau <font style="color: #449F0C;">New</font></label>
                        <select class="selectize" name="form[kategori]" id="">
                            <option  value="">Pilih Status</option>
                            <option <?= isset($data) && $data->kategori == '1' ? 'selected' : '' ?> value="1">Hot</option>
                            <option <?= isset($data) && $data->kategori == '2' ? 'selected' : '' ?> value="2">New</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Cover Artikel</label>
                        <input type="file" name="files" class="form-control" title="click to add file" id="file-input">
                    </div>
                    <div class="col-lg-6 uploaded-files">
                        <label></label>
                        <div style="border:none; overflow: hidden; padding: 0;">
                            <img src="<?= isset($attachment->file_path) ? base_url('open_attachment?path=').$attachment->file_path : '' ?>" alt="" id="preview-upload" class="img-thumbnail" style="max-height: 300px;">
                            <input value="<?= $attachment->file_path ?? '' ?>" type="hidden" name="attachment[path]" id="pathFile">
                            <input value="<?= $attachment->file_name ?? '' ?>" type="hidden" name="attachment[file_name]" id="nameFile">
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-12">
                        <fieldset>
                            <label for="" class="form-label">Konten Artikel</label>
                            <div data-target="#texteditor" class="text-editor"><?= $data->content ?? '' ?></div>
                        </fieldset>
                        <textarea name="form[content]" style="display:none" id="texteditor" cols="30" rows="10"><?= $data->content ?? '' ?></textarea>
                    </div>
                </div>

                <div class="row mb-3 ml-1">
                    <div class="btn-list justify-content-end">
                        <a href="<?= base_url('admin/content/articles') ?>" class="btn btn-danger mr-2 btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <a href="#" onclick="event.preventDefault();saveForm('#article-form', this,event)" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Simpan</a>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
  $(document).ready(function(){
    var quill = new Quill('.text-editor', {
        theme: 'snow'
    });
    $('.ql-editor').css('min-height', '300px');
    $('#file-input').dmUploader({
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
                $('#preview-upload').attr('src', '<?= base_url('open_attachment').'?path=' ?>'+resp.file_path)
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