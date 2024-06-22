<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create New Kategori Buku</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Create</li>
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
							<h3 class="card-title">Masukkan Data <small>Kategori</small></h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="<?= base_url('cKelolaDataMaster/pcreate_kategori') ?>" method="POST" id="kategori">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputEmail1">Nama Kategori</label>
									<input type="text" name="kategori" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Kategori">
								</div>
								<div class="form-group">
									<label for="exampleInputEmail1">Nomor Rak Buku</label>
									<input type="text" name="rak" class="form-control" id="exampleInputEmail1" placeholder="Masukkan Nomor Rak">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Submit</button>
								<a class="btn btn-danger" href="<?= base_url('cKelolaDataMaster/kategori') ?>">Kembali</a>

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
