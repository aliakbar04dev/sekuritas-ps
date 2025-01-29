<?= $this->extend('backend/layout') ?>
<?= $this->section('body') ?>
        <div class="row">
            <div class="col-lg-4 mb-3">
                <h3>Detail Pendaftaran</h3>
                <table class="table">
                    <tbody>
                        <tr>
                            <th scope="row" style="width: 200px;">Cabang</th>
                            <td><?= $data->cabang ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nama</th>
                            <td><?= $data->nama ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Bersama Teman</th>
                            <td><?= $data->bersama_teman ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Created Date</th>
                            <td><?= $data->created_at ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Peserta</th>
                            <td><?= $data->total_peserta ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Total Pembayaran</th>
                            <td><?= "Rp " . number_format($data->total_pembayaran,0,',','.') ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Status Pembayaran</th>
                            <td><?= ($data->status_pembayaran == 0) ? '<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#paymentConfirm">Belum Bayar</button>' : '<button type="button" class="btn btn-success">Sudah Bayar</button>' ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8 mb-3">
                <?php 
                    if(!empty($teman)){
                        ?>
                        <h3>Data Peserta</h3>
                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Client ID</th>
                                <th>Nasabah</th>
                                <th>Telepon</th>
                            </tr>
                            <?php 
                                $i = 1;
                                foreach ($teman as $item) {
                                    ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $item->nama ?></td>
                                        <td><?= $item->email ?></td>
                                        <td><?= $item->client_id ?></td>
                                        <td><?= $item->nasabah ?></td>
                                        <td><?= $item->telepon ?></td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
                            ?>
                        </table>
                        <?php
                    }
                ?>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="paymentConfirm" tabindex="-1" aria-labelledby="paymentConfirm" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Ubah Status Pembayaran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="<?= site_url('admin/manage/lomba/pay/'.$data->id) ?>" method="post">
                            <?= csrf_field(); ?>
                            <div class="form-group">
                                <label for="">Ubah Status</label>
                                <select name="status_pembayaran" id="status_pembayaran" class="form-control">
                                    <option value="0">Belum Bayar</option>
                                    <option value="1">Sudah Bayar</option>
                                </select>
                            </div>
                            <div class="text-right">
                                <button class="btn btn-primary" type="submit" id="btn-save">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
<?= $this->endSection() ?>
