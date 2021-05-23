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
							<h3><?= $label['transaction_key_label']; ?></h3>

						</div>
						<!-- /.card-header -->
						<div class="card-body">
							<!-- <?php echo form_open_multipart('transaction/new'); ?> -->
							<form action="<?= base_url('transaction/edit') ?>" method="POST">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<input type="hidden" name="key" value="<?= $label['transaction_key_label']; ?>">
											<input type="hidden" name="date" value="<?= $label['date_int']; ?>">
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
										<label>Alamat Penerima</label>
										<div class="row">
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="provinsi" class="form-control" id="provinsi" required>
														<?php foreach ($provinces as $prov) { ?>
															<option value="<?= $prov['id'] ?>" <?php if ($prov['id'] == $label['province_id']) {
																									echo "selected";
																								} ?>><?= ucwords(strtolower($prov['name'])) ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="kabupaten" class="form-control" id="kabupaten" required>
														<?php foreach ($regencies as $reg) { ?>
															<option value="<?= $reg['id'] ?>" <?php if ($reg['id'] == $label['regency_id']) {
																									echo "selected";
																								} ?>><?= ucwords(strtolower($reg['name'])) ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="kecamatan" class="form-control" id="kecamatan" required>
														<?php foreach ($districts as $dis) { ?>
															<option value="<?= $dis['id'] ?>" <?php if ($dis['id'] == $label['district_id']) {
																									echo "selected";
																								} ?>><?= ucwords(strtolower($dis['name'])) ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="desa" class="form-control" id="desa" required>
														<?php foreach ($villages as $vil) { ?>
															<option value="<?= $vil['id'] ?>" <?php if ($vil['id'] == $label['village_id']) {
																									echo "selected";
																								} ?>><?= ucwords(strtolower($vil['name'])) ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="input-group mb-3">
													<select name="postalcode" class="form-control" id="postalcode" required>
														<?php foreach ($postalcodes as $pos) { ?>
															<option value="<?= $pos['id'] ?>" <?php if ($pos['id'] == $label['postalcode_id']) {
																									echo "selected";
																								} ?>><?= ucwords(strtolower($pos['postal_code'])) ?></option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="col-lg-12">
												<div class="form-group">
													<!-- <label for="alamat">Alamat Penerima</label> -->
													<textarea class="form-control" name="alamat" id="alamat" placeholder="Detil alamat"><?= $label['address_receiver_transaction']; ?></textarea>
													<?= form_error('alamat', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="kurir">Kurir</label>
													<input type="text" class="form-control" placeholder="Isi dengan nama kurir" name="kurir" id="kurir" value="<?= $label['courier']; ?>">
													<?= form_error('kurir', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
											<div class="col-lg-6">
												<div class="form-group">
													<label for="ongkir">Ongkir</label>
													<input type="number" class="form-control" placeholder="Isi dengan ongkir" name="ongkir" id="ongkir" value="<?= $label['ongkir']; ?>">
													<?= form_error('ongkir', '<small class="text-danger pl-3">', '</small>'); ?>
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-6">
										<label>Pilihan Produk</label> <br>
										<?php $attr = "hidden disabled"; ?>
										<?php foreach ($activeProduct as $p) : ?>
											<div class="form-check mx-3 my-1" style="float:left; width: 200px;">
												<input class="form-check-input" name="produk[]" type="checkbox" value="<?= $p['id'] ?>" onchange="this.parentElement.lastElementChild.toggleAttribute('hidden'); this.parentElement.lastElementChild.toggleAttribute('disabled')" id="defaultCheck<?= $p['id'] ?>" <?php foreach ($products as $pr) {
																																																																														if ($pr['id'] == $p['id']) {
																																																																															echo "checked";
																																																																														}
																																																																													}; ?>>
												<label class="form-check-label" for="defaultCheck<?= $p['id'] ?>">
													<img class="img-thumbnail" src="<?= base_url('assets/dist/img/product/') . $p['gambar_product']; ?>">
													<br>
													<?= $p['nama_product'] ?></label>
												<input type="hidden" name="berat[]" value="<?= $p['berat_product'] ?>">
												<input class="form-control" type="number" name="jumlah[]" id="jumlah" placeholder="jumlah" <?php
																																			foreach ($transactionItems as $ti) {
																																				if ($ti['item'] == $p['id']) {
																																					echo 'value="' . $ti['amount'] . '"';
																																				}
																																			}
																																			foreach ($products as $pr) {
																																				if ($pr['id'] == $p['id']) {
																																					// echo 'value="' . $pr['id'];
																																					$attr = "";
																																				}
																																			} ?> <?= $attr; ?>>
											</div>
										<?php endforeach ?>
										<?php foreach ($inactiveCheckedProduct as $p) : ?>
											<div class="form-check mx-3 my-1" style="float:left; width: 200px;">
												<input class="form-check-input" name="produk[]" type="checkbox" value="<?= $p['id'] ?>" onchange="this.parentElement.lastElementChild.toggleAttribute('hidden'); this.parentElement.lastElementChild.toggleAttribute('disabled')" id="defaultCheck<?= $p['id'] ?>" checked>
												<label class="form-check-label" for="defaultCheck<?= $p['id'] ?>">
													<img class="img-thumbnail" src="<?= base_url('assets/dist/img/product/') . $p['gambar_product']; ?>">
													<br>
													<?= $p['nama_product'] ?></label>
												<input type="hidden" name="berat[]" value="<?= $p['berat_product'] ?>">
												<input class="form-control" type="number" name="jumlah[]" id="jumlah" placeholder="jumlah" <?php
																																			foreach ($transactionItems as $ti) {
																																				if ($ti['item'] == $p['id']) {
																																					echo 'value="' . $ti['amount'] . '"';
																																				}
																																			} ?>>
											</div>
										<?php endforeach ?>
									</div>
								</div>
								<div class="modal-footer">
									<a href="<?= base_url('product') ?>" class="btn btn-default">Close</a>
									<button type="submit" class="btn btn-success">Edit</button>
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