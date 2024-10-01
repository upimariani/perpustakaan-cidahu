<!-- Start Book Overview -->
<section id="mu-book-overview">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mu-book-overview-area">

					<div class="card">
						<div class="card-header">
							<div class="mu-heading-area">
								<h2 class="mu-heading-title">Peminjaman Buku</h2>
								<span class="mu-header-dot"></span>
							</div>
						</div>
						<div class="card-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>No</th>
										<th>Tanggal Peminjaman</th>
										<th>Batas Peminjaman</th>
										<th>Buku Yang Dipinjam</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($peminjaman as $key => $value) {
										$buku_pinjam = $this->db->query("SELECT * FROM `peminjaman` JOIN detail_peminjaman ON peminjaman.id_pinjam=detail_peminjaman.id_pinjam JOIN buku ON buku.id_buku=detail_peminjaman.id_buku LEFT JOIN pengembalian ON pengembalian.id_detail=detail_peminjaman.id_detail WHERE peminjaman.id_pinjam='" . $value->id_pinjam . "'")->result();
									?>
										<tr>
											<td><?= $no++ ?>.</td>
											<td><?= $value->tgl_pinjam ?></td>
											<td><?= $value->bts_pinjam ?></td>
											<td><?php foreach ($buku_pinjam as $key => $item) {
													if ($item->stat_pinjam == '0') {
														$status = '<span class="label label-danger">Belum Dikembalikan</span>';
													} else {
														$status = '<span class="label label-success">Sudah Dikembalikan</span>';
													}
													echo $item->judul . ' ' . $status . '<br>';
												} ?></td>
											<td><?= $value->time ?></td>
										</tr>
									<?php
									}
									?>

								</tbody>

							</table>
						</div>
					</div>


					<hr>
					<br>
					<br>
					<br>

					<div class="mu-heading-area">
						<h2 class="mu-heading-title">Book Overview</h2>
						<span class="mu-header-dot"></span>
						<p>"Ada informasi yang luar biasa dalam buku. Seringkali ketika saya melakukan pencarian, apa yang ada di dalam buku jauh lebih cepat daripada yang saya temukan di situs web." - Sergey Brin</p>
					</div>

					<!-- Start Book Overview Content -->
					<div class="mu-book-overview-content">
						<div class="row">

							<?php
							foreach ($ebook as $key => $value) {
								if ($value->file) {

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