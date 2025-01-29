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
                <div class="kt-portlet__head-actions">
                    <a href="<?= base_url('admin/manage/members') ?>" class="btn btn-danger btn-sm btn-elevate btn-icon-sm"><i class="fa fa-arrow-left"></i>&nbsp; Kembali</a>
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
        <table class="table table-striped" style="width:100%;">
            <tr>
                <td style="width:20%; text-align: left; vertical-align:middle;">Referal ID</td>
                <td style="width:1%; vertical-align:middle;">:</td>
                <td style="width:79%; vertical-align:middle;">
                    <?= $dataDetail['referal_id'] ?>
                </td>
            </tr>
            <tr>
                <td style="width:20%; text-align: left; vertical-align:middle;">Nama Lengkap</td>
                <td style="width:1%; vertical-align:middle;">:</td>
                <td style="width:79%; vertical-align:middle;">
                    <?= $dataDetail['full_name'] ?>
                </td>
            </tr>
            <tr>
                <td style="width:20%; text-align: left; vertical-align:middle;">Email</td>
                <td style="width:1%; vertical-align:middle;">:</td>
                <td style="width:79%; vertical-align:middle;">
                    <?= $dataDetail['email'] ?>
                </td>
            </tr>
            <tr>
                <td style="width:20%; text-align: left; vertical-align:middle;">No.HP</td>
                <td style="width:1%; vertical-align:middle;">:</td>
                <td style="width:79%; vertical-align:middle;">
                    <?= $dataDetail['no_wa'] ?>
                </td>
            </tr>
        </table>
    </div>
</div>
<div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
        <div class="kt-portlet__head-label">
            <span class="kt-portlet__head-icon">
                <i class="kt-font-brand flaticon-squares"></i>
            </span>
            <h3 class="kt-portlet__head-title">
                Daftar Member Yang Di Referensikan                                
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar"> 
            <div class="kt-portlet__head-wrapper">
                <div class="kt-portlet__head-actions">
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__body">
    <?php if(empty($data)): ?>
        <div class="alert alert-danger">Belum Ada Member Yang Di Referesikan</div>
    <?php elseif ( count($data) > 0) : ?>
        <?= form_open('', ['method' => 'GET']) ?>
            <div class="row">
                <div class="form-group col-md-5">
                    <input type="text" value="<?= $q ?? '' ?>" placeholder='Cari Member Disini' name='q' class="form-control">
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
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Ref. ID</th>
                    <th>Kode Ref.</th>
                    <th>Nama Ref.</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data as $k => $v): ?>
                    <tr>
                        <td><?= $v->id ?? '' ?></td>
                        <td><?= $v->full_name ?? '' ?></td>
                        <td><?= $v->email ?? '' ?></td>
                        <td><?= $v->no_wa ?? '' ?></td>
                        <td><?= $v->referal_id ?? '' ?></td>
                        <td><?= $v->referal_submit ?? '' ?></td>
                        <td><?= $v->nama_referal ?? '' ?></td>
                        <td>
                            <?= view('App\Modules\Customers\Views\table_action', ['data' => $v->id]) ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6">
                Menampilkan <?= $countNow ?> dari <?= $count ?> data
            </div>
            <div class="col-md-6">
                <?= $referal_pager->links('referal','bootstrap_pagination') ?>
            </div>
        </div>
    <?php else: ?>
        <div class="alert alert-danger">Belum Ada Member Yang Di Referesikan</div>
    <?php endif; ?>

    </div>
</div>
<?= $this->endSection() ?>