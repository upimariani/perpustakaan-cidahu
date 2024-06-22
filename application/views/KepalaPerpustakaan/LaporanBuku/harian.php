<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Informasi Laporan Buku Masuk</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Informasi Laporan Buku Masuk</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">

					<div class="invoice p-3 mb-3">
						<!-- title row -->
						<div class="row">
							<div class="col-12">
								<h4>
									<!-- <i class="fas fa-shopping-cart"></i>  -->
									<?= $title ?>
									<small class="float-right">Tanggal: <?= $tanggal ?>/<?= $bulan ?>/<?= $tahun ?></small>
								</h4>
							</div>
							<!-- /.col -->
						</div>
						<!-- info row -->
						<div class="row invoice-info">
						</div>
						<!-- /.row -->

						<!-- Table row -->
						<div class="row">
							<div class="col-12 table-responsive">
								<table class="table table-striped">
									<thead>
										<tr>
											<th>No</th>
											<th>Kategori</th>
											<th>Judul Buku</th>
											<th>Pengarang</th>
											<th>Penerbit</th>
											<th>Tanggal Masuk</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($laporan as $key => $value) { ?>
											<tr>
												<td><?= $no++ ?></td>
												<td><?= $value->nama_kategori ?></td>
												<td><?= $value->judul ?></td>
												<td><?= $value->pengarang ?></td>
												<td><?= $value->penerbit ?></td>
												<td><?= $value->create_at ?></td>
											</tr>
										<?php } ?>
									</tbody>
								</table>
								<h3></h3>
							</div>
							<!-- /.col -->
						</div>
						<!-- /.row -->

						<!-- this row will not appear when printing -->
						<div class="row no-print">
							<div class="col-12">
								<button class="btn btn-default" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
							</div>
						</div>
					</div>
					<!-- /.invoice -->
				</div><!-- /.col -->
			</div>
		</div>
	</section>
