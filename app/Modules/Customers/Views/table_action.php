<div class="text-center">
    <a href="<?= base_url('admin/manage/members/form/'.$data) ?>" class="btn btn-hover-info btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Edit">
        <span class="la la-edit"></span>
    </a>
    
    <a href="<?= base_url('admin/manage/members/delete/'.$data) ?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="event.preventDefault(); $(this).deleteAjax('<?= '#delete-form-'.$data ?>')" class="btn btn-hover-danger btn-sm btn-icon btn-circle"><i class="la la-trash"></i></a>
    <?= form_open(base_url('admin/manage/members/delete/'.$data), ['id' => 'delete-form-'.$data]) ?>
    <?= form_close(); ?>
</div>