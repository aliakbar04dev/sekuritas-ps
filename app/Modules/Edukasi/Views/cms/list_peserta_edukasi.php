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
            </div>
        </div>
    </div>
    <div class="px-4 py-5">
        <table class="table">
            <tr>
                <th style="width: 200px">Nama Edukasi</th>
                <td><?= @$data->nama_edukasi ?></td>
            </tr>
            <tr>
                <th>Tanggal Edukasi</th>
                <td><?= @$data->tanggal_edukasi ?></td>
            </tr>
            <tr>
                <th>Tempat</th>
                <td><?= @$data->tempat_acara ?></td>
            </tr>
            <tr>
                <th>Waktu</th>
                <td><?= @$data->waktu_acara ?></td>
            </tr>
            <tr>
                <th>Pembicara</th>
                <td><?= @$data->pembicara ?></td>
            </tr>
            <tr>
                <th>Level</th>
                <td><?= @$data->level_edukasi ?></td>
            </tr>
        </table>

        <h4>Daftar Peserta</h4>
        <table class="table table-bordered mt-4">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Handphone</th>
                <th>Client ID</th>
                <th>Kode Referal</th>
                <th>Created At</th>
                <th>Aksi</th>
            </tr>
            <?php 
                if($peserta){
                    $i = 1;
                    foreach ($peserta as $item) {
                        ?>
                        <tr>
                            <td><?= $i ?></td>
                            <td><?= $item->nama ?></td>
                            <td><?= $item->email ?></td>
                            <td><?= $item->handphone ?></td>
                            <td><?= $item->client_id ?></td>
                            <td><?= $item->kode_referal ?></td>
                            <td><?= $item->created_at ?></td>
                            <td>
                                <a href="<?= base_url('admin/manage/edukasi/delete_peserta/'.$item->id) ?>" data-toggle="tooltip" data-placement="top" title="Hapus" onclick="event.preventDefault(); delete_ajax('<?= $item->id ?>')" class="btn btn-hover-danger btn-sm btn-icon btn-circle">
                                    <i class="la la-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php
                        $i++;
                    };
                }else{
                    ?>
                    <tr>
                        <td colspan="8" class="text-center">Belum ada peserta</td>
                    </tr>
                    <?php
                }
                
            ?>
        </table>
    </div>
</div>


<?= form_open(base_url('admin/manage/edukasi/peserta/delete/')) ?>
    <input type="hidden" id="id" name="id">
<?= form_close(); ?>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>
<script>
    ajaxLoader.show();
    $(document).ready(function(){
        ajaxLoader.hide();
    });

    function delete_ajax(id){
        console.log(id);

        $("#id").val(id);

        Swal.fire({
            title: 'Anda yakin',
            text: 'ingin menghapus data ini?',
            type: 'question',
            confirmButtonText: 'Ya',
            cancelButtonText: 'Batal',
            showConfirmButton: true,
            showCancelButton: true,
            confirmButtonColor: '#D19200',
            cancelButtonColor: '#492E1F',
            closeOnCancel: true
        }).then(function(isConfirmed){
            console.log(isConfirmed);
            isConfirmed.value ? delete_peserta(id) : '';
        })
    }

    function delete_peserta(id){
        console.log('delete peserta');
        ajaxLoader.show();
        $.ajax({
            type: 'POST',
            data: $('form').serialize(),
            dataType: "json",
            url: '<?= site_url('admin/manage/edukasi/peserta/delete') ?>',
            success: function(response){
                console.log(response);
                if(response.sucess){
                    Swal.fire({
                        type: 'success',
                        confirmButtonColor: '#D19200',
                        cancelButtonColor: '#492E1F',
                        title: response.title ?? 'Berhasil',
                        text: response.msg
                    })
                    setTimeout(function(){
                        Swal.close;
                        location.reload();
                    }, 1000)
                }else{
                    Swal.fire({
                        type: 'error',
                        title: 'Gagal',
                        text: 'Terjadi Kesalahan saat menghapus data'
                    })
                    setTimeout(function(){
                        Swal.close();
                    }, 2000);
                    setTimeout(function(){
                    }, 2000);
                }
            },
            error: function(response){
                Swal.fire({
                    type: 'error',
                    title: 'Gagal',
                    text: 'Internal Server Error'
                })
            }
        })
    }
    
    
</script>

<?= $this->endSection() ?>