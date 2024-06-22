<!-- Start Book Overview -->
<section id="mu-book-overview">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-book-overview-area">

                    <div class="mu-heading-area">
                        <h2 class="mu-heading-title">Buku Per Kategori</h2>
                        <span class="mu-header-dot"></span>
                        <p>"Ada informasi yang luar biasa dalam buku. Seringkali ketika saya melakukan pencarian, apa yang ada di dalam buku jauh lebih cepat daripada yang saya temukan di situs web." - Sergey Brin</p>
                    </div>

                    <!-- Start Book Overview Content -->
                    <div class="mu-book-overview-content">
                        <div class="row">

                            <?php
                            foreach ($buku as $key => $value) {
                            ?>
                                <!-- Book Overview Single Content -->
                                <div class="col-md-3">
                                    <div class="mu-book-overview-single">
                                        <span class="mu-book-overview-icon-box">
                                            <img style="width: 250px; height: 350px;" src="<?= base_url('asset/sampul/' . $value->sampul) ?>">
                                        </span>
                                        <h4><?= $value->judul ?><br><small>Pengarang : <?= $value->pengarang ?></small></h4>

                                        <a href="<?= base_url('cLearning/detailebook/' . $value->id_buku) ?>" class="btn btn-warning">Baca Selengkapnya ...</a>
                                    </div>
                                </div>
                                <!-- / Book Overview Single Content -->
                            <?php
                            }
                            ?>
                        </div>
                        <!-- End Book Overview Content -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- End Book Overview -->