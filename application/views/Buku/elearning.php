<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create New E - Book</h1>
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
							<h4 class="modal-title">Masukkan Data E-Learning <br>Buku <strong> <?= $buku->judul ?></strong></h4>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="<?= base_url('cKelolaDataMaster/elearning/' . $buku->id_buku) ?>" method="POST" enctype="multipart/form-data" accept-charset="utf-8">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Sinopsis</label>
									<textarea class="textarea" name="sinopsis" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?= $buku->sinopsis ?></textarea>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">File e-Buku</label><br>
									<a href="<?= base_url('asset/elearning/' . $buku->file) ?>"><?= $buku->file ?></a>
									<input type="file" name="elearning" class="form-control" id="exampleInputPassword1">
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