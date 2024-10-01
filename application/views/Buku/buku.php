<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Daftar Buku Perpustakaan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Daftar Buku</li>
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
							<h3 class="card-title">Informasi Buku Perpustakaan</h3><br>
							<a href="<?= base_url('ckeloladatamaster/create_buku') ?>" class="btn btn-warning mt-3">Create New Buku</a>

						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">No ISBN</th>
										<th class="text-center">Sampul</th>
										<th class="text-center">Judul</th>
										<th class="text-center">Pengarang</th>
										<th class="text-center">Penerbit</th>
										<th class="text-center">Tahun</th>
										<th class="text-center">Jumlah Buku</th>
										<th class="text-center">Create At</th>
										<th class="text-center">Status E-Learning</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($buku as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?>.</td>
											<td><?= $value->no_isbn ?></td>
											<td><img style="width: 200px;" src="<?= base_url('asset/sampul/' . $value->sampul) ?>"></td>
											<td><?= $value->judul ?><br>
												Kategori: <span class="badge badge-info"> <?= $value->nama_kategori ?></span>
												<br>Kelas : <?= $value->kelas ?>
											</td>
											<td><?= $value->pengarang ?></td>
											<td><?= $value->penerbit ?></td>
											<td><?= $value->tahun ?></td>
											<td><?= $value->jml_buku ?></td>
											<td><?= $value->create_at ?></td>
											<td class="text-center"><?php if ($value->sinopsis == NULL) {
																		echo '<span class="badge badge-danger">Tidak Tersedia</span>';
																	} else {
																		echo '<span class="badge badge-success">Tersedia</span>';
																	}  ?></td>
											<td class="text-center">
												<a href="<?= base_url('cKelolaDataMaster/edit_buku/' . $value->id_buku) ?>" class="btn btn-app">
													<i class="fas fa-edit"></i> Edit
												</a>
												<a href="<?= base_url('cKelolaDataMaster/delete_buku/' . $value->id_buku) ?>" class="btn btn-app">
													<i class="fas fa-trash"></i> Delete
												</a>
												<a href="<?= base_url('cKelolaDataMaster/vlearning/' . $value->id_buku) ?>" class="btn btn-app">
													<i class="fas fa-plus"></i> E-Learning
												</a>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">No ISBN</th>
										<th class="text-center">Sampul</th>
										<th class="text-center">Judul</th>
										<th class="text-center">Pengarang</th>
										<th class="text-center">Penerbit</th>
										<th class="text-center">Tahun</th>
										<th class="text-center">Jumlah Buku</th>
										<th class="text-center">Create At</th>
										<th class="text-center">Status E-Learning</th>
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



<!-- /.modal -->