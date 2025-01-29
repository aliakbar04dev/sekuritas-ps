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
                    <a href="<?= base_url('admin/manage/members') ?>" class="btn btn-danger btn-sm btn-elevate btn-icon-sm"><i class="fa fa-arrow-left"></i>&nbsp; Back</a>
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
<?= $this->endSection() ?>