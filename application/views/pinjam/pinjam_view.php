<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Peminjaman</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon">
				<?php if ($this->session->userdata('level') == 'Petugas') { ?>
					<i class="fa fa-upload"></i></span>Data Peminjaman</h4>
	<?php } else { ?>
		<i class="fa fa-download"></i></span>Data Peminjaman</h4>
	<?php } ?>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<section class="hk-sec-wrapper">
				<?php if ($this->session->userdata('level') == 'Petugas') { ?>
					<a href="transaksi/pinjam" class="btn btn-success btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="btn-text">Tambah Peminjaman</span> <span class="icon-label"><span class="feather-icon"><i data-feather="plus"></i></span></span></a>
				<?php } ?>
				<div class="row">
					<div class="col-lg">
						<div class="table-wrap">
							<table id="datable_1" class="table pb-30 ">
								<thead>
									<tr>
										<th>No</th>
										<th>No Pinjam</th>
										<th>ID Anggota</th>
										<th>Nama</th>
										<th>Pinjam</th>
										<th>Harus Kembali</th>
										<th>Status</th>
										<th>Denda</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
									foreach ($pinjam->result_array() as $isi) {
										$anggota_id = $isi['anggota_id'];
										$ang = $this->db->query("SELECT * FROM tbl_login WHERE anggota_id = '$anggota_id'")->row();
										$pinjam_id = $isi['pinjam_id'];
										$denda = $this->db->query("SELECT * FROM tbl_denda WHERE pinjam_id = '$pinjam_id'");
										$total_denda = $denda->row();
									?>
										<tr>
											<td><?= $no; ?>.</td>
											<td><a class="" href="<?= base_url('transaksi/detailpinjam/' . $isi['pinjam_id']); ?>"><?= $isi['pinjam_id']; ?></a></td>
											<td><span class="badge badge-light"><?= $isi['anggota_id']; ?></span></td>
											<td><small><strong><?= $ang->nama; ?></strong></small></td>
											<td><small><?= $isi['tgl_pinjam']; ?></small></td>
											<td><small><?= $isi['tgl_balik']; ?></small></td>
											<td><span class="badge badge-success"><?= $isi['status']; ?></span></td>
											<td>
												<?php
												if ($isi['status'] == 'Dikembalikan') {
													echo $this->M_Admin->rp($total_denda->denda);
												} else {
													$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
													$date1 = date('Ymd');
													$date2 = preg_replace('/[^0-9]/', '', $isi['tgl_balik']);
													$diff = $date2 - $date1;
													if ($diff > 0) {
														echo $diff . ' hari';
														$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
														echo '<p style="color:red;font-size:18px;">
												' . $this->M_Admin->rp($jml * ($dd->harga_denda * $diff)) . ' 
												</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
													} else {
														echo '<span class="badge badge-info">Tidak ada denda</span></p>';
													}
												}
												?>
											</td>
											<td>
												<?php if ($this->session->userdata('level') == 'Petugas') { ?>
													<?php if ($isi['tgl_kembali'] == '0') { ?>
														<a href="<?= base_url('transaksi/kembalipinjam/' . $isi['pinjam_id']); ?>" title="Kembalikan buku">
															<button class="btn btn-icon btn-icon-circle btn-warning btn-icon-style-2 btn-sm"><span class="btn-icon-wrap"><i class="fa fa-sign-out"></i></span></button>
														</a>
													<?php } else { ?>
														<a href="javascript:void(0)" title="Buku sudah dikembalikan">
															<button class="btn btn-icon btn-icon-circle btn-success btn-icon-style-2 btn-sm"><span class="btn-icon-wrap"><i class="fa fa-check"></i></span></button>
														</a>
													<?php } ?>
													<a href="<?= base_url('transaksi/prosespinjam?pinjam_id=' . $isi['pinjam_id']); ?>" onclick="return confirm('Hapus data pinjam ini?');" title="Hapus">
														<button class="btn btn-icon btn-icon-circle btn-danger btn-icon-style-2 btn-sm"><span class="btn-icon-wrap"><i class="icon-trash"></i></span></button></a>
												<?php } else { ?>
													<a href="<?= base_url('transaksi/detailpinjam/' . $isi['pinjam_id'] . '?pinjam=yes'); ?>" title="Detail peminjaman">
														<button class="btn btn-icon btn-icon-circle btn-primary btn-icon-style-2 btn-sm"><span class="btn-icon-wrap"><i class="fa fa-eye"></i></span></button></a>
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
			</section>
		</div>
	</div>
</div>