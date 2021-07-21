		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?php echo $page ?></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active"><?php echo $page ?></li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<!-- Small boxes (Stat box) -->
					<div class="row">
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-info">
								<div class="inner">
									<h4><b><?= number_format(count($product), 0, ",", "."); ?></b></h4>

									<p>Product</p>
								</div>
								<div class="icon">
									<i class="ion ion-bag"></i>
								</div>
								<a href="<?= base_url('product') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<!-- small box -->
							<div class="small-box bg-success">
								<div class="inner">
									<h4><b><?= number_format(count($transaction), 0, ",", "."); ?></b>
										<!-- <sup style="font-size: 20px">%</sup> -->
									</h4>

									<p>Transaction</p>
								</div>
								<div class="icon">
									<i class="ion ion-stats-bars"></i>
								</div>
								<a href="<?= base_url('transaction') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<div class="small-box bg-primary">
								<div class="inner">
									<h4><b><?= "Rp. " . number_format(array_sum($sell), 0, ",", "."); ?></b></h4>

									<p>Sales Turnover</p>
								</div>
								<div class="icon">
									<i class="ion ion-pie-graph"></i>
								</div>
								<a href="<?= base_url('transaction') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
						<div class="col-lg-3 col-6">
							<div class="small-box bg-danger">
								<div class="inner">
									<h4><b><?= "Rp. " . number_format(array_sum($sell) - array_sum($buy), 0, ",", "."); ?></b></h4>

									<p>Profit</p>
								</div>
								<div class="icon">
									<i class="ion ion-cash"></i>
								</div>
								<a href="<?= base_url('transaction') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							</div>
						</div>
						<!-- ./col -->
					</div>
					<!-- /.row -->
					<div class="row">
						<div class="col-md-6">
							<div class="card card-outline card-primary">
								<div class="card-header">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Grafik Penjualan</h3>
										<!-- <a href="javascript:void(0);">View Report</a> -->
										<?php if ($this->session->userdata('chart') == 'bar') : ?>
											<form action="dashboard/chart" method="post">
												<input type="hidden" value="line" name="chart">
												<input type="hidden" value="<?= base_url(uri_string()); ?>" name="uri">
												<button type="submit" class="btn btn-xs btn-primary"><i class="fas fa-chart-bar"></i> Ganti style grafik</button>
											</form>
										<?php else : ?>
											<form action="dashboard/chart" method="post">
												<input type="hidden" value="bar" name="chart">
												<input type="hidden" value="<?= base_url(uri_string()); ?>" name="uri">
												<button type="submit" class="btn btn-xs btn-primary"><i class="fas fa-chart-line"></i> Ganti style grafik</button>
											</form>
										<?php endif ?>
									</div>
								</div>
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<?php
											$profit = array_sum($jualChart) - array_sum($modalChart);
											if ($jualChart[1] == 0) {
												$mexpense = (($modalChart[0] - $modalChart[1]) / 1) * 100;
												$mincome = (($jualChart[0] - $jualChart[1]) / 1) * 100;
												$mprofit = ((($jualChart[0] - $modalChart[0]) - ($jualChart[1] - $modalChart[1])) / 1) * 100;
											} else {
												$mexpense = (($modalChart[0] - $modalChart[1]) / $modalChart[1]) * 100;
												$mincome = (($jualChart[0] - $jualChart[1]) / $jualChart[1]) * 100;
												$mprofit = ((($jualChart[0] - $modalChart[0]) - ($jualChart[1] - $modalChart[1])) / $jualChart[1]) * 100;
											}
											?>
											<span class="text-bold text-lg">Rp. <?= number_format($profit, 0, ",", "."); ?></span>
											<span>Keuntungan Tahunan</span>
										</p>
									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
										<canvas id="myChart"></canvas>
									</div>
								</div>
							</div>
							<!-- /.card -->

						</div>
						<div class="col-md-6">
							<div class="card card-outline card-primary">
								<div class="card-header">
									<div class="d-flex justify-content-between">
										<h3 class="card-title">Performa dari bulan lalu</h3>
										<!-- <a href="javascript:void(0);">View Report</a> -->
									</div>
								</div>
								<div class="card-body">
									<div class="row">
										<div class="col-sm-6 text-center">
											<input type="text" class="knob knob-noborder" data-min="-100" data-max="100" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="<?= $mexpense; ?>" data-readonly="true" data-width="120" data-height="120" data-fgColor="#E6717C">
											<div class="knob-label">Expense</div>
										</div>
										<div class="col-sm-6 text-center">
											<input type="text" class="knob knob-noborder" data-min="-100" data-max="100" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="<?= $mincome; ?>" data-readonly="true" data-width="120" data-height="120" data-fgColor="#4CA2FF">
											<div class="knob-label">Income</div>
										</div>
										<div class="col-sm-12 text-center">
											<input type="text" class="knob knob-noborder" data-min="-100" data-max="100" data-thickness="0.2" data-angleArc="250" data-angleOffset="-125" value="<?= $mprofit; ?>" data-readonly="true" data-width="120" data-height="120" data-fgColor="#68C17C">
											<div class="knob-label">Profit</div>
										</div>
									</div>
								</div>
							</div>
							<!-- /.card -->

						</div>
					</div>
					<div class="row mb-3">
						<div class="col-4">
							<button style="height: 100%;" data-toggle="modal" data-target="#modal-tambah" class="btn btn-block bg-success">
								<i class="fas fa-plus"></i><br>Label
							</button>
						</div>
						<div class="col-4">
							<a style="height: 100%;" href="<?= base_url('transaction/new') ?>" class="btn btn-block bg-danger">
								<i class="fas fa-plus"></i><br>Transaction
							</a>
						</div>
						<div class="col-4">
							<a style="height: 100%;" href="<?= base_url('product/new') ?>" class="btn btn-block bg-info">
								<i class="fas fa-plus"></i><br>Product
							</a>
						</div>
					</div>
			</section>
		</div>
		<!-- /.content-wrapper -->
		<div class="modal fade" id="modal-tambah">
			<div class="modal-dialog modal-xl">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">New Label</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form role="form" method="post" action="<?php echo base_url('label/new') ?>">
						<div class="modal-body">
							<div class="card-body">
								<div class="form-group">
									<label>Pengirim</label>
									<input type="text" class="form-control" placeholder="Isi dengan nama/toko" name="sender" required>
								</div>
								<div class="form-group">
									<label>No. Hp Pengirim</label>
									<input type="tel" class="form-control" placeholder="cth: 082161821282" name="num_sender" pattern="[0]{1}[8]{1}[0-9].{8,}" required>
								</div>
								<div class="form-group">
									<label>Penerima</label>
									<input type="text" class="form-control" placeholder="Isi dengan nama" name="receiver" required>
								</div>
								<div class="form-group">
									<label>No. Hp Penerima</label>
									<input type="tel" class="form-control" placeholder="cth: 082161821282" name="num_receiver" pattern="[0]{1}[8]{1}[0-9].{8,}" required>
								</div>
								<div class="form-group">
									<label>Alamat Penerima</label>
									<textarea name="address_receiver" class="form-control" required></textarea>
								</div>
								<div class="form-group">
									<label>Kurir</label>
									<input type="text" class="form-control" placeholder="Isi dengan kurir" name="courier" required>
								</div>
								<div class="form-group">
									<label>Pesanan</label>
									<textarea name="order" class="form-control" required></textarea>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-between">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-success">Add</button>
						</div>
					</form>
				</div>
			</div>
		</div>