<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>

<div class="main">
    <?php if ($mobile == true) : ?>
        <section class="feature-section">
            <div class="container">
                <div class="row ml-3 mr-3">
                    <div class="col-md-5 text-center tengahvertikal" style="margin-top: -7%;">
                        <h3>Tentang Perusahaan</h3>
                        <hr style="border: 1px solid black; margin-top:-3px;">
                        <p style="text-align: justify; color:black; font-size:13px; margin-bottom:10%;">
                            PT PanenSAHAM Sekuritas Indonesia merupakan Perusahaan Efek Non Anggota Bursa yang bekerjasama dengan Mandiri Sekuritas. Kami berdiri sejak 20 April 2015 dan sudah memiliki Izin OJK.
                            <br> <br>
                            Kami memiliki kantor cabang di Artha Gading (Jakarta), Balikpapan, Padang, Banjarmasin, Makassar dan akan terus melakukan ekspansi ke berbagai kota di Indonesia.
                        </p>
                    </div>
                    <div class="col-md-1 text-left" style="margin-top:-20%;">
                        <img src="<?= base_url() ?>/assets_frontend/img/timelinetentangkami.png" alt="" width="40">
                    </div>
                    <div class="col-md-4 text-left" style="margin-top:-85%; margin-left:15%;">
                        <p style="font-size: 12px; color:black;">2022 <br>
                            <font class="tebel">Berganti nama menjadi PanenSAHAM Sekuritas Indonesia </font>
                        </p>
                        <p style="font-size: 12px; color:black; margin-bottom:5%;">2021 <br>
                            <font class="tebel">Bekerjasama dengan PT Mandiri Sekuritas </font>
                        </p>
                        <p style="font-size: 12px; color:black; margin-bottom:5%;">2015 <br>
                            <font class="tebel">Pendirian PT Carmel Sekuritas Nusantara </font>
                        </p>
                        <p style="font-size: 12px; color:black;">2012 <br>
                            <font class="tebel">Dimulai terbentuknya komunitas PanenSAHAM </font>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section ptb-50 text-center" style="margin-top: -10%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <div class="card text-center single-pricing-pack mt-4" style="background: rgba(227, 227, 227, 1);">
                            <div class="p-4">
                                <h5 class="mb-3" style="color: rgba(209, 146, 0, 1);">Visi Perusahaan</h5>
                                <p style="color:black; font-size:13px">
                                    Menjadi perusahaan yang terbaik dan paling dipercaya dalam membantu mengoptimalkan pertumbuhan investasi masyarakat melalui edukasi Pasar Modal.
                                </p>
                            </div>
                        </div>
                        <br>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/visimisi1.svg" width="80%" alt="">
                    </div>
                    <div class="col-md-4 text-left">
                        <br>
                        <div class="card text-center single-pricing-pack mt-4" style="background: rgba(227, 227, 227, 1);">
                            <div class="p-4">
                                <h5 class="mb-3" style="color: rgba(209, 146, 0, 1);">Misi Perusahaan</h5>
                                <p style="color:black; font-size:13px">
                                    Mendapatkan kepercayaan masyarakat dengan memberikan pelayanan edukasi pasar modal yang tepat, jujur dan mudah dimengerti. <br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section mt-5 mb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading mb-5">
                            <h3 class="text-center">Manajemen</h3>
                            <hr style="border: 1px solid black; margin-top:-3px;">
                            <div class="row mb-5">
                                <div class="col-md-3 text-center">
                                    <img src="<?= base_url() ?>/assets_frontend/img/iburohayati1.png" width="70%" alt="">
                                </div>
                                <div class="col-md-9 text-justify">
                                    <div style="margin-bottom: 5%;"></div>
                                    <p style="color:black; font-size:13px;">
                                        Lahir tahun 1966. Menyelesaikan Pendidikan di Sekolah Tinggi Ilmu Akutansi STIE Widya Wiwaha, Yogyakarta pada tahun 1991. <br>
                                        Selama Berkarir, Ybs. Menekuni di bidang Audit dan Pengawas Bank Perkreditan Rakyat (BPR). <br>
                                        Diawali berkarir di PT. Mekar Saudara Jaya pada Bagian Akutansi (1992-1993), Kepala Bagian (Kabag) Akutansi (1993-1996), Kepala Bagian Internal Audit (1996-2000). <br>
                                        Ybs. pernah menjabat sebagai Komisaris PT. BPR Pasar Boja (2001-2008), Satuan Pengawas Independent (SPI) PT. BPR Artha Mas (2012-2014), Komisaris PT. BPR Asabahana Sejahtera (2017 – 2022). <br>
                                        Saat ini aktif sebagai Komisaris Utama PT. BPR Juwana Artha Sentosa (2014 – sekarang), <br>
                                        Dan Komisaris PT. Panen Saham Sekuritas Indonesia. (2019 - sekarang).
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-center">
                                    <img src="<?= base_url() ?>/assets_frontend/img/pakantony1.png" width="70%" alt="">
                                </div>
                                <div class="col-md-9 text-justify">
                                    <div style="margin-bottom: 5%;"></div>
                                    <p style="color:black; font-size:13px;">
                                        Lahir tahun 1978. Memperoleh gelar Sarjana (S1) Sains di bidang Fisika, Lulusan Fakultas Matematika Dan Ilmu Pengetahuan Alam (FMIPA) Universitas Indonesia. <br>
                                        Mengawali Karir melalui Program Pendidikan Eksekutif (PPE) Bank Niaga Tbk dan setelah lulus menjabat sebagai Sub-Manager Commercial Banking Bank Niaga Medan (2003-2005), Personal Banking Manager (PBM) Bank Danamon Tbk (2005-2006), Branch Manager PT. Panin Sekuritas Tbk (2006-2009), Branch Manager PT. Artha Securities Indonesia (2009-2011), Managing Partner PT. Mandiri Sekuritas (2011-2016). <br>
                                        Dan Kemudian menjabat sebagai Direktur PT. Carmel Anugerah Mandiri. saat ini menjabat Direktur PT. Panen Saham Sekuritas Indonesia. (d/h PT. Carmel Sekuritas Nusantara)
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section" style="padding: 10px; margin-top:-20%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading mb-5">
                            <h3 class="text-center">Struktur Organisasi</h3>
                            <hr style="border: 1px solid black;" class="mb-4">
                            <div class="row" style="text-align: center;">
                                <div class="col-md-12 text-center">
                                    <img src="<?= base_url() ?>/assets_frontend/img/strukturorganisasi.svg" width="100%" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php else : ?>
        <section class="feature-section" style="padding-top: 5%;">
            <div class="container">
                <div class="row">
                    <div class="col-md-1 text-left">
                        <img src="<?= base_url() ?>/assets_frontend/img/timelinetentangkami.png" alt="" width="44" style="margin-top: -10%;">
                    </div>
                    <div class="col-md-4 text-left" style="margin-left: -3%; margin-right: 2%;">
                        <p style="font-size: 12px; color:black; margin-bottom:10%; margin-top:1%;">2022 <br>
                            <font class="tebel">Berganti nama menjadi PanenSAHAM Sekuritas Indonesia </font>
                        </p>
                        <p style="font-size: 12px; color:black; margin-bottom:11%;">2021 <br>
                            <font class="tebel">Bekerjasama dengan PT Mandiri Sekuritas </font>
                        </p>
                        <p style="font-size: 12px; color:black; margin-bottom:10%;">2015 <br>
                            <font class="tebel">Pendirian PT Carmel Sekuritas Nusantara </font>
                        </p>
                        <p style="font-size: 12px; color:black;">2012 <br>
                            <font class="tebel">Dimulai terbentuknya komunitas PanenSAHAM </font>
                        </p>
                    </div>
                    <div class="col-md-2 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/garistentangkami.svg" alt="">
                    </div>
                    <div class="col-md-5 text-left">
                        <div style="margin-bottom: 8%;"></div>
                        <h3>Tentang Perusahaan</h3>
                        <p style="text-align: justify; color:black; font-size:13px;">
                            PT PanenSAHAM Sekuritas Indonesia merupakan Perusahaan Efek Non Anggota Bursa yang bekerjasama dengan Mandiri Sekuritas. Kami berdiri sejak 20 April 2015 dan sudah memiliki Izin OJK.
                            <br> <br>
                            Kami memiliki kantor cabang di Artha Gading(Jakarta), Balikpapan, Padang, Banjarmasin, Makassar dan akan terus melakukan ekspansi ke berbagai kota di Indonesia.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section ptb-100 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 text-left">
                        <br>
                        <div class="card text-center single-pricing-pack mt-4" style="background: rgba(227, 227, 227, 1);">
                            <div class="p-4">
                                <h5 class="mb-3" style="color: rgba(209, 146, 0, 1);">Visi Perusahaan</h5>
                                <p style="color:black; font-size:13px">
                                    Menjadi perusahaan yang terbaik dan paling dipercaya dalam membantu mengoptimalkan pertumbuhan investasi masyarakat melalui edukasi Pasar Modal.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="<?= base_url() ?>/assets_frontend/img/visimisi1.svg" width="80%" alt="">
                    </div>
                    <div class="col-md-4 text-left">
                        <br>
                        <div class="card text-center single-pricing-pack mt-4" style="background: rgba(227, 227, 227, 1);">
                            <div class="p-4">
                                <h5 class="mb-3" style="color: rgba(209, 146, 0, 1);">Misi Perusahaan</h5>
                                <p style="color:black; font-size:13px">
                                    Mendapatkan kepercayaan masyarakat dengan memberikan pelayanan edukasi pasar modal yang tepat, jujur dan mudah dimengerti. <br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section mb-5" style="padding: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading mb-5">
                            <h3>Manajemen</h3>
                            <hr style="border: 1px solid black; margin-top:-3px;">
                            <div class="row mb-5">
                                <div class="col-md-3 text-left">
                                    <img src="<?= base_url() ?>/assets_frontend/img/iburohayati1.png" width="70%" alt="">
                                </div>
                                <div class="col-md-9 text-justify">
                                    <div style="margin-bottom: 5%;"></div>
                                    <p style="color:black; font-size:13px;">
                                        Lahir tahun 1966. Menyelesaikan Pendidikan di Sekolah Tinggi Ilmu Akutansi STIE Widya Wiwaha, Yogyakarta pada tahun 1991. <br>
                                        Selama Berkarir, Ybs. Menekuni di bidang Audit dan Pengawas Bank Perkreditan Rakyat (BPR). <br>
                                        Diawali berkarir di PT. Mekar Saudara Jaya pada Bagian Akutansi (1992-1993), Kepala Bagian (Kabag) Akutansi (1993-1996), Kepala Bagian Internal Audit (1996-2000). <br>
                                        Ybs. pernah menjabat sebagai Komisaris PT. BPR Pasar Boja (2001-2008), Satuan Pengawas Independent (SPI) PT. BPR Artha Mas (2012-2014), Komisaris PT. BPR Asabahana Sejahtera (2017 – 2022). <br>
                                        Saat ini aktif sebagai Komisaris Utama PT. BPR Juwana Artha Sentosa (2014 – sekarang), <br>
                                        Dan Komisaris PT. PanenSAHAM Sekuritas Indonesia. (2019 - sekarang).
                                    </p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3 text-left">
                                    <img src="<?= base_url() ?>/assets_frontend/img/pakantony1.png" width="70%" alt="">
                                </div>
                                <div class="col-md-9 text-justify">
                                    <div style="margin-bottom: 5%;"></div>
                                    <p style="color:black; font-size:13px;">
                                        Lahir tahun 1978. Memperoleh gelar Sarjana (S1) Sains di bidang Fisika, Lulusan Fakultas Matematika Dan Ilmu Pengetahuan Alam (FMIPA) Universitas Indonesia. <br>
                                        Mengawali Karir melalui Program Pendidikan Eksekutif (PPE) Bank Niaga Tbk dan setelah lulus menjabat sebagai Sub-Manager Commercial Banking Bank Niaga Medan (2003-2005), Personal Banking Manager (PBM) Bank Danamon Tbk (2005-2006), Branch Manager PT. Panin Sekuritas Tbk (2006-2009), Branch Manager PT. Artha Securities Indonesia (2009-2011), Managing Partner PT. Mandiri Sekuritas (2011-2016). <br>
                                        Dan Kemudian menjabat sebagai Direktur PT. Carmel Anugerah Mandiri. saat ini menjabat Direktur PT. PanenSAHAM Sekuritas Indonesia. (d/h PT. Carmel Sekuritas Nusantara)
                                    </p>
                                    <!-- <p style="color:black; font-size:13px;">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque semper pharetra mauris, eget elementum mi aliquam eu. Sed tincidunt placerat nulla. Aliquam ut neque non lacus vulputate ornare ac quis augue. Aliquam varius massa ut turpis rutrum mattis. Fusce quis sollicitudin felis, vel vulputate risus. Aliquam erat volutpat. In porttitor mauris at dui cursus, et bibendum nunc euismod. <br><br>
                                        Maecenas et mauris interdum, tincidunt orci ac, consequat sapien. Maecenas egestas arcu et odio vulputate laoreet. Vestibulum facilisis arcu id ante iaculis, a cursus dui cursus. Aliquam malesuada dapibus vehicula. Suspendisse potenti. Suspendisse vitae semper neque. Duis eget sem odio.
                                    </p> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="feature-section" style="padding: 10px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-12">
                        <div class="section-heading mb-5">
                            <h3>Struktur Organisasi</h3>
                            <hr style="border: 1px solid black;" class="mb-5">
                            <div class="row" style="text-align: center;">
                                <div class="col-md-12 text-center">
                                    <img src="<?= base_url() ?>/assets_frontend/img/strukturorganisasi.svg" width="60%" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
</div>
<?= $this->endSection(); ?>
