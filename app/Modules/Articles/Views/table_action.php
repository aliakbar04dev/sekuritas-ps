<div class="text-center">
    <a href="<?= base_url('admin/content/articles/form/'.$id) ?>" class="btn btn-hover-info btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
        <span class="la la-edit"></span>
    </a>
    
    <button class="btn btn-hover-danger btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="$(this).deleteAjax('#form-delete-<?= $id ?>')">
        <span class="la la-trash"></span>
    </button>
    <?= form_open(base_url('admin/content/articles/delete/'.$id), ['id' => 'form-delete-'.$id]) ?>
    <?= form_close(); ?>
</div>
