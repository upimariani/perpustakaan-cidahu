<aside class="main-sidebar sidebar-dark-warning elevation-4">
	<!-- Brand Logo -->
	<a href="#" class="brand-link">
		<span class="brand-text font-weight-dark"> Admin Perpustakaan SMP</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user panel (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
			<div class="image">
				<img src="<?= base_url('asset/smp.png') ?>" class="img-circle elevation-2" alt="User Image">
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
					<a href="<?= base_url('cDashboard') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'cDashboard') {
																				echo 'active';
																			}  ?>">
						<i class="nav-icon fas fa-tachometer-alt"></i>
						<p>
							Dashboard
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cAnggota') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'cAnggota') {
																				echo 'active';
																			}  ?>">
						<i class="nav-icon fas fa-user"></i>
						<p>
							Anggota
						</p>
					</a>
				</li>
				<li class="nav-item has-treeview <?php if ($this->uri->segment(1) == 'cKelolaDataMaster') {
														echo 'menu-open';
													}  ?>">
					<a href="#" class="nav-link  <?php if ($this->uri->segment(1) == 'cKelolaDataMaster') {
														echo 'active';
													}  ?>">
						<i class="nav-icon fas fa-database"></i>
						<p>
							Kelola Data Master
							<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="<?= base_url('cKelolaDataMaster/admin') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'cKelolaDataMaster' && $this->uri->segment(2) == 'admin') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data User</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('cKelolaDataMaster/kategori') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'cKelolaDataMaster' && $this->uri->segment(2) == 'kategori') {
																											echo 'active';
																										}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Kategori Buku</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?= base_url('cKelolaDataMaster/buku') ?>" class="nav-link  <?php if ($this->uri->segment(1) == 'cKelolaDataMaster' && $this->uri->segment(2) == 'buku') {
																										echo 'active';
																									}  ?>">
								<i class="far fa-circle nav-icon"></i>
								<p>Data Buku</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cPeminjaman') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'cPeminjaman') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-book-open"></i>
						<p>
							Peminjaman
						</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="<?= base_url('cPengembalian') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'cPengembalian') {
																					echo 'active';
																				}  ?>">
						<i class="nav-icon fas fa-address-book"></i>
						<p>
							Pengembalian
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