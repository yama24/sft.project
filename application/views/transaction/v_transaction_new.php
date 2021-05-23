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
						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- <?php echo form_open_multipart('transaction/new'); ?> -->
							<form action="<?= base_url('transaction/new') ?>" method="POST">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label for="pengirim">Pengirim</label>
											<input type="text" class="form-control" placeholder="Isi dengan nama pengirim" name="pengirim" id="pengirim" value="<?= set_value('pengirim'); ?>">
											<?= form_error('pengirim', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>

										<div class="form-group">
											<label for="hppengirim">No. Hp Pengirim</label>
											<input type="tel" class="form-control" placeholder="Isi dengan No. Hp pengirim" name="hppengirim" id="hppengirim" value="<?= set_value('hppengirim'); ?>">
											<?= form_error('hppengirim', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="penerima">Penerima</label>
											<input type="text" class="form-control" placeholder="Isi dengan nama penerima" name="penerima" id="penerima" value="<?= set_value('penerima'); ?>">
											<?= form_error('penerima', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<div class="form-group">
											<label for="hppenerima">No. Hp Penerima</label>
											<input type="tel" class="form-control" placeholder="Isi dengan No. Hp penerima" name="hppenerima" id="hppenerima" value="<?= set_value('hppenerima'); ?>">
											<?= form_error('hppenerima', '<small class="text-danger pl-3">', '</small>'); ?>
										</div>
										<label>Alamat Penerima</label>
										<div class="row">
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="provinsi" class="form-control" id="provinsi">
														<option>🔹 Pilih Provinsi</option>
														<?php foreach ($provinces as $prov) {
															echo '<option value="' . $prov['id'] . '">' . ucwords(strtolower($prov['name'])) . '</option>';
														} ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="kabupaten" class="form-control" id="kabupaten">
														<option value=''>Kota/Kabupaten</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="kecamatan" class="form-control" id="kecamatan">
														<option value=''>Kecamatan</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="desa" class="form-control" id="desa">
														<option value=''>Desa/Kelurahan</option>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="postalcode" class="form-control" id="postalcode">
														<option value=''>KodePos</option>
													</select>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<!-- <label for="alamat">Alamat Penerima</label> -->
													<textarea class="form-control" name="alamat" id="alamat" placeholder="Detil alamat"></textarea>
													<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="kurir">Kurir</label>
													<input type="text" class="form-control" placeholder="Isi dengan nama kurir" name="kurir" id="kurir" value="<?= set_value('kurir'); ?>">
													<?= form_error('kurir', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="ongkir">Ongkir</label>
													<input type="number" class="form-control" placeholder="Isi dengan ongkir" name="ongkir" id="ongkir" value="<?= set_value('ongkir'); ?>">
													<?= form_error('ongkir', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<label>Pilihan Produk</label> <br>
										<?php foreach ($product as $p) : ?>
											<div class="form-check mx-3 my-1" style="float:left; width: 40%;">
												<input class="form-check-input" name="produk[]" type="checkbox" value="<?= $p['id'] ?>" onchange="this.parentElement.lastElementChild.toggleAttribute('hidden'); this.parentElement.lastElementChild.toggleAttribute('disabled')" id="defaultCheck<?= $p['id'] ?>">
												<label class="form-check-label" for="defaultCheck<?= $p['id'] ?>">
													<img class="img-thumbnail" src="<?= base_url('assets/dist/img/product/') . $p['gambar_product']; ?>">
													<br>
													<?= $p['nama_product'] ?></label>
												<input type="hidden" name="berat[]" value="<?= $p['berat_product'] ?>">
												<input class="form-control" type="number" name="jumlah[]" placeholder="jumlah" disabled hidden>
											</div>
										<?php endforeach ?>
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