<!-- Main Footer -->
<footer class="main-footer">
	<strong>PERPUSTAKAAN SD NEGERI 2 CIDAHU</strong>
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
<!-- Summernote -->
<script src="<?= base_url('asset/AdminLTE/') ?>plugins/summernote/summernote-bs4.min.js"></script>
<script>
	$(function() {
		// Summernote
		$('.textarea').summernote()
	})
</script>
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

					var html = '';
					html = '<p>' + data.jml_peminjaman + '</p>';

					$('#informasi_pelanggan').html(html);
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
		$(".table").DataTable({
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