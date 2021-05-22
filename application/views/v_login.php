<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Label Maker | Log in</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" href="<?php echo base_url() ?>assets/dist/img/favicon.png">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/dist/css/adminlte.min.css">
	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
	<div class="login-box">
		<?php if ($this->session->flashdata('belum_login')) : ?>
			<div class='alert alert-info font-weight-bold text-center'><?= $this->session->flashdata('belum_login'); ?></div>
		<?php elseif ($this->session->flashdata('gagal_login')) : ?>
			<div class='alert alert-danger font-weight-bold text-center'><?= $this->session->flashdata('gagal_login'); ?></div>
		<?php elseif ($this->session->flashdata('logout')) : ?>
			<div class='alert alert-success font-weight-bold text-center'><?= $this->session->flashdata('logout'); ?></div>
		<?php endif; ?>

		<div class="card card-outline card-primary">
			<div class="card-header text-center">
				<a href="#" class="h1"><b>Label</b>Maker</a>
			</div>
			<div class="card-body">
				<p class="login-box-msg">Sign in to start your session</p>

				<form action="<?php echo base_url('login/aksi'); ?>" method="post">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Username" name="username">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-user"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" class="form-control" placeholder="Password" name="password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-8">
							<!-- <div class="icheck-primary">
								<input type="checkbox" id="remember">
								<label for="remember">
									Remember Me
								</label>
							</div> -->
						</div>
						<!-- /.col -->
						<div class="col-4">
							<button type="submit" class="btn btn-primary btn-block">Sign In</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
			</div>
			<!-- /.card-body -->
		</div>
	</div>
	<!-- /.login-box -->

	<!-- jQuery -->
	<script src="<?php echo base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
	<!-- Bootstrap 4 -->
	<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?php echo base_url() ?>assets/dist/js/adminlte.min.js"></script>

</body>

</html>