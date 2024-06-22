<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Detail Peminjaman</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Detail Peminjaman</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<!-- Main content -->
					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<i class="fas fa-globe"></i> Peminjaman Buku Perpustakaan
									<small class="float-right">Date: <?= date('Y-m-d') ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
							<div class="col-sm-4 invoice-col">
								Atas Nama
								<address>
									<strong><?= $detail['peminjam']->nama_anggota ?></strong><br>
									NIS : <?= $detail['peminjam']->nis ?><br>
									Kelas <?= $detail['peminjam']->kelas ?><br>
								</address>
							</div>
							<!-- /.col -->

							<!-- /.col -->
							<div class="col-sm-4 invoice-col">
								<b>Tanggal Peminjaman:</b> <?= $detail['peminjam']->tgl_pinjam ?><br>
								<b>Batas Peminjaman:</b> <?= $detail['peminjam']->bts_pinjam ?><br>
								<?php
								$datein = date('Y-m-d');
								$date_bts = $detail['peminjam']->bts_pinjam;

								if ($date_bts < $datein) {
								?>
									<?php

									$awal  = date_create($detail['peminjam']->bts_pinjam);
									$akhir = date_create(); // waktu sekarang
									$diff  = date_diff($awal, $akhir);

									// Output: Selisih waktu: 28 tahun, 5 bulan, 9 hari, 13 jam, 7 menit, 7 detik
									$denda = 0;
									$denda = $diff->days * 1000;
									// echo 'Total Hari: ' . $diff->days;
									// Output: Total selisih hari: 10398
									?>
									<br>
									<h4><b>Denda:</b> Rp.<?= number_format($denda)  ?></h4>
									<input type="hidden" name="denda" value="<?= $denda ?>">

								<?php
								} else {
								?>
									<input type="hidden" name="denda" value="0">
								<?php
								}
								?>

							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Jumlah Peminjaman</th>
											<th>Kategori Buku</th>
											<th>Judul Buku</th>
											<th>Status Peminjaman</th>
										</tr>
									</thead>
									<tbody>
										<?php
										foreach ($detail['buku'] as $key => $value) {
										?>
											<tr>
												<td><?= $value->jml ?></td>
												<td><?= $value->nama_kategori ?></td>
												<td><?= $value->judul ?></td>
												<td><?php
													if ($value->stat_pinjam == '0') {
													?>
														<span class="badge badge-danger">Belum Dikembalikan</span>
														<br>
														<form action="<?= base_url('cPengembalian/kembali/' . $value->id_detail) ?>" method="POST">
															<?php
															$datein = date('Y-m-d');
															$date_bts = $value->bts_pinjam;

															if ($date_bts < $datein) {
															?>
																<?php

																$awal  = date_create($value->bts_pinjam);
																$akhir = date_create(); // waktu sekarang
																$diff  = date_diff($awal, $akhir);

																// Output: Selisih waktu: 28 tahun, 5 bulan, 9 hari, 13 jam, 7 menit, 7 detik
																$denda = 0;
																$denda = $diff->days * 1000;
																// echo 'Total Hari: ' . $diff->days;
																// Output: Total selisih hari: 10398
																?>
																<br>
																<h5><b>Denda:</b> Rp.<?= number_format($denda)  ?></h5>
																<p>Telat Pengembalian <?= $diff->days ?> Hari</p>
																<input type="hidden" name="denda" value="<?= $denda ?>">

															<?php
															} else {
															?>
																<input type="hidden" name="denda" value="0">
															<?php
															}
															?>
															<button type="submit" class="btn btn-warning btn-sm"><i class="fas fa-download"></i> Kembali</button>
														</form>
													<?php
													} else {
													?>
														<span class="badge badge-success">Sudah Dikembalikan</span>

													<?php
													}
													?>
												</td>
											</tr>
										<?php
										}
										?>

									</tbody>
								</table>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->
						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<button onclick="window.print()" class="btn btn-default"><i class="fas fa-print"></i> Print</button>
							</div>
						</div>
					</div>

					<!-- /.invoice -->
				</div><!-- /.col -->
			</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
