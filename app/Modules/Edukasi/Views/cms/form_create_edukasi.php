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

        <div class="row">
            <div class="col-lg-6">
                <div class="kt-portlet__body">
                    <?= form_open($form_action, ['class' => 'kt-form kt-form--label-right','id' => 'article-form']); ?>
                        
                        <div class="form-group">
                            <label>Nama Edukasi</label>
                            <input type="hidden" name="id" id="id" class="form-control" value="<?= @$data->id ?>" required>
                            <input type="text" name="nama_edukasi" id="nama" class="form-control" value="<?= @$data->nama_edukasi ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Kode Edukasi</label>
                            <input type="text" class="form-control" value="<?= @$data->kode_edukasi ?>" name="kode_edukasi" id="kode_edukasi" required placeholder="xyz">
                            <span class="form-text text-muted">Diisi Dengan Kode untuk URL Edukasi, eg: http://sekuritas.panensaham.com/edukasi/xyz</span>
                        </div>
                        <div class="form-group">
                            <label>Tempat Acara</label>
                            <input type="text" name="tempat_acara" id="tempat_acara" class="form-control" value="<?= @$data->tempat_acara ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tanggal Edukasi</label>
                            <input type="date" class="form-control" value="<?= @$data->tanggal_edukasi ?>" name="tanggal_edukasi" id="tanggal_edukasi" required>
                        </div>

                        <div class="form-group">
                            <label>Waktu Acara</label>
                            <input type="text" name="waktu_acara" id="waktu_acara" class="form-control" value="<?= @$data->waktu_acara ?>" placeholder="09.00 - 12.00 WIB" required>
                        </div>

                        <div class="form-group">
                            <label>Pembicara</label>
                            <input type="text" name="pembicara" id="pembicara" class="form-control" value="<?= @$data->pembicara ?>" required>
                        </div>

                        <div class="form-group">
                            <label>Level Edukasi</label>
                            <select name="level_edukasi" id="level" class="selectize">                
                                <option value="">Pilih Level</option>
                                <?php $arrLevel = ['Beginner' => 'Beginner', 'Intermediate' => 'Intermediate', 'Advance' => 'Advance', 'Expert' => 'Expert'] ?>
                                <?php foreach($arrLevel as $k => $v){echo "<option ".($k == @$data->level_edukasi ? 'selected' : '')." value='$k'>$v</option>";} ?>
                            </select>
                        </div>

                        <div id="validation-errors" class="row mb-3"></div>

                        <div class="row mb-3 ml-1">
                            <div class="btn-list justify-content-end">
                                <a href="<?= base_url('admin/manage/edukasi') ?>" class="btn btn-danger mr-2 btn-sm"><i class="fa fa-arrow-left"></i> Kembali</a>
                                <a href="#" onclick="event.preventDefault();saveForm('#article-form', this,event)" class="btn btn-warning btn-sm"><i class="fa fa-save"></i> Simpan</a>
                            </div>
                        </div>

                        
                    <?= form_close(); ?>
                </div>
            </div>
        </div>

        
    </div>

<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    ajaxLoader.show();
    $(document).ready(function(){
        ajaxLoader.hide();
    });

    function saveForm(formName, el, event){
        $('#validation-errors').html('');
        $(formName+' input').map(function(i,v){
            $(v).removeClass('is-invalid')
        })
        let rsp = $(el).submitAjax(formName,event);

        if(rsp.error_message != undefined && rsp.error_message != ''){
            var obj = rsp.error_message;

            Object.keys(obj).forEach(function(k){
                $('#validation-errors').append('<div class="alert alert-danger col-md-12 mb-1">'+obj[k]+'</div>')
            });
        }
        
        $('input[name=cms_token]').val(rsp.token);
    }
    
    
</script>
<?= $this->endSection() ?>