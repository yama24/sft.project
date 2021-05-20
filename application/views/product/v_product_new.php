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
							<?php echo form_open_multipart('product/new'); ?>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input type="text" class="form-control" placeholder="Isi dengan nama produk" name="nama" id="nama" value="<?= set_value('nama'); ?>">
										<?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

									<div class="form-group">
										<label for="modal">Modal</label>
										<input type="number" class="form-control" placeholder="Isi dengan modal produk" name="modal" id="modal" value="<?= set_value('modal'); ?>">
										<?= form_error('modal', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="jual">Jual</label>
										<input type="number" class="form-control" placeholder="Isi dengan jual produk" name="jual" id="jual" value="<?= set_value('jual'); ?>">
										<?= form_error('jual', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="berat">Berat (gr)</label>
										<input type="number" class="form-control" placeholder="Isi dengan berat produk" name="berat" id="berat" value="<?= set_value('berat'); ?>">
										<?= form_error('berat', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="form-group">
										<label for="duedate">Due Date</label>
										<input type="datetime-local" class="form-control" placeholder="Isi dengan duedate produk" name="duedate" id="duedate" value="<?= set_value('duedate'); ?>">
										<?= form_error('duedate', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>

								</div>
								<div class="col-lg-6">
									<label for="gambar">Gambar</label>
									<div class="custom-file">
										<input type="file" class="custom-file-input" name="gambar" id="gambar" onchange="previewImage();" accept="image/*">
										<label class="custom-file-label" for="customFile">Choose file</label>
										<?= form_error('gambar', '<small class="text-danger pl-3">', '</small>'); ?>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<img id="image-preview" alt="image-preview" class="img-thumbnail" style="display: none;">
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