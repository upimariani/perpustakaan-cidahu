<aside class="main-sidebar sidebar-dark-warning elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<span class="brand-text font-weight-dark"> Kepala Perpustakaan SMP</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('asset/smp.jpg') ?>" class="img-circle elevation-2" alt="User Image">
			</div>
			<div class="info">
				<a href="#" class="d-block">SMP Negeri 2 Cidahu</a>
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
				<li class="nav-item">
					<a href="<?= base_url('KepalaPerpustakaan/cDashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'KepalaPerpustakaan' && $this->uri->segment(2) == 'cDashboard') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="<?= base_url('KepalaPerpustakaan/cLaporanBuku') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'KepalaPerpustakaan' && $this->uri->segment(2) == 'cLaporanBuku') {
																										echo 'active';
																									}  ?>">
						<i class="nav-icon fas fa-book"></i>
						<p>
							Laporan Buku
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaPerpustakaan/cLaporan') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'KepalaPerpustakaan' && $this->uri->segment(2) == 'cLaporan') {
																									echo 'active';
																								}  ?>">
						<i class="nav-icon fas fa-archive"></i>
						<p>
							Laporan Peminjaman
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('KepalaPerpustakaan/cLaporanPengembalian') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'KepalaPerpustakaan' && $this->uri->segment(2) == 'cLaporanPengembalian') {
																												echo 'active';
																											}  ?>">
						<i class="nav-icon fas fa-undo"></i>
						<p>
							Laporan Pengembalian
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('clogin/logout') ?>" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>
							LogOut
						</p>
					</a>
				</li>
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>
