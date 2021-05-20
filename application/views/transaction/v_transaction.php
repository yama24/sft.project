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
					<div class="card card-outline card-primary">
						<div class="card-header">
							<!-- <h3 class="card-title">Data <?php echo $page ?></h3> -->
							<!-- <a href="<?php echo base_url() . 'dashboard/print_thermal' ?>" style="float: left;" target="_blank" class="btn btn-outline-danger">
							<i class="fas fa-print"></i>
								Print Thermal
							</a> -->
							<!-- <button data-toggle="modal" data-target="#modal-tambah" style="float: right;" class="btn btn-outline-success">
							New Data
							</button> -->
							<a href="<?= base_url('transaction/new') ?>" class="btn btn-outline-primary" style="float: right;">New Transaction</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 1%;">No</th>
										<th>Tanggal</th>
										<th>kode</th>
										<th>Pengirim</th>
										<th>Penerima</th>
										<th>Kurir</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($index as $i) {
									?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo date('d M Y H:i', $i['date_int']); ?></td>
											<td><?php echo $i['transaction_key_label']; ?></td>
											<td><?= $i['sender']; ?></td>
											<td><?= $i['receiver']; ?></td>
											<td><?= $i['courier']; ?></td>
											<td>
												<a href="<?= base_url('transaction/show/') . $i['transaction_key_label'] ?>" class="btn btn-outline-info">
													<i class="fas fa-eye"></i>
												</a>
												<a href="<?= base_url('transaction/edit/') . $i['transaction_key_label'] ?>" class="btn btn-outline-success">
													<i class="fas fa-edit"></i>
												</a>
												<button data-toggle="modal" data-target="#modal-hapus<?php echo $i['id']; ?>" class="btn btn-outline-danger">
													<i class="fas fa-trash"></i>
												</button>
											</td>
										</tr>
									<?php } ?>
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>kode</th>
										<th>Pengirim</th>
										<th>Penerima</th>
										<th>Kurir</th>
										<th>Opsi</th>
									</tr>
								</tfoot>
							</table>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<?php foreach ($index as $i) { ?>

			<div class="modal fade" id="modal-hapus<?php echo $i['id']; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Hapus Product</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('transaction/delete/' . $i['transaction_key_label']) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<h5>Apakah anda ingin menghapus transaksi :</h5>
										<h3><?php echo $i['transaction_key_label']; ?></h3>
									</div>
								</div>
							</div>
							<div class="modal-footer justify-content-between">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<button type="submit" class="btn btn-danger">Delete</button>
							</div>
						</form>
					</div>
					<!-- /.modal-content -->
				</div>
				<!-- /.modal-dialog -->
			</div>

		<?php } ?>