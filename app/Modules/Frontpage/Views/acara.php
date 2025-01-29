<?= $this->extend('frontend/index') ?>
<?= $this->section('body') ?>
    <section class="">
        <div class="jumbotron bg-title-pssi">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="display-4">Acara Edukasi</h1>
                        <p class="lead">Jadwal Acara EDukasi oleh Tim Edukasi PanenSAHAM</p>
                    </div>
                    <div class="col-md-6 ">
                        <?= form_open() ?>
                            <div class="row ">
                                <div class="col-md-6 d-flex my-auto">
                                    <input type="text" placeholder="Cari Sesuatu disini" class="form-control">
                                    <button class="btn btn-warning"><span class="fa fa-search"></span></button>
                                </div>
                            </div>
                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
           <?= form_open() ?>
                <div class="form-group d-flex">
                    <select name="" id="" class="form-control mr-3">
                        <option value="">Bulan</option>
                    </select>
                    <select name="" id="" class="form-control mr-3">
                        <option value="">Kota</option>
                    </select>
                    <select name="" id="" class="form-control">
                        <option value="">Level</option>
                    </select>
                </div>
           <?= form_close() ?>
        </div>
        <div class="row mt-3">
            <?php for($i = 1; $i <= 6; $i++){ ?>
                <div class="col-md-4">
                    <?= view('App/Modules/Frontpage/Views/artikel_box') ?>
                </div>
            <?php } ?>
        </div>
        <div class="row" style="margin-top: 5rem; margin-bottom: 5rem">
            <div class="col-4 offset-4">
                <nav aria-label="Page navigation example ">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">Next</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>