<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<?php
$bulan_tes = array(
	'01' => "Januari",
	'02' => "Februari",
	'03' => "Maret",
	'04' => "April",
	'05' => "Mei",
	'06' => "Juni",
	'07' => "Juli",
	'08' => "Agustus",
	'09' => "September",
	'10' => "Oktober",
	'11' => "November",
	'12' => "Desember"
);
?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item active" aria-current="page">Pengembalian Buku</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon">
				<?php if ($this->session->userdata('level') == 'Petugas') { ?>
					<i class="fa fa-download"></i></span>Pengembalian Buku</h4>
	<?php } else { ?>
		<i class="fa fa-upload"></i></span>Pengembalian Buku</h4>
	<?php } ?>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<section class="hk-sec-wrapper w-auto">
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
										<th>Harus kembali</th>
										<th>Status</th>
										<th>Kembali</th>
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
												if ($isi['tgl_kembali'] == '0') {
													echo '<span class="badge badge-danger">belum dikembalikan</span>';
												} else {
													echo '<small>' . $isi['tgl_kembali'] . '</small>';
												}
												?>
											</td>
											<td><small>
													<?php
													$jml = $this->db->query("SELECT * FROM tbl_pinjam WHERE pinjam_id = '$pinjam_id'")->num_rows();
													if ($denda->num_rows() > 0) {
														$s = $denda->row();
														echo $this->M_Admin->rp($s->denda);
													} else {
														$date1 = date('Ymd');
														$date2 = preg_replace('/[^0-9]/', '', $isi['tgl_balik']);
														$diff = $date2 - $date1;
														if ($diff >= 0) {
															echo '<p style="color:green;">Tidak Ada Denda</p>';
														} else {
															$dd = $this->M_Admin->get_tableid_edit('tbl_biaya_denda', 'stat', 'Aktif');
															echo '<p style="color:red;font-size:18px;">' . $this->M_Admin->rp($jml * ($dd->harga_denda * abs($diff))) . ' 
												</p><small style="color:#333;">* Untuk ' . $jml . ' Buku</small>';
														}
													}
													?></small>
											</td>
											<td>
												<?php if ($this->session->userdata('level') == 'Petugas') { ?>
													<a href="<?= base_url('transaksi/prosespinjam?pinjam_id=' . $isi['pinjam_id']); ?>" onclick="return confirm('Hapus pengembalian ini?');" title="hapus pinjam">
														<button class="btn btn-icon btn-icon-circle btn-danger btn-icon-style-2"><span class="btn-icon-wrap"><i class="icon-trash"></i></span></button></a>
												<?php } else {
													echo '<button class="btn btn-icon btn-icon-circle btn-danger btn-icon-style-2 disabled"><span class="btn-icon-wrap"><i class="icon-trash"></i></span></button>';
												} ?>
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
