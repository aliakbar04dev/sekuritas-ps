<div class="text-center">
    <a href="<?= base_url('admin/manage/edukasi/create/'.$data) ?>" class="btn btn-hover-info btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Read">
        <span class="la la-eye"></span>
    </a>
    <a href="<?= base_url('admin/manage/edukasi/peserta/'.$data) ?>" class="btn btn-hover-info btn-sm btn-icon btn-circle" data-toggle="tooltip" data-placement="top" title="Peserta">
        <span class="la la-clipboard"></span>
    </a>
    <a href="<?= base_url('admin/manage/edukasi/delete_edukasi/'.$data) ?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="event.preventDefault(); $(this).deleteAjax('<?= '#delete-form-'.$data ?>')" class="btn btn-hover-danger btn-sm btn-icon btn-circle"><i class="la la-trash"></i></a>
    <?= form_open(base_url('admin/manage/edukasi/delete_edukasi/'.$data), ['id' => 'delete-form-'.$data]) ?>
    <?= form_close(); ?>
</div>