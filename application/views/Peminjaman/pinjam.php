<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Peminjaman Buku Perpustakaan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">DataTables</li>
					</ol>
				</div>
			</div>
			<?php
			if ($this->session->userdata('success')) {
			?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-check"></i> Alert!</h5>
					<?= $this->session->userdata('success') ?>
				</div>
			<?php
			}
			?>
		</div><!-- /.container-fluid -->
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Peminjaman Buku</h3><br>
							<a href="<?= base_url('cPeminjaman/create') ?>" class="btn btn-warning">Create Peminjaman</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">Id Pinjam</th>
										<th class="text-center">NIS</th>
										<th class="text-center">Anggota</th>
										<th class="text-center">Tanggal Pinjam</th>
										<th class="text-center">Batas Peminjaman</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pinjam as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->id_pinjam ?></td>
											<td><?= $value->nis ?></td>
											<td>Nama : <?= $value->nama_anggota ?><br>
												Kelas : <?= $value->kelas ?></td>
											<td><?= $value->tgl_pinjam ?></td>
											<td><?= $value->bts_pinjam ?></td>
											<td class="text-center">
												<!-- <a href="<?= base_url('cPeminjaman/edit/' . $value->id_pinjam) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-edit"></i> Edit
												</a> -->
												<a href="<?= base_url('cPeminjaman/delete/' . $value->id_pinjam) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-trash"></i> Delete
												</a>
												<a href="<?= base_url('cPeminjaman/detail_peminjaman/' . $value->id_pinjam) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-info"></i> Detail
												</a>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">Id Pinjam</th>
										<th class="text-center">NIS</th>
										<th class="text-center">Anggota</th>
										<th class="text-center">Tanggal Pinjam</th>
										<th class="text-center">Batas Peminjaman</th>
										<th class="text-center">Action</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
