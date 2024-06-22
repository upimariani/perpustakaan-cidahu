<!-- Start Author -->
<section id="mu-author">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-author-area">

                    <div class="mu-heading-area">
                        <h2 class="mu-heading-title">Detail E-Book</h2>
                        <span class="mu-header-dot"></span>
                    </div>

                    <!-- Start Author Content -->
                    <div class="mu-author-content">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mu-author-image">
                                    <img style="width: 500px;" src="<?= base_url('asset/sampul/' . $ebook->sampul) ?>" alt="Author Image">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mu-author-info">
                                    <h3><?= $ebook->judul ?></h3><br>
                                    <p>Pengarang : <strong><?= $ebook->pengarang ?></strong></p>
                                    <p>Tahun : <?= $ebook->tahun ?></p>
                                    <p>Penerbit : <?= $ebook->penerbit ?></p>
                                    <p><?= $ebook->sinopsis ?></p>

                                    <a href="<?= base_url('asset/elearning/' . $ebook->file) ?>" class="btn btn-warning">Download File</a>
                                    <div class="mu-author-social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Author Content -->

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Author -->