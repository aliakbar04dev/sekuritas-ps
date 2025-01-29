<?= $this->extend('backend/layout') ?>
<?= $this->section('body') ?>
        <div class="row">
            <div class="col-lg-7 mb-3">
                <h3>Detail Konfirmasi</h3>
                <table class="table">
                    <tbody>
                        
                        <tr>
                            <th scope="row">Nama</th>
                            <td><?= $data->nama ?></td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Email</th>
                            <td><?= $data->email ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Tanggal Pembayaran</th>
                            <td><?= $data->tanggal_pembayaran ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Bank</th>
                            <td><?= $data->bank ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nama Rekening</th>
                            <td><?= $data->nama_rekening ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Nomor Rekening</th>
                            <td><?= $data->nomor_rekening ?></td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Created Date</th>
                            <td><?= $data->created_at ?></td>
                        </tr>
                        
                        <tr>
                            <th scope="row">Total Pembayaran</th>
                            <td><?= "Rp " . number_format($data->jumlah_bayar,0,',','.') ?></td>
                        </tr>
                        <tr>
                            <th scope="row">Bukti Pembayaran</th>
                            <td>
                                <img class="img-fluid" src="<?= base_url('open_attachment?path=/uploads/konfirmasi/').$data->bukti_pembayaran ?>" alt="">
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>
        
<?= $this->endSection() ?>