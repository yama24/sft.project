		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1><?= $page ?></h1>
						</div>
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active"><?= $page ?></li>
							</ol>
						</div>
					</div>
				</div><!-- /.container-fluid -->
			</section>
			<!-- <?php
					if (isset($_GET['alert'])) {
						if ($_GET['alert'] == "fail") {
							echo "<div class='alert alert-danger font-weight-bold text-center'>Maaf! Mohon gunakan email atau nomor handphone yang berbeda.</div>";
						} else if ($_GET['alert'] == "add") {
							echo "<div class='alert alert-success font-weight-bold text-center'>Data berhasil diinput!</div>";
						} else if ($_GET['alert'] == "update") {
							echo "<div class='alert alert-warning font-weight-bold text-center'>Data berhasil diupdate!</div>";
						} else if ($_GET['alert'] == "delete") {
							echo "<div class='alert alert-danger font-weight-bold text-center'>Data berhasil dihapus!</div>";
						}
					}
					?> -->

			<?php if ($this->session->flashdata('add')) : ?>
				<div class='alert alert-success font-weight-bold text-center'><?= $this->session->flashdata('add'); ?></div>
			<?php elseif ($this->session->flashdata('fail')) : ?>
				<div class='alert alert-danger font-weight-bold text-center'><?= $this->session->flashdata('fail'); ?></div>
			<?php elseif ($this->session->flashdata('update')) : ?>
				<div class='alert alert-warning font-weight-bold text-center'><?= $this->session->flashdata('update'); ?></div>
			<?php elseif ($this->session->flashdata('del')) : ?>
				<div class='alert alert-danger font-weight-bold text-center'><?= $this->session->flashdata('del'); ?></div>
			<?php endif; ?>

			<!-- Main content -->
			<section class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-12">
							<div class="callout callout-info">
								<h5><i class="fas fa-info"></i> Note:</h5>
								This page has been enhanced for printing. Click the print button at the bottom of the
								invoice to test.
							</div>


							<!-- Main content -->
							<div class="invoice p-3 mb-3">
								<!-- title row -->
								<div class="row">
									<div class="col-12">
										<h4>
											<i class="fas fa-globe"></i> sft.project.
											<small class="float-right"><?= date('d M Y H:i', $label['date_int']); ?></small>
										</h4>
									</div>
									<!-- /.col -->
								</div>
								<!-- info row -->
								<div class="row invoice-info">
									<div class="col-sm-4 invoice-col">
										From
										<address>
											<strong><?= $label['sender']; ?></strong><br>
											Phone: <?= "0" . $label['num_sender']; ?>
										</address>
									</div>
									<!-- /.col -->
									<div class="col-sm-4 invoice-col">
										To
										<address>
											<strong><?= $label['receiver']; ?></strong><br>
											<?= $label['address_receiver_transaction'] . " " . "<strong>" .
												ucwords(strtolower($village['name'])) . " " .
												ucwords(strtolower($district['name'])) . " " .
												ucwords(strtolower($regency['name']))  . " " .
												ucwords(strtolower($province['name']))  . " " .
												$postalcode['postal_code']; ?><br>
											</strong>
											Phone: <?= "0" . $label['num_receiver']; ?>
										</address>
									</div>
									<!-- /.col -->
									<?php
									$sumWeight = [];
									for ($i = 0; $i < count($transaction); $i++) {
										array_push($sumWeight, $transaction[$i]['weight']);
									}
									?>

									<div class="col-sm-4 invoice-col">
										<b><?= $label['transaction_key_label']; ?></b><br>
										<br>
										<b>Courier :</b> <?= $label['courier']; ?><br>
										<b>Weight :</b> <?= number_format(array_sum($sumWeight), 0, ",", "."); ?> gr<br>
										<b>Resi :</b> <?= $label['resi']; ?><br>
										<!-- <b>Account:</b> 968-34567 -->
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->

								<!-- Table row -->
								<div class="row">
									<div class="col-12 table-responsive">
										<table class="table table-striped">
											<thead>
												<tr>
													<th>Qty</th>
													<th>Product</th>
													<th>Weight</th>
													<th>Price</th>
													<th>Subtotal</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($transaction as $t) : ?>
													<tr>
														<td><?= $t['amount']; ?></td>
														<td><img src="<?= base_url('assets/dist/img/product/') . $t['gambar_product'] ?>" height="50px" class="mx-1" alt=""> <?= $t['nama_product']; ?></td>
														<td><?= number_format($t['weight'], 0, ",", "."); ?> gr</td>
														<td><?= "Rp. " . number_format($t['jual_product'], 0, ",", "."); ?></td>
														<td><?= "Rp. " . number_format($t['price_sell'], 0, ",", "."); ?></td>
													</tr>
												<?php endforeach ?>
											</tbody>
										</table>
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->

								<div class="row">
									<!-- accepted payments column -->
									<div class="col-6">
										<!-- <p class="lead">Payment Methods:</p>
										<img src="../../dist/img/credit/visa.png" alt="Visa">
										<img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
										<img src="../../dist/img/credit/american-express.png" alt="American Express">
										<img src="../../dist/img/credit/paypal2.png" alt="Paypal">

										<p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
											Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning
											heekya handango imeem
											plugg
											dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
										</p> -->
									</div>
									<!-- /.col -->
									<?php
									$sumPrice = [];
									for ($i = 0; $i < count($transaction); $i++) {
										array_push($sumPrice, $transaction[$i]['price_sell']);
									}
									?>
									<div class="col-6">
										<!-- <p class="lead">Amount Due 2/22/2014</p> -->

										<div class="table-responsive">
											<table class="table">
												<tr>
													<th style="width:50%">Subtotal:</th>
													<td><?= "Rp. " . number_format(array_sum($sumPrice), 0, ",", "."); ?></td>
												</tr>
												<!-- <tr>
													<th>Tax (9.3%)</th>
													<td>$10.34</td>
												</tr> -->
												<tr>
													<th>Shipping:</th>
													<td>Rp. 0</td>
												</tr>
												<tr>
													<th>Total:</th>
													<td><?= "Rp. " . number_format(array_sum($sumPrice), 0, ",", "."); ?></td>
												</tr>
											</table>
										</div>
									</div>
									<!-- /.col -->
								</div>
								<!-- /.row -->

								<!-- this row will not appear when printing -->
								<!-- <div class="row no-print">
									<div class="col-12">
										<a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
										<button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
											Payment
										</button>
										<button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
											<i class="fas fa-download"></i> Generate PDF
										</button>
									</div>
								</div> -->
							</div>
							<!-- /.invoice -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->