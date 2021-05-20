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
							<button data-toggle="modal" data-target="#modal-tambah" style="float: right;" class="btn btn-outline-primary">
								New Label
							</button>
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<table id="example2" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th style="width: 1%;">No</th>
										<th>Tanggal</th>
										<th>Pengirim</th>
										<th>No. Hp Pengirim</th>
										<th>Penerima</th>
										<th>No. Hp Penerima</th>
										<th>Alamat Penerima</th>
										<th>Kurir</th>
										<th>Pesanan</th>
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
											<td><?php echo date('d M y H:i:s', strtotime($i['date'])); ?></td>
											<td><?php echo ucwords(strtolower($i['sender'])); ?></td>
											<td><?php echo "0" . $i['num_sender']; ?></td>
											<td><?php echo ucwords(strtolower($i['receiver'])); ?></td>
											<td><?php echo "0" . $i['num_receiver']; ?></td>
											<td><?php echo $i['address_receiver']; ?></td>
											<td><?php echo $i['courier']; ?></td>
											<td><?php echo $i['order']; ?></td>
											<td>
												<a href="<?php echo base_url() . 'label/print_thermal/' . $i['id'] ?>" target="_blank" class="btn btn-outline-warning">
													<i class="fas fa-print"></i>
												</a>
												<button data-toggle="modal" data-target="#modal-edit<?php echo $i['id']; ?>" class="btn btn-outline-success">
													<i class="fas fa-edit"></i>
												</button>
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
										<th>Pengirim</th>
										<th>No. Hp Pengirim</th>
										<th>Penerima</th>
										<th>No. Hp Penerima</th>
										<th>Alamat Penerima</th>
										<th>Kurir</th>
										<th>Pesanan</th>
										<th>opsi</th>
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
		<?php foreach ($index as $i) { ?>
			<div class="modal fade" id="modal-edit<?php echo $i['id']; ?>">
				<div class="modal-dialog modal-xl">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Edit Label</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('label/edit') ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<label>Pengirim</label>
										<input type="hidden" name="id" value="<?php echo $i['id']; ?>" id="">
										<input type="text" class="form-control" value="<?php echo $i['sender']; ?>" placeholder="Isi dengan nama/toko" name="sender" required>
									</div>
									<div class="form-group">
										<label>No. Hp Pengirim</label>
										<input type="tel" class="form-control" value="0<?php echo $i['num_sender']; ?>" placeholder="cth: 082161821282" name="num_sender" pattern="[0]{1}[8]{1}[0-9].{8,}" required>
									</div>
									<div class="form-group">
										<label>Penerima</label>
										<input type="text" class="form-control" value="<?php echo $i['receiver']; ?>" placeholder="Isi dengan nama" name="receiver" required>
									</div>
									<div class="form-group">
										<label>No. Hp Penerima</label>
										<input type="tel" class="form-control" value="0<?php echo $i['num_receiver']; ?>" placeholder="cth: 082161821282" name="num_receiver" pattern="[0]{1}[8]{1}[0-9].{8,}" required>
									</div>
									<div class="form-group">
										<label>Alamat Penerima</label>
										<textarea name="address_receiver" class="form-control" required><?php echo $i['address_receiver']; ?></textarea>
									</div>
									<div class="form-group">
										<label>Kurir</label>
										<input type="text" class="form-control" value="<?php echo $i['courier']; ?>" placeholder="Isi dengan kurir" name="courier" required>
									</div>
									<div class="form-group">
										<label>Pesanan</label>
										<textarea name="order" class="form-control" required><?php echo $i['order']; ?></textarea>
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

			<div class="modal fade" id="modal-hapus<?php echo $i['id']; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Delete Label</h4>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<form role="form" method="post" action="<?php echo base_url('label/delete/' . $i['id']) ?>">
							<div class="modal-body">
								<div class="card-body">
									<div class="form-group">
										<h5>Apakah anda ingin menghapus Label :</h5>
										<p>pengirim</p>
										<h3><?php echo $i['sender']; ?></h3>
										<p>penerima</p>
										<h3><?php echo $i['receiver']; ?></h3>
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