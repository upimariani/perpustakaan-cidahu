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
												<button type="button" data-toggle="modal" data-target="#elearning<?= $value->id_buku ?>" class="btn btn-app">
													<i class="fas fa-plus"></i> E-Learning
												</button>
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

<?php
foreach ($buku as $key => $value) {
?>
	<form role="form" action="<?= base_url('cKelolaDataMaster/elearning/' . $value->id_buku) ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
		<div class="modal fade" id="elearning<?= $value->id_buku ?>">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Masukkan Data E-Learning <br>Buku <strong> <?= $value->judul ?></strong></h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="card-body">
							<div class="form-group">
								<label for="exampleInputPassword1">Sinopsis</label>
								<textarea class="textarea" name="sinopsis" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $value->sinopsis ?></textarea>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">File e-Buku</label><br>
								<a href="<?= base_url('asset/elearning/' . $value->file) ?>"><?= $value->file ?></a>
								<input type="file" name="elearning" class="form-control" id="exampleInputPassword1">
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<div class="modal-footer justify-content-between">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary">Save changes</button>
					</div>
				</div>
				<!-- /.modal-content -->
			</div>
			<!-- /.modal-dialog -->
		</div>
	</form>
<?php
}
?>

<!-- /.modal -->
