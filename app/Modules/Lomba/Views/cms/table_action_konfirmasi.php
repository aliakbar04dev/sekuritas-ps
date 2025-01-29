<div class="text-center">
    <a href="<?= base_url('admin/manage/lomba/detail_konfirmasi/'.$data) ?>" class="btn btn-hover-info btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Detail">
        <span class="la la-eye"></span>
    </a>
    <a href="<?= base_url('admin/manage/lomba/delete_konfirmasi/'.$data) ?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="event.preventDefault(); $(this).deleteAjax('<?= '#delete-form-'.$data ?>')" class="btn btn-hover-danger btn-sm btn-icon btn-circle"><i class="la la-trash"></i></a>
    <?= form_open(base_url('admin/manage/lomba/delete_konfirmasi/'.$data), ['id' => 'delete-form-'.$data]) ?>
    <?= form_close(); ?>
</div>