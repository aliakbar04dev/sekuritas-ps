<?= $this->extend('backend/layout') ?>
<?= $this->section('body') ?>

<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-squares"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Daftar Member                            
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar"> 
            <div class="kt-portlet__head-wrapper">

                <div class="kt-portlet__head-actions">
                    <!-- <a href="" class="btn btn-success btn-sm btn-elevate btn-icon-sm">Export Excel</a> -->
                    <button id="export_excel" class="btn btn-success btn-sm btn-elevate btn-icon-sm">
                        Export Excel
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
    <?php if(empty($data)): ?>
        <div class="alert alert-danger">Belum Ada Member </div>
    <?php elseif ( count($data) > 0) : ?>
        <?= form_open('', ['method' => 'GET']) ?>
            <div class="row">
                <div class="form-group col-md-5">
                    <input type="text" value="<?= $q ?? '' ?>" id="query" placeholder='Cari Member Disini' name='q' class="form-control">
                </div>
                <div class="col-md-1">
                    <button class="btn btn-warning">Cari</button>
                </div>
            </div>
        <?= form_close() ?>
        <table class="table table-striped" style="width:100%;">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Lengkap</th>
                    <th>Kontak</th>
                    <th>Ref. ID</th>
                    <th>Kode Ref.</th>
                    <th>Nama Ref.</th>
                    <th>Created On</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($data as $k => $v): ?>
                    <tr>
                        <td><?= $v->id ?? '' ?></td>
                        <td><?= $v->full_name ?? '' ?></td>
                        <td style="font-size: 12px;"><?= $v->email ?? '' ?> <br> <?= $v->no_wa ?? '' ?></td>
                        <td> <a href="<?= base_url('admin/manage/members/detail_referal/'.$v->referal_id) ?>"><?= $v->referal_id ?? '' ?></a></td>
                        <td><?= $v->referal_submit ?? '' ?></td>
                        <td><?= $v->nama_referal ?? '' ?></td>
                        <td>
                            <?php if ($v->created_on == null || $v->created_on == '') : ?>
                                
                            <?php else : ?>
                                <?= date('d/m/Y H:i:s', strtotime($v->created_on)) ?? '' ?>                            
                            <?php endif ?>
                        </td>
                        <td>
                            <?= view('App\Modules\Customers\Views\table_action', ['data' => $v->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-12">
                Menampilkan <?= $countNow ?> dari <?= $countData ?> data
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $data_pager->links('referal','bootstrap_pagination') ?>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Belum Ada Member Yang Di Referesikan</div>
    <?php endif; ?>

    </div>
</div>
<?= $this->endSection() ?>
<?= $this->section('javascript') ?>
<script>
    $('#export_excel').on('click', function(){
        event.preventDefault();
        let export_url = '<?= base_url("admin/manage/members/export_excel") ?>'+'?q='+$('#query').val();
        // window.open(export_url, '_blank');
        window.open(export_url);
    })
</script>
<?= $this->endsection() ?>