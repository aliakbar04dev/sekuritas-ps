<div class="text-center">
    <a href="<?= base_url('admin/manage/subscribers/delete/'.$data) ?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="event.preventDefault(); $(this).deleteAjax('<?= '#delete-form-'.$data ?>')" class="btn btn-hover-danger btn-sm btn-icon btn-circle"><i class="la la-trash"></i></a>
    <?= form_open(base_url('admin/manage/subscribers/delete/'.$data), ['id' => 'delete-form-'.$data]) ?>
    <?= form_close(); ?>
</div>