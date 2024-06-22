<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Create Peminjaman</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Home</a></li>
						<li class="breadcrumb-item active">Peminjaman</li>
					</ol>
				</div>
			</div>
			<?php
			if ($this->session->userdata('error')) {
			?>
				<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h5><i class="icon fas fa-info"></i> Alert!</h5>
					<?= $this->session->userdata('error') ?>
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
				<div class="col-md-6">
					<!-- jquery validation -->
					<div class="card card-primary">
						<div class="card-header">
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="<?= base_url('cPeminjaman/add') ?>" method="POST">
							<input type="hidden" name="nama" class="nama">
							<div class="card-body">
								<div class="form-group">
									<label for="exampleInputPassword1">Judul Buku</label>
									<select name="buku" id="buku" class="form-control select2" style="width: 100%;">
										<option value="">---Pilih Judul Buku---</option>
										<?php
										foreach ($buku as $key => $value) {
										?>
											<option data-nama="<?= $value->judul ?>" data-sisa="<?= $value->sisa_buku ?>" value="<?= $value->id_buku ?>" <?php if (set_value('buku') == $value->id_buku) {
																																								echo 'selected';
																																							} ?>><?= $value->judul ?> | <?= $value->nama_kategori ?></option>
										<?php
										}
										?>
									</select>
									<?= form_error('buku', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Jumlah Buku yang Tersedia</label>
									<input name="jml_tersedia" type="text" class="jml_buku form-control" readonly>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Jumlah Buku yang Dipinjam</label>
									<input name="jml_pinjam" value="<?= set_value('jml_pinjam') ?>" type="number" class="form-control">
								</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-warning">Tambah</button>
							</div>
						</form>
					</div>
					<!-- /.card -->
				</div>
				<!-- left column -->
				<div class="col-md-6">
					<!-- jquery validation -->
					<div class="card card-primary">
						<div class="card-header">
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form role="form" action="<?= base_url('cPeminjaman/create') ?>" method="POST">
							<?php
							$id_pinjam = 'P' . date('Ymd') . random_string('alnum', 5);
							?>
							<input type="hidden" name="id_pinjam" value="<?= $id_pinjam ?>">
							<div class="card-body">
								<div class="form-group">
									<label>Nama Anggota</label>
									<select id="anggota" name="anggota" class="form-control select2" style="width: 100%;">
										<option value="">---Pilih Nama Anggota---</option>
										<?php
										foreach ($anggota as $key => $value) {
										?>
											<option value="<?= $value->id_anggota ?>" <?php if (set_value('anggota') == $value->id_anggota) {
																							echo 'selected';
																						} ?>><?= $value->nama_anggota ?></option>
										<?php
										}
										?>
									</select>
									<?= form_error('anggota', '<small class="text-danger">', '</small>') ?>
								</div>
								<div class="form-group">
									<label for="exampleInputPassword1">Tanggal Peminjaman</label>
									<input name="tgl_pinjam" type="text" value="<?= date('Y-m-d') ?>" name="password" class="form-control" readonly>
								</div>
								<?php
								$tgl1    = date('Y-m-d'); // menentukan tanggal awal
								$tgl2    = date('Y-m-d', strtotime('+7 days', strtotime($tgl1)));
								?>
								<div class="form-group">
									<label for="exampleInputPassword1">Batas Peminjaman</label>
									<div class="input-group date" id="reservationdate" data-target-input="nearest">
										<input name="bts" value="<?= $tgl2 ?>" type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
										<div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div>
									</div>
									<?= form_error('bts', '<small class="text-danger">', '</small>') ?>
								</div>
							</div>
							<input class="status" type="hidden" name="hasil_cek">
							<!-- /.card-body -->
							<div class="card-footer">
								<button type="submit" class="btn btn-primary">Simpan Pinjam</button>
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
			<div class="row">
				<div class="col-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">Informasi Peminjaman Buku</h3><br>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example1" class="table table-bordered table-striped">
								<thead>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">Nama Buku</th>
										<th class="text-center">Jumlah Pinjam</th>
										<th class="text-center">Hapus</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($this->cart->contents() as $key => $value) {
									?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $value['name'] ?></td>
											<td><?= $value['qty'] ?></td>
											<td><a href="<?= base_url('cPeminjaman/delete_cart/' . $value['rowid']) ?>" class="btn btn-app btn-sm">
													<i class="fas fa-trash"></i> Delete
												</a></td>
										</tr>
									<?php
									}
									?>
								</tbody>
								<tfoot>
									<tr>
										<th class="text-center">No.</th>
										<th class="text-center">Nama Buku</th>
										<th class="text-center">Jumlah Pinjam</th>
										<th class="text-center">Hapus</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">
								<i class="fas fa-text-width"></i>
								Informasi Peminjaman Pelanggan
							</h3>
						</div>
						<!-- /.card-header -->
						<div id="informasi_pelanggan" class="card-body">

						</div>

						<!-- /.card -->
					</div>
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Main Footer -->
<footer class="main-footer">
	<strong>PERPUSTAKAAN SDN 1 CARACAS</strong>
	<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 3.0.5
	</div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('asset/AdminLTE/') ?>dist/js/demo.js"></script>
<!-- jquery-validation -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/jquery-validation/additional-methods.min.js"></script>
<!-- DataTables -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script>
	$(function() {
		//Initialize Select2 Elements
		$('.select2').select2()

		//Date range picker
		$('#reservationdate').datetimepicker({
			format: 'YYYY-MM-DD'
		});
	})
</script>
<!-- Checkout Section End -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#anggota').change(function() {
			var id = $(this).val();
			$.ajax({
				url: "<?php echo site_url('cPeminjaman/cek_peminjaman'); ?>",
				method: "POST",
				data: {
					id: id
				},
				async: true,
				dataType: 'json',
				success: function(data) {

					if (data.jml_peminjaman) {
						var x = data.jml_peminjaman;
					} else {
						var x = 'Tidak Ada Riwayat Peminjaman Sebelumnya';
					}
					var html = '';
					html = '<blockquote><p>Informasi Peminjaman</p>\
                  <small class="text-danger">' + x + '</small> </blockquote>';

					$('#informasi_pelanggan').html(html);
					$('.status').val(x);
				}
			});
			return false;
		});
	});
</script>
<script>
	console.log = function() {}
	$("#buku").on('change', function() {

		$(".jml_buku").html($(this).find(':selected').attr('data-sisa'));
		$(".jml_buku").val($(this).find(':selected').attr('data-sisa'));

		$(".nama").html($(this).find(':selected').attr('data-nama'));
		$(".nama").val($(this).find(':selected').attr('data-nama'));

	});
</script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#admin').validate({
			rules: {
				nama: {
					required: true
				},
				no_hp: {
					required: true,
					number: true,
					minlength: 11,
					maxlength: 13
				},
				alamat: {
					required: true
				},
				username: {
					required: true
				},
				password: {
					required: true
				}

			},
			messages: {
				nama: {
					required: "Masukkan Nama Admin"
				},
				no_hp: {
					required: "Masukkan No Telepon",
					minlength: "No Telepon Minimal 11 angka",
					maxlength: "No Telepon Maksimal 13 angka"

				},
				alamat: {
					required: "Masukkan Alamat Admin"
				},
				username: {
					required: "Masukkan Username"
				},
				password: {
					required: "Masukkan Password"
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#kategori').validate({
			rules: {
				kategori: {
					required: true
				},
				rak: {
					required: true
				}

			},
			messages: {
				kategori: {
					required: "Masukkan Kategori Buku"
				},
				rak: {
					required: "Masukkan Nomor Rak Buku"
				}
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>
<script>
	$(document).ready(function() {
		$('#buku').validate({
			rules: {
				kategori: {
					required: true
				},
				judul: {
					required: true
				},
				pengarang: {
					required: true
				},
				tahun: {
					required: true
				},
				penerbit: {
					required: true
				},
				isbn: {
					required: true
				},
				sampul: {
					required: true
				},
				jml: {
					required: true
				},

			},
			messages: {
				kategori: {
					required: "Masukkan Kategori Buku"
				},
				judul: {
					required: "Masukkan Judul Buku"
				},
				pengarang: {
					required: "Masukkan Pengarang Buku"
				},
				tahun: {
					required: "Masukkan Tahun Buku"
				},
				penerbit: {
					required: "Masukkan Penerbit Buku"
				},
				isbn: {
					required: "Masukkan No ISBN Buku"
				},
				sampul: {
					required: "Masukkan Sampul Buku"
				},
				jml: {
					required: "Masukkan Jumlah Buku"
				},
			},
			errorElement: 'span',
			errorPlacement: function(error, element) {
				error.addClass('invalid-feedback');
				element.closest('.form-group').append(error);
			},
			highlight: function(element, errorClass, validClass) {
				$(element).addClass('is-invalid');
			},
			unhighlight: function(element, errorClass, validClass) {
				$(element).removeClass('is-invalid');
			}
		});
	});
</script>
<script>
	$(function() {
		$("#example1").DataTable({
			"responsive": true,
			"autoWidth": false,
		});
		$('#example2').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": false,
			"ordering": true,
			"info": true,
			"autoWidth": false,
			"responsive": true,
		});
	});
</script>
</body>

</html>