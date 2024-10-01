<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Anggota Perpustakaan</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Anggota</li>
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
							<h3 class="card-title">Informasi Anggota Perpustakaan</h3><br>
							<a href="<?= base_url('cAnggota/create') ?>" class="btn btn-warning mt-3">Create New Anggota</a>
							<a href="<?= base_url('cAnggota/cetak') ?>" class="btn btn-info mt-3">Cetak Anggota</a>
						</div>
						<div class="card">
							<div class="card-header"></div>
							<div class="card-body">
								<form action="<?= base_url('cAnggota/cetak_kartu') ?>" method="POST">
									<div class="row">
										<div class="col-lg-6">
											<label>Pilih Nama Anggota yang Akan Dicetak</label>
											<select name="id_anggota" class="form-control" required>
												<option value="">---Pilih Siswa---</option>
												<?php
												foreach ($anggota as $key => $value) {
												?>
													<option value="<?= $value->id_anggota ?>"><?= $value->nama_anggota ?></option>
												<?php
												}
												?>

											</select>
											<button type="submit" class="btn btn-success mt-3">Cetak Kartu Anggota</button>
										</div>
										<div class="col-lg-6"></div>
									</div>
								</form>

							</div>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">NIS</th>
										<th class="text-center">Nama Anggota</th>
										<th class="text-center">Kelas</th>
										<th class="text-center">Jenis Kelamin</th>
										<th class="text-center">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($anggota as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value->nis ?></td>
											<td><?= $value->nama_anggota ?></td>
											<td><?= $value->kelas ?></td>
											<td><?php if ($value->jk == '1') {
													echo 'Perempuan';
												} else {
													echo 'Laki-Laki';
												} ?></td>
											<td class="text-center">
												<a href="<?= base_url('cAnggota/edit/' . $value->id_anggota) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-edit"></i> Edit
												</a>
												<a href="<?= base_url('cAnggota/delete/' . $value->id_anggota) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-trash"></i> Delete
												</a>
											</td>
										</tr>
									<?php
									}
									?>

								</tbody>
								<tfoot>
									<th class="text-center">No.</th>
									<th class="text-center">NIS</th>

									<th class="text-center">Nama Anggota</th>
									<th class="text-center">Kelas</th>
									<th class="text-center">Jenis Kelamin</th>
									<th class="text-center">Action</th>
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
