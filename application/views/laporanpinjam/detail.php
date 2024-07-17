<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('transaksi'); ?>">Peminjaman</a></li>
		<li class="breadcrumb-item active" aria-current="page">Detail Peminjaman</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-info"></i></span>Detail Peminjaman</h4>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<section class="hk-sec-wrapper">
				<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="icon-label"><span class="feather-icon"><i data-feather="arrow-left-circle"></i></span></span><span class="btn-text">Kembali</span></a>
				<div class="row">
					<div class="col-lg-6 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Data Peminjaman</h5>
								<p class="card-text">No Peminjaman :</span> <span class="badge badge-success pull-right"><?= $pinjam->pinjam_id; ?></span></p>
								<p class="card-text">Tanggal Peminjaman : <span class="badge badge-success pull-right"><?= $pinjam->tgl_pinjam; ?><span></p>
								<p class="card-text">Tanggal Pengembalian : <span class="badge badge-success pull-right"><?= $pinjam->tgl_balik; ?></span></p>
								<p class="card-text">ID Anggota : <span class="badge badge-success pull-right"><?= $pinjam->anggota_id; ?></span></p>
								<div class="card-footer text-center">
									<h6 class="card-text">Biodata</h6>
								</div>
								<?php
								$user = $this->M_Admin->get_tableid_edit('tbl_login', 'anggota_id', $pinjam->anggota_id);
								error_reporting(0);
								if ($user->nama != null) {
									echo '<table class="table">
															<tr>
																<td>Nama Anggota</td>
																<td>:</td>
																<td>' . $user->nama . '</td>
															</tr>
															<tr>
																<td>Telepon</td>
																<td>:</td>
																<td>' . $user->telepon . '</td>
															</tr>
															<tr>
																<td>E-mail</td>
																<td>:</td>
																<td>' . $user->email . '</td>
															</tr>
															<tr>
																<td>Alamat</td>
																<td>:</td>
																<td>' . $user->alamat . '</td>
															</tr>
															<tr>
																<td>Level</td>
																<td>:</td>
																<td>' . $user->level . '</td>
															</tr>
														</table>';
								} else {
									echo 'Anggota Tidak Ditemukan !';
								}
								?>
								<p class="card-text">Lama Peminjaman : <span class="badge badge-success pull-right"><?= $pinjam->lama_pinjam; ?> Hari</span></p>
								</table>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-4 col-sm-12">
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Data Buku</h5>
								<p class="card-text">Status : <span class="badge badge-info pull-right"><?= $pinjam->status; ?></span></p>
								<p class="card-text">Tanggal Kembali : <?php if ($pinjam->tgl_kembali == '0') {
																			echo '<span class="badge badge-warning pull-right">Belum dikembalikan</span>';
																		} else {
																			echo '<span class="badge badge-success pull-right">' . $pinjam->tgl_kembali . "</span>";
																		} ?></p>
										<input class="form-control form-control-sm" name="tgl" type="date" value="<?= date('Y-m-d'); ?>">
									</div>
								<h6 class="card-text">Denda :
									<?php
									$pinjam_id = $pinjam->pinjam_id;
									$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
									$total_denda = $denda->row();
									if ($pinjam->status == 'Dikembalikan') {
										echo $this->M_Admin->rp($total_denda->denda);
									} else {
										$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
										$date1 = date('Ymd');
										$date2 = preg_replace('/[^0-9]/', '', $pinjam->tgl_balik);
										$diff = $date2 - $date1;
										if ($diff > 0) {
											echo $diff . ' hari,';
											$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
											echo '<p style="color:red;font-size:18px;">' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
														</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
										} else {
											echo '<span class="badge badge-success pull-right">Tidak ada denda</span>';
										}
									}
									
									?>
								</h6>
								<table>
									<tr>
										<?php
										$pin = $this->M_Admin->get_tableid('tbl_pinjam', 'pinjam_id', $pinjam->pinjam_id);
										$no = 1;
										foreach ($pin as $isi) {
											$buku = $this->M_Admin->get_tableid_edit('tbl_buku', 'buku_id', $isi['buku_id']);
											// echo $no . '. ' . $buku->buku_id . '<br/>';
											$no++;
										}
										?>
									</tr>
								</table>
								<div class="card-footer text-center">
									<h6 class="card-text">Data Buku</h6>
								</div>
								<table class="table">
									<thead>
										<tr>
											<th>No</th>
											<th>ID</th>
											<th>Judul</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$no = 1;
										foreach ($pin as $isi) {
											$buku = $this->M_Admin->get_tableid_edit('tbl_buku', 'buku_id', $isi['buku_id']);
										?>
											<tr>
												<td><?= $no; ?>.</td>
												<td><?= $buku->buku_id ?></td>
												<td><?= $buku->title; ?></td>
											</tr>
										<?php $no++;
										} ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>