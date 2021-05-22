<!DOCTYPE html>
<html>
<?php
$id_user = $this->session->userdata('id');
$user = $this->db->get_where('pengguna', ['pengguna_id' => $id_user])->row_array();
?>

<head>
	<meta charset="utf-8">
	<title><?php echo $this->config->item('app_name') ?> | <?php echo $page ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png">

	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/Ionicons/css/ionicons.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed sidebar-mini-xs <?php if (!(date('His') >= 060000 && date('His') <= 180000)) {
																								echo "dark-mode";
																							} ?>">
	<!-- Site wrapper -->
	<div class="wrapper">
		<?php if ($this->session->flashdata('welcome')) : ?>
			<!-- Preloader -->
			<div class="preloader flex-column justify-content-center align-items-center bg-dark">
				<img class="animation__shake" src="<?php echo base_url() ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
			</div>
		<?php endif; ?>

		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand <?php if (!(date('His') >= 060000 && date('His') <= 180000)) {
															echo "navbar-dark navbar-dark";
														} else {
															echo "navbar-white navbar-light";
														} ?>">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
			</ul>

			<!-- Right navbar links -->
			<ul class="navbar-nav ml-auto">
				<!-- Notifications Dropdown Menu -->
				<li class="nav-item">
					<a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
						<i class="fas fa-th-large"></i>
					</a>
				</li>

			</ul>
		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-info elevation-4 sidebar-no-expand">
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
							<a href="<?php echo base_url() . 'login/keluar' ?>" class="nav-link">
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