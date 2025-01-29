<?= $this->extend('frontend/index') ?>

<?= $this->section('head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/lomba/css/style.css?v=<?= date('ymdhis') ?>">
<?= $this->endSection(); ?>

<?= $this->section('body') ?>
    <div id="lomba">
        <div id="konfirmasi" class="container py-5">
            <div class="content p-4">
                <div class="heading">
                    Detail Pembayaran
                </div>

                <div class="px-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control-plaintext border-bottom" value="<?= $data['nama']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control-plaintext border-bottom" value="<?= $data['email']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tanggal Pembayaran</label>
                                <input type="text" class="form-control-plaintext border-bottom" value="<?= $data['tanggal_pembayaran']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Bank Pengirim</label>
                                <input type="text" class="form-control-plaintext border-bottom" value="<?= $data['bank']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nama Pemilik Rekening</label>
                                <input type="text" class="form-control-plaintext border-bottom" value="<?= $data['nama_rekening']; ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Nomor Rekening</label>
                                <input type="text" class="form-control-plaintext border-bottom" value="<?= $data['nomor_rekening']; ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Jumlah Bayar</label>
                                <input type="text" class="form-control-plaintext border-bottom" value="<?= "Rp " . number_format($data['jumlah_bayar'],0,',','.') ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-5 mb-5">
                    <p class="mb-5">
                        Terimakasih sudah mengkonfirmasi pembayaran Anda. <br>
                        Kami akan segera melakukan verifikasi pembayaran Anda.
                    </p>

                    <p>
                        Punya pertanyaan? Silahkan hubungi  Customer Service kami di bawah ini:
                    </p>
                    
                    <a href="https://api.whatsapp.com/send?phone=6285850309038" target="_blank">
                        <button type="button" class="btn btn-success btn-lg mr-2 px-5">WhatsApp</button>
                    </a>
                    <a href="#">
                        <button type="button" class="btn btn-secondary btn-lg px-5">0858-5030-9038</button>
                    </a>
                </div>
            </div>
            
        </div>
    </div>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
    <script>
        
    </script>
<?= $this->endSection(); ?>