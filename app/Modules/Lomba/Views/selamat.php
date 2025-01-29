<?= $this->extend('frontend/index') ?>

<?= $this->section('head') ?>
    <link rel="stylesheet" href="<?= base_url() ?>/assets_frontend/lomba/css/style.css?v=<?= date('ymdhis') ?>">
<?= $this->endSection(); ?>

<?= $this->section('body') ?>
    <div id="lomba">
        <div id="selamat" class="container">
            <div class="heading">
                <div class="img">
                    <img src="<?= base_url('/assets_frontend/lomba/img/ornament-1.png') ?>" alt="">
                </div>
                <div class="title">
                    Selamat!
                </div>
                <div class="img">
                    <img src="<?= base_url('/assets_frontend/lomba/img/ornament-2.png') ?>" alt="">
                </div>
            </div>

            <div class="content-box text-center">
                <p class="mb-4">
                    Anda sudah terdaftar sebagai peserta <strong>PanenSaham Online Trading Competition 2022!</strong>
                </p>

                <p class="mb-2">
                    <b>Total Biaya:</b> <br> <h4 class="badge badge-warning" style="font-size: 20px"><?= $grand_text ?></h4>
                </p>
                <p class="mb-4">
                    <b>Pembayaran Pendaftaran:</b> <br>Bank Mandiri 1250014629059 (PT Carmel Anugerah Cemerlang)
                </p>

                <!-- <p class="mb-4">
                    Silahkan selesaikan pembayaran dalam waktu <span id="countdown-bayar">60:00</span>. <br>
                    Jangan lupa untuk membayar sesuai jumlah tagihan dengan nomor unik di akhir nominal.
                </p> -->

                <a href="<?= site_url('lomba/konfirmasi') ?>" class="btn btn-submit" type="button">Konfirmasi Pembayaran</a>
                
            </div>

            <div class="footer mt-5">
                <strong>Apa itu nomor unik?</strong> <br>
                <div class="text-muted">Nomor unik adalah 3 digit angka yang ditambahkan di akhir nominal total tagihan untuk memudahkan sistem memproses transaksi Anda. Hal ini dilakukan untuk mengantisipasi adanya kesalahan sistem dalam membaca transaksi dengan nominal transaksi yang sama. Setiap transaksi akan mendapatkan nomor unik acak yang berbeda.</div>
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>

<?= $this->section('script') ?>
    <script>
        $(function() {
            clock();
        });

        var myTimer;
        function clock() {
            myTimer = setInterval(myClock, 1000);
            var c = 3600; //Initially set to 1 hour


            function myClock() {
                --c
                var seconds = c % 60; // Seconds that cannot be written in minutes
                var minutes = (c - seconds) / 60; // Gives the seconds that COULD be given in minutes
                var minutesLeft = minutes % 60; // Minutes that cannot be written in hours
                var hours = (minutes - minutesLeft) % 60;
                // Now in hours, minutes and seconds, you have the time you need.
                console.clear();
                console.log(minutes + ":" + seconds);

                $("#countdown-bayar").html(minutes + ":" + seconds)

                if (c == 0) {
                    clearInterval(myTimer);
                }
            }
        }
    </script>
<?= $this->endSection(); ?>