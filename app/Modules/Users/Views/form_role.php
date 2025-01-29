<?= $this->extend('backend/default') ?>
<?= $this->section('content') ?>
<div class="card">
    <div class="card-body">
        <?= form_open(); ?>
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Nama Role <span class="text-red">*</span></label>
            </div>
            <div class="col-md-9">
                <input type="text" name="form[email]" class="form-control mandatory">
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-md-3">
                <label for="" class="form-label">Status <span class="text-red">*</span></label>
            </div>
            <div class="col-md-9">
                <select name="form[status]" id="" class="andatory">
                    <option value="">Pilih Status User ...</option>
                    <option value="1">Aktif</option>
                    <option value="0">Tidak Aktif</option>
                </select>
            </div>
        </div>
        <div class="row mb-3">
            <div class="btn-list justify-content-end">
                <a href="#" class="btn">Cancel</a>
                <a href="#" class="btn btn-primary"><i class="ti ti-check" style="margin-right: 0.5rem"></i>Save</a>
            </div>
        </div>
        <?= form_close(); ?>
    </div>
</div>
<?= $this->section('javascript') ?>
<script>
    $(document).ready(function(){
        const picker = new Litepicker({ 
            element: document.getElementById('datepicker-default') 
        });
    })
</script>
<?= $this->endSection() ?>
<?= $this->endSection() ?>