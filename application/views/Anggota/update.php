<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Update Anggota</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Update Anggota</li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<!-- left column -->
				<div class="col-md-6">
					<!-- jquery validation -->
					<div class="card card-primary">
						<div class="card-header">
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="<?= base_url('cAnggota/edit/' . $anggota->id_anggota) ?>" method="POST">
							<div class="card-body">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputEmail1">Nama Anggota</label>
											<input type="text" value="<?= $anggota->nama_anggota ?>" name="nama" class="form-control" placeholder="Masukkan Nama Anggota">
											<?= form_error('nama', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputEmail1">NIS Anggota</label>
											<input type="text" value="<?= $anggota->nis ?>" name="nis" class="form-control" placeholder="Masukkan NIS Anggota">
											<?= form_error('nis', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Jenis Kelamin</label>
											<select name="jk" class="form-control">
												<option value="">---Pilih Jenis Kelamin---</option>
												<option value="1" <?php if ($anggota->jk == '1') {
																		echo 'selected';
																	} ?>>Perempuan</option>
												<option value="2" <?php if ($anggota->jk == '2') {
																		echo 'selected';
																	} ?>>Laki-Laki</option>
											</select>
											<?= form_error('jk', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label for="exampleInputPassword1">Kelas</label>
											<input type="text" value="<?= $anggota->kelas ?>" name="kelas" class="form-control" placeholder="Masukkan Alamat">
											<?= form_error('kelas', '<small class="text-danger">', '</small>') ?>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a class="btn btn-danger" href="<?= base_url('cAnggota') ?>">Kembali</a>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!--/.col (left) -->
				<!-- right column -->
				<div class="col-md-6">

				</div>
				<!--/.col (right) -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>