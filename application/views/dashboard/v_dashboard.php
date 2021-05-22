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
									<h3><?= count($product); ?></h3>

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
									<h3><?= count($transaction); ?>
										<!-- <sup style="font-size: 20px">%</sup> -->
									</h3>

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
							<div class="small-box bg-warning">
								<div class="inner">
									<h3><?= number_format(array_sum($sell), 0, ",", ".") ?></h3>

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
									<h3><?= number_format(array_sum($sell) - array_sum($buy), 0, ",", ".") ?></h3>

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
						<div class="col-lg-12">
							<div class="card">
								<!-- <div class="card-header border-0">
                            <div class="d-flex justify-content-between">
                                <h3 class="card-title">Sales</h3>
                                <a href="javascript:void(0);">View Report</a>
                            </div>
                        </div> -->
								<div class="card-body">
									<div class="d-flex">
										<p class="d-flex flex-column">
											<?php
											$profit = array_sum($jualChart) - array_sum($modalChart);
											if ($jualChart[1] == 0) {
												$percent = (($jualChart[0] - $jualChart[1]) / 1) * 100;
											} else {
												$percent = (($jualChart[0] - $jualChart[1]) / $jualChart[1]) * 100;
											}
											?>
											<span class="text-bold text-lg">Rp. <?= number_format($profit, 0, ",", "."); ?></span>
											<span>Keuntungan Tahunan</span>
										</p>
										<p class="ml-auto d-flex flex-column text-right">
											<?php
											if ($percent > 0) { ?>
												<span class="text-primary">
													<i class="fas fa-arrow-up"></i> <?= number_format($percent, 0, ",", "."); ?>%
												</span>
											<?php } else { ?>
												<span class="text-danger">
													<i class="fas fa-arrow-down"></i> <?= number_format($percent, 0, ",", "."); ?>%
												</span>
											<?php  } ?>
											<span class="text-muted">dari bulan lalu</span>
										</p>
									</div>
									<!-- /.d-flex -->

									<div class="position-relative mb-4">
										<canvas id="myChart"></canvas>
									</div>

									<!-- <div class="d-flex flex-row justify-content-end">
                                <span class="mr-2">
                                    <i class="fas fa-square text-danger"></i> Output
                                </span>

                                <span>
                                    <i class="fas fa-square text-info"></i> Input
                                </span>
                            </div> -->
								</div>
							</div>
							<!-- /.card -->

						</div>

					</div>
			</section>
		</div>
		<!-- /.content-wrapper -->