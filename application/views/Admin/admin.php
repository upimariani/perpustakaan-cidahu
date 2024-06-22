<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Data User</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">User</li>
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
							<h3 class="card-title">Informasi User</h3><br>
							<a href="<?= base_url('ckeloladatamaster/create_admin') ?>" class="btn btn-warning btn-sm mt-3">Create New User</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Action</th>
										<th class="text-center">Nama Admin</th>
										<th class="text-center">Alamat</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Akun</th>

									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($admin as $key => $value) {
									?>
										<tr>
											<td class="text-center"><?= $no++ ?>.</td>
											<td class="text-center">
												<a href="<?= base_url('cKelolaDataMaster/edit_admin/' . $value->id_user) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-edit"></i> Edit
												</a>
												<a href="<?= base_url('cKelolaDataMaster/delete_admin/' . $value->id_user) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-trash"></i> Delete
												</a>
											</td>
											<td><?= $value->nama_user ?></td>
											<td><?= $value->alamat ?></td>
											<td><?= $value->no_hp ?></td>
											<td>Username : <span class="badge badge-warning"><?= $value->username ?></span><br>
												Password : <span class="badge bg-olive"><?= $value->password ?></span><br>
												Level User : <span><?php
																	if ($value->role == '1') {
																		echo 'Admin';
																	} else {
																		echo 'Kepala Perpustakaan';
																	}
																	?></span></td>


										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No</th>
										<th class="text-center">Action</th>
										<th class="text-center">Nama Admin</th>
										<th class="text-center">Alamat</th>
										<th class="text-center">No Telepon</th>
										<th class="text-center">Akun</th>
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
