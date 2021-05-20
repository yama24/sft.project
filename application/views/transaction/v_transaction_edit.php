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
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- <?php echo form_open_multipart('transaction/new'); ?> -->
							<form action="<?= base_url('transaction/new') ?>" method="POST">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="pengirim">Pengirim</label>
											<input type="text" class="form-control" placeholder="Isi dengan nama pengirim" name="pengirim" id="pengirim" value="<?= $label['sender']; ?>">
											<?= form_error('pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>

										<div class="form-group">
											<label for="hppengirim">No. Hp Pengirim</label>
											<input type="tel" class="form-control" placeholder="Isi dengan No. Hp pengirim" name="hppengirim" id="hppengirim" value="<?= $label['num_sender']; ?>">
											<?= form_error('hppengirim', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="penerima">Penerima</label>
											<input type="text" class="form-control" placeholder="Isi dengan nama penerima" name="penerima" id="penerima" value="<?= $label['receiver']; ?>">
											<?= form_error('penerima', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="hppenerima">No. Hp Penerima</label>
											<input type="tel" class="form-control" placeholder="Isi dengan No. Hp penerima" name="hppenerima" id="hppenerima" value="<?= $label['num_receiver']; ?>">
											<?= form_error('hppenerima', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="alamat">Alamat Penerima</label>
											<textarea class="form-control" name="alamat" id="alamat"><?= $label['address_receiver']; ?></textarea>
											<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="kurir">Kurir</label>
											<input type="text" class="form-control" placeholder="Isi dengan nama kurir" name="kurir" id="kurir" value="<?= $label['courier']; ?>">
											<?= form_error('kurir', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
									</div>
									<div class="col-lg-6">
										<label>Pilihan Produk</label> <br>
										<div class="control-group after-add-more">
											<div class="row">
												<div class="col-lg-8">
													<div class="form-group">
														<select name="produk[]" class="form-control" style="width: 100%;">
															<?php foreach ($product as $p) : ?>
																<option value="<?= $p['id']; ?>"><?= $p['nama_product']; ?></option>
															<?php endforeach ?>
														</select>
													</div>
												</div>
												<div class="col-lg-2">
													<input type="number" class="form-control" placeholder="Jumlah" name="jumlah[]" id="jumlah[]">
												</div>
												<div class="col-lg-2">
													<button type="button" class="btn btn-success add-more"><i class="nav-icon fas fa-plus"></i></button>
												</div>
											</div>
										</div>

										<div class="copy invisible">
											<div class="control-group">
												<div class="row">
													<div class="col-lg-8">
														<div class="form-group">
															<select name="produk[]" id="produk" class="form-control" style="width: 100%;" disabled>
																<?php foreach ($product as $p) : ?>
																	<option value="<?= $p['id']; ?>"><?= $p['nama_product']; ?></option>
																<?php endforeach ?>
															</select>
														</div>
													</div>
													<div class="col-lg-2">
														<input type="number" class="form-control" placeholder="Jumlah" name="jumlah[]" id="jumlah" disabled>
													</div>
													<div class="col-lg-2">
														<button type="button" class="btn btn-danger remove"><i class="nav-icon fas fa-times"></i></button>
													</div>
												</div>
											</div>
										</div>

									</div>
								</div>
								<div class="modal-footer">
									<a href="<?= base_url('product') ?>" class="btn btn-default">Close</a>
									<button type="submit" class="btn btn-success">Add</button>
								</div>
							</form>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</section>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->