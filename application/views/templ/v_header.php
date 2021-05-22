<!DOCTYPE html>
<html>
<?php
$id_user = $this->session->userdata('id');
$user = $this->db->get_where('pengguna', ['pengguna_id' => $id_user])->row_array();
?>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $this->config->item('app_name') ?> | <?php echo $page ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/Ionicons/css/ionicons.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- summernote -->
	<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.css"> -->
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Select2 -->
	<!-- <link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"> -->
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed">
	<!-- Site wrapper -->
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item dropdown">
					<a class="nav-link" data-toggle="dropdown" href="#">
						<b style="text-transform: capitalize;"><?php echo $user['pengguna_level'] ?></b>
					</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
						<div class="dropdown-item bg-secondary">
							<center><img src="<?php echo base_url(); ?>assets/dist/img/yama.jpg" class="img-circle" alt="User Image" width="80"></center>
						</div>
						<div class="dropdown-item bg-secondary">
							<center style="text-transform: capitalize;"><?php echo $user['pengguna_nama'] ?></center>
							<center><small><?php echo $user['pengguna_email'] ?></small></center>
						</div>
						<!-- <div class="dropdown-divider"></div> -->
						<div class="row" style="margin: 10px;">
							<div class="col-lg-6 col-6">
								<!-- <a href="<?php echo base_url() . 'dashboard/profil' ?>" class="btn btn-block btn-outline-info btn-sm pull">Profile</a> -->
							</div>
							<div class="col-lg-6 col-6">
								<a href="<?php echo base_url() . 'dashboard/keluar' ?>" class="btn btn-block btn-outline-danger btn-sm">Logout</a>
							</div>
						</div>
					</div>
				</li>
				<!-- <li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
					</a>
				</li> -->
			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-info elevation-4">
			<!-- Brand Logo -->
			<a href="<?php echo base_url() . 'dashboard' ?>" class="brand-link">
				<img src="<?= base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light"><?php echo $this->config->item('app_name') ?></span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?php echo base_url(); ?>assets/dist/img/yama.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block" style="text-transform: capitalize;"><?php echo $user['pengguna_nama']; ?><small> (<?php echo $user['pengguna_level']; ?>)</small></a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
						<li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard' ?>" class="nav-link <?php if ($page == "Dashboard") {
																									echo "active";
																								} ?>">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
						</li>
						<li class="nav-header">CONTENT</li>
						<!-- //cek jika yang login adalah admin -->
						<!-- <li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard/transaksi' ?>" class="nav-link <?php if ($page == "Transaksi") {
																											echo "active";
																										} ?>">
								<i class="nav-icon fas fa-database"></i>
								<p>
									Transaksi
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard/setting' ?>" class="nav-link <?php if ($page == "Setting") {
																											echo "active";
																										} ?>">
								<i class="nav-icon fas fa-cogs"></i>
								<p>
									Setting
								</p>
							</a>
						</li> -->
						<!-- <li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard/links' ?>" class="nav-link <?php if ($page == "Link") {
																										echo "active";
																									} ?>">
								<i class="nav-icon fas fa-link"></i>
								<p>
									Link
								</p>
							</a>
						</li> -->
						<!-- <li class="nav-item has-treeview">
							<a href="#" class="nav-link">
								<i class="nav-icon fas fa-user"></i>
								<p>
									Profile
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="<?php echo base_url() . 'dashboard/profil' ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>My Profile</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="<?php echo base_url() . 'dashboard/ganti_password' ?>" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Change Password</p>
									</a>
								</li>
							</ul>
						</li> -->
						<li class="nav-item">
							<a href="<?php echo base_url() . 'label' ?>" class="nav-link <?php if ($page == "Label") {
																								echo "active";
																							} ?>">
								<i class="nav-icon fas fa-tags"></i>
								<p>
									Label
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'transaction' ?>" class="nav-link <?php if ($page == "Transaction") {
																									echo "active";
																								} ?>">
								<i class="nav-icon fas fa-cart-plus"></i>
								<p>
									Transaction
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'product' ?>" class="nav-link <?php if ($page == "Product") {
																								echo "active";
																							} ?>">
								<i class="nav-icon fas fa-shopping-bag"></i>
								<p>
									Product
								</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url() . 'dashboard/keluar' ?>" class="nav-link">
								<i class="nav-icon fas fa-sign-out-alt"></i>
								<p>
									Logout
								</p>
							</a>
						</li>
					</ul>
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>