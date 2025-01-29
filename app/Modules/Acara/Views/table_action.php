
<div class="text-center">
    <button class="btn btn-hover-info btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href = '<?= base_url('admin/content/acara/form/'.$id) ?>'">
        <span class="la la-edit"></span>
    </button>
    <button class="btn btn-hover-danger btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="$(this).deleteAjax('#form-delete-<?= $id ?>')">
        <span class="la la-trash"></span>
    </button>
    <?= form_open(base_url('admin/content/acara/delete/'.$id), ['id' => 'form-delete-'.$id]) ?>
    <?= form_close(); ?>
</div>
