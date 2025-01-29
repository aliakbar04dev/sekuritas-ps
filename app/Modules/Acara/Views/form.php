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
            <?= form_open($form_action, ['class' => 'kt-form kt-form--label-right','id' => 'article-form']); ?>
                <!-- <div id="validation-errors" class="row mb-3"></div> -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Judul Edukasi</label>
                        <input type="text" name="form[judul]" id="judul" class="form-control" placeholder="Contoh: Cuan di market fluktuatif" value="<?= @$data->judul ?>">
                    </div>
                    <div class="col-lg-6">
                        <label>Tgl Edukasi</label>
                        <input type="date" class="form-control" value="<?= @$data->tanggal_acara_form ?>" name="form[tanggal_acara]" id="tanggal_acara">
                        <span class="form-text text-muted">Diisi Dengan Tanggal Pertama Acara Edukasi</span>
                    </div>
                    <!-- <div class="col-lg-6">
                        <label>Slug</label> -->
                        <input type="hidden" name="form[slug]" id="slug" value="<?= @$data->slug ?>" class="form-control">
                    <!-- </div> -->
                </div>

                <div class="form-group row">
                    <div class="col-lg-4">
                        <label>Jam</label>
                        <select name="time[0]" class="selectize" id="">
                            <?= (new App\Models\TmAcara)->getOptionJam(@$data->jam) ?>
                        </select>                    
                    </div>
                    <div class="col-lg-4">
                        <label>Menit</label>
                        <select name="time[1]" id="" class="selectize">
                            <?= (new App\Models\TmAcara)->getOptionMenit(@$data->menit) ?>
                        </select>
                    </div>
                    <div class="col-lg-4">
                        <label>Waktu Bagian</label>
                        <select name="form[time_type]" id="" class="selectize">
                            <?= (new App\Models\TmAcara)->getOptionTimeType(@$data->time_type) ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Kota</label>
                        <?php $selectedKota = []; foreach($kota as $k => $v){ $selectedKota[] = $v['region_id'];} ?>
                        <select name="form[kota][]" multiple id="kota" class="selectize">
                            <option value="">Pilih Kota</option>
                            <?php foreach($listKota as $k => $v): ?>
                                <option <?= in_array($v->region_id, $selectedKota) ? 'selected' : '' ?> value="<?= $v->region_id ?>"><?= $v->kabupaten_kota ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-6">
                        <label>Level</label>
                        <select name="form[level]" id="level" class="selectize">                
                            <option value="">Pilih Level</option>
                            <?php $arrLevel = ['1' => 'Beginner', '2' => 'Intermediate', '3' => 'Advance', '4' => 'Expert'] ?>
                            <?php foreach($arrLevel as $k => $v){echo "<option ".($k == @$data->level ? 'selected' : '')." value='$k'>$v</option>";} ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-lg-6">
                        <label>Cover</label>
                        <input type="file" class="form-control mb-3" name="files" id="front-img">
                        <div class="uploaded-file0s" style="border: none;">
                            <div>
                                <img src="<?= isset($gambar_depan->file_path) ? base_url('open_attachment?path=').$gambar_depan->file_path : '' ?>" style="width: 80%;" alt="" id="preview-upload0" class="img-thumbnail">
                                <input value="<?= $gambar_depan->file_path ?? '' ?>" type="hidden" name="attachment[path0]" id="pathFile0">
                                <input value="<?= $gambar_depan->file_name ?? '' ?>" type="hidden" name="attachment[file_name0]" id="nameFile0">
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-md-4" style="display:none">
                        <label for="" class="form-label">Bulan *</label>
                        <select name="form[bulan]" id="bulan" class="selectize">
                            <option value="">Pilih Bulan ...</option>
                            <option value="1">Januari</option>
                        </select>
                    </div> -->
                    <div class="col-lg-6">
                        <fieldset>
                            <label for="" class="form-label">Konten *</label>
                            <div data-target="#texteditor" class="text-editor"><?= @$data->content ?></div>
                        </fieldset>
                        <textarea name="form[content]" style="display:none" id="texteditor" cols="30" rows="10"><?= @$data->content ?></textarea>
                    </div>
                </div>



                <div class="row mb-3 ml-1">
                    <div class="btn-list justify-content-end">
                        <a href="<?= base_url('admin/content/acara') ?>" class="btn btn-danger mr-2 btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                        <a href="#" onclick="event.preventDefault();saveForm('#article-form', this,event)" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Simpan</a>
                    </div>
                </div>
            <?= form_close(); ?>
        </div>
    </div>

<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    ajaxLoader.show();
  $(document).ready(function(){
    var quill = new Quill('.text-editor', {
        theme: 'snow'
    });
    ajaxLoader.hide();
    $('.ql-editor').css('min-height', '300px');
    $('#front-img').dmUploader({
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
                $('#preview-upload0').attr('src', '<?= base_url('open_attachment').'?path=' ?>'+resp.file_path)
                $('#pathFile0').val(resp.file_path);
                $('#nameFile0').val(resp.file_name);
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
    $(formName+' input').map(function(i,v){
        $(v).removeClass('is-invalid')
    })
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