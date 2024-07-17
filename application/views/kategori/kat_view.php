<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Data</a></li>
		<li class="breadcrumb-item active" aria-current="page">Kategori</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-tags"></i></span>Kategori</h4>
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
												Edit Kategori
											<?php } else { ?>
												Tambah Kategori
											<?php } ?>
										</h5>
										<div class="card-body">
											<?php if (!empty($this->input->get('id'))) { ?>
												<form method="post" action="<?= base_url('data/katproses'); ?>">
													<div class="form-group">
														<label for="">Nama Kategori</label>
														<input type="text" name="kategori" value="<?= $kat->nama_kategori; ?>" id="kategori" class="form-control" placeholder="Contoh : Dongeng">
													</div>
													<br />
													<input type="hidden" name="edit" value="<?= $kat->id_kategori; ?>">
													<div class="card-footer">
														<button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="icon-label"><span class="feather-icon"><i data-feather="edit-3"></i></span></span><span class="btn-text">Edit</span></button>
													</div>
												</form>
											<?php } else { ?>
												<form method="post" action="<?= base_url('data/katproses'); ?>">
													<div class="form-group">
														<label for="">Nama Kategori</label>
														<input type="text" name="kategori" id="kategori" class="form-control" placeholder="Contoh : Keagamaan">
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
										<h5 class="card-title">Data Kategori</h5>
										<div class="table-wrap">
											<table id="datable_1" class="table pb-30">
												<thead>
													<tr>
														<th>No</th>
														<th>Kategori</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1;
													foreach ($kategori->result_array() as $isi) { ?>
														<tr>
															<td><?= $no; ?>.</td>
															<td><?= $isi['nama_kategori']; ?></td>
															<td style="width:20%;">
																<a href="<?= base_url('data/kategori?id=' . $isi['id_kategori']); ?>"><button class="btn btn-icon btn-icon-circle btn-success btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></button></a>
																<a href="<?= base_url('data/katproses?kat_id=' . $isi['id_kategori']); ?>" onclick="return confirm('Anda yakin Kategori ini akan dihapus ?');">
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