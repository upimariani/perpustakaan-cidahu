<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create New Buku</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Buku</li>
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
							<h3 class="card-title">Quick Example <small>jQuery Validation</small></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="<?= base_url('cKelolaDataMaster/pcreate_buku') ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8" id="buku">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputPassword1">No. ISBN</label>
									<input type="text" name="isbn" class="form-control" id="exampleInputPassword1" placeholder="Masukkan No ISBN">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Sampul Buku</label>
									<input type="file" name="sampul" class="form-control" id="exampleInputPassword1">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Kategori</label>
									<select class="form-control" name="kategori">
										<option value="">---Pilih Kategori Buku---</option>
										<?php
										foreach ($kategori as $key => $value) {
										?>
											<option value="<?= $value->id_kategori ?>"><?= $value->nama_kategori ?></option>
										<?php
										}
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Kelas</label>
									<input type="number" name="kelas" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Siswa Kelas">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Judul</label>
									<input type="text" name="judul" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Judul Buku">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Pengarang</label>
									<input type="text" name="pengarang" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Pengarang Buku">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Tahun</label>
									<input type="text" name="tahun" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Tahun Buku">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Penerbit</label>
									<input type="text" name="penerbit" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Penerbit Buku">
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Jumlah Buku</label>
									<input type="number" name="jml" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Jumlah Buku">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a class="btn btn-danger" href="<?= base_url('cKelolaDataMaster/buku') ?>">Kembali</a>

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
<!-- /.content-wrapper -->