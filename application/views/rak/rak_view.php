<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Data</a></li>
		<li class="breadcrumb-item active" aria-current="page">Rak Buku</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-list"></i></span>Rak Buku</h4>
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
												Edit Rak
											<?php } else { ?>
												Tambah Rak
											<?php } ?>
										</h5>
										<div class="card-body">
											<?php if (!empty($this->input->get('id'))) { ?>
												<form method="post" action="<?= base_url('data/rakproses'); ?>">
													<div class="form-group">
														<label for="">Nama Rak / Lokasi</label>
														<input type="text" name="rak" value="<?= $rak->nama_rak; ?>" id="rak" class="form-control" placeholder="Contoh : Rak Buku 1">
													</div>
													<br />
													<input type="hidden" name="edit" value="<?= $rak->id_rak; ?>">
													<div class="card-footer">
														<button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="icon-label"><span class="feather-icon"><i data-feather="edit-3"></i></span></span><span class="btn-text">Edit</span></button>
													</div>
												</form>
											<?php } else { ?>
												<form method="post" action="<?= base_url('data/rakproses'); ?>">
													<div class="form-group">
														<label for="">Nama Rak / Lokasi</label>
														<input type="text" name="rak" id="rak" class="form-control" placeholder="Contoh : Rak Buku 1">
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
										<h5 class="card-title">Data Rak</h5>
										<div class="table-wrap">
											<table id="datable_1" class="table pb-30">
												<thead>
													<tr>
														<th>No</th>
														<th>Rak Buku</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1;
													foreach ($rakbuku->result_array() as $isi) { ?>
														<tr>
															<td><?= $no; ?>.</td>
															<td><?= $isi['nama_rak']; ?></td>
															<td style="width:20%;">
																<a href="<?= base_url('data/rak?id=' . $isi['id_rak']); ?>"><button class="btn btn-icon btn-icon-circle btn-success btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></button></a>
																<a href="<?= base_url('data/rakproses?rak_id=' . $isi['id_rak']); ?>" onclick="return confirm('Hapus <?= $isi['nama_rak']; ?>?');">
																	<button class="btn btn-icon btn-icon-circle btn-danger btn-icon-style-2"><span class="btn-icon-wrap"><i class="icon-trash"></i></span></button></a>
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