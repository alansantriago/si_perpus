<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Denda</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="dollar-sign"></i></span></span>Denda</h4>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<section class="hk-sec-wrapper">
				<div class="row">
					<div class="col-sm">
						<div class="row">
							<div class="col-lg-4 col-md-4 col-sm-12">
								<div class="card mb-20">
									<div class="card-body">
										<h5 class="card-title">
											<?php if (!empty($this->input->get('id'))) { ?>
												Edit Harga Denda
											<?php } else { ?>
												Tambah Harga Denda
											<?php } ?>
										</h5>
										<div class="card-body">
											<?php if (!empty($this->input->get('id'))) { ?>
												<form method="post" action="<?= base_url('transaksi/dendaproses'); ?>">
													<div class="form-group">
														<label for="">Harga Denda</label>
														<input type="number" name="harga" value="<?= $den->harga_denda; ?>" class="form-control" placeholder="Contoh : 10000">
													</div>
													<div class="form-group">
														<label for="">Status</label>
														<select class="form-control" name="status">
															<option <?php if ($den->stat == 'Aktif') {
																		echo 'selected';
																	} ?>>Aktif</option>
															<option <?php if ($den->stat == 'Tidak Aktif') {
																		echo 'selected';
																	} ?>>Tidak Aktif</option>
														</select>
													</div>
													<br />
													<input type="hidden" name="edit" value="<?= $den->id_biaya_denda; ?>">
													<div class="card-footer">
														<button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="icon-label"><span class="feather-icon"><i data-feather="edit-3"></i></span></span><span class="btn-text">Edit</span></button>
													</div>
												</form>
											<?php } else { ?>
												<form method="post" action="<?= base_url('transaksi/dendaproses'); ?>">
													<div class="form-group">
														<label for="">Harga Denda</label>
														<input type="number" name="harga" class="form-control" placeholder="Contoh : 10000">
													</div>
													<br />
													<input type="hidden" name="tambah" value="tambah">
													<div class="card-footer">
														<button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="icon-label"><span class="feather-icon"><i data-feather="plus"></i></span></span><span class="btn-text">Tambah</span></button>
													</div>
												</form>
											<?php } ?>
										</div>
									</div>
								</div>
							</div>
							<div class="col-lg-8 col-md-4 col-sm-12">
								<div class="card mb-20">
									<div class="card-body">
										<h5 class="card-title">Data Denda</h5>
										<div class="table-wrap">
											<table id="datable_1" class="table pb-30">
												<thead>
													<tr>
														<th>No</th>
														<th>Harga Denda</th>
														<th>Status</th>
														<th>Mulai Tanggal</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1;
													foreach ($denda->result_array() as $isi) { ?>
														<tr>
															<td><?= $no; ?></td>
															<td><?= $isi['harga_denda']; ?></td>
															<td><?= $isi['stat']; ?></td>
															<td><?= $isi['tgl_tetap']; ?></td>
															<td style="width:20%;">
																<a href="<?= base_url('transaksi/denda?id=' . $isi['id_biaya_denda']); ?>"><button class="btn btn-icon btn-icon-circle btn-success btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></button></a>
																<?php if ($isi['stat'] == 'Aktif') { ?>
																	<button class="btn btn-icon btn-icon-circle btn-warning btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-ban"></i></span></button>
																<?php } else { ?>
																	<a href="<?= base_url('transaksi/dendaproses?denda_id=' . $isi['id_biaya_denda']); ?>" onclick="return confirm('Anda yakin Biaya denda ini akan dihapus ?');">
																		<button class="btn btn-icon btn-icon-circle btn-danger btn-icon-style-2"><span class="btn-icon-wrap"><i class="icon-trash"></i></span></button></a>
																<?php } ?>
															</td>
														</tr>
													<?php $no++;
													} ?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>