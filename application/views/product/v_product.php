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
					<?php if ($this->session->flashdata('add')) : ?>
						<div class='alert alert-success font-weight-bold text-center'><?= $this->session->flashdata('add'); ?></div>
					<?php elseif ($this->session->flashdata('fail')) : ?>
						<div class='alert alert-danger font-weight-bold text-center'><?= $this->session->flashdata('fail'); ?></div>
					<?php elseif ($this->session->flashdata('update')) : ?>
						<div class='alert alert-warning font-weight-bold text-center'><?= $this->session->flashdata('update'); ?></div>
					<?php elseif ($this->session->flashdata('del')) : ?>
						<div class='alert alert-danger font-weight-bold text-center'><?= $this->session->flashdata('del'); ?></div>
					<?php endif; ?>

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
							<a href="<?= base_url('product/new') ?>" class="btn btn-outline-primary" style="float: right;">New Product</a>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="product" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 1%;">No</th>
										<th>Tanggal</th>
										<th>Nama</th>
										<th>Gambar</th>
										<th>Modal</th>
										<th>Jual</th>
										<th>Berat</th>
										<th>Due Date</th>
										<th>Opsi</th>
									</tr>
								</thead>
								<tbody>
									<!-- <?php
											$no = 1;
											foreach ($index as $i) {
											?>
										<tr>
											<td><?php echo $no++; ?></td>
											<td><?php echo date('d M Y H:i', $i['date']); ?></td>
											<td><?php echo $i['nama_product']; ?></td>
											<td><img src="<?= base_url('assets/dist/img/product/') . $i['gambar_product']; ?>" alt="" width="100px" class="img-thumbnail"></td>
											<td>Rp. <?php echo number_format($i['modal_product'], 0, ",", "."); ?></td>
											<td>Rp. <?php echo number_format($i['jual_product'], 0, ",", "."); ?></td>
											<td><?php echo number_format($i['berat_product'], 0, ",", "."); ?> gr</td>
											<td><?php echo date('d M Y H:i', $i['due_date_product']); ?> <?php if ($i['due_date_product'] > time()) {
																												echo '<span class="badge badge-success">Active</span>';
																											} else {
																												echo '<span class="badge badge-danger">Inactive</span>';
																											}; ?></td>
											<td>
												<a href="<?= base_url('product/edit/') . $i['id'] ?>" class="btn btn-outline-success">
													<i class="fas fa-edit"></i>
												</a>
												<button data-toggle="modal" data-target="#modal-hapus<?php echo $i['id']; ?>" class="btn btn-outline-danger">
													<i class="fas fa-trash"></i>
												</button>
											</td>
										</tr>
									<?php } ?> -->
								</tbody>
								<tfoot>
									<tr>
										<th>No</th>
										<th>Tanggal</th>
										<th>Nama</th>
										<th>Gambar</th>
										<th>Modal</th>
										<th>Jual</th>
										<th>Berat</th>
										<th>Due Date</th>
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
						<form role="form" method="post" action="<?php echo base_url('product/delete/' . $i['id']) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<h5>Apakah anda ingin menghapus product :</h5>
										<h3><?php echo $i['nama_product']; ?></h3>
										<img src="<?= base_url('assets/dist/img/product/' . $i['gambar_product']) ?>" width="200px" alt="" srcset="">
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