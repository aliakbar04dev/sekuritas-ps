<div class="text-center">
    <button class="btn btn-hover-info btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Edit" onclick="window.location.href = '<?= base_url('admin/manage/users/form/'.$id) ?>'">
        <span class="la la-edit"></span>
    </button>
    <button class="btn btn-hover-danger btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Hapus" data-message="Apakah anda yakin ingin menghapus user: <?= $username ?> ?" onclick="$(this).deleteAjax('#delete-<?= $id ?>', event)">
        <span class="la la-trash"></span>
    </button>
    <?= form_open('admin/manage/users/delete', ['id' => 'delete-'.$id]) ?>
    <?= form_hidden('form[id]', $id) ?>
    <?= form_close(); ?>
</div>
