<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<?php
$idkat = $buku->id_kategori;
$idrak = $buku->id_rak;

$kat = $this->M_Admin->get_tableid_edit('tbl_kategori', 'id_kategori', $idkat);
$rak = $this->M_Admin->get_tableid_edit('tbl_rak', 'id_rak', $idrak);
?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('data'); ?>">Data Buku</a></li>
		<li class="breadcrumb-item active" aria-current="page">Detail Buku</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-info"></i></span>Detail Buku</h4>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<section class="hk-sec-wrapper">
				<a href="<?= base_url('data'); ?>" class="btn btn-danger btn-wth-icon btn-rounded text-white icon-left"><span class="icon-label"><span class="feather-icon"><i data-feather="arrow-left-circle"></i></span></span><span class="btn-text">Kembali</span></a>
				<?php if ($this->session->userdata('level') == 'Petugas') { ?>
					<a href="<?= base_url('data/bukuedit/' . $buku->id_buku); ?>" class="btn btn-warning btn-wth-icon btn-rounded text-white icon-right"><span class="icon-label"><span class="feather-icon"><i data-feather="edit-3"></i></span></span><span class="btn-text">Edit</span></a>
				<?php } else {
				} ?>
				<div class="row">
					<div class="col-lg">
						<h4 class="text-center mb-20"><?= $buku->title; ?></h4>
					</div>
				</div>
				<div class="card">
					<div class="card-body">
						<table class="table">
							<tr>
								<td style="width:20%">ISBN</td>
								<td><?= $buku->isbn; ?></td>
							</tr>
							<tr>
								<td>Sampul Buku</td>
								<td><?php if (!empty($buku->sampul !== "0")) { ?>
										<a href="<?= base_url('assets_style/image/buku/' . $buku->sampul); ?>" target="_blank">
											<img src="<?= base_url('assets_style/image/buku/' . $buku->sampul); ?>" style="width:170px;height:170px;" class="img-responsive">
										</a>
									<?php } else {
										echo '<br/><p style="color:red">* Tidak ada Sampul</p>';
									} ?>
								</td>
							</tr>
							<tr>
								<td>Judul Buku</td>
								<td><?= $buku->title; ?></td>
							</tr>
							<tr>
								<td>Kategori</td>
								<td><?= $kat->nama_kategori; ?></td>
							</tr>
							<tr>
								<td>Penerbit</td>
								<td><?= $buku->penerbit; ?></td>
							</tr>
							<tr>
								<td>Pengarang</td>
								<td><?= $buku->pengarang; ?></td>
							</tr>
							<tr>
								<td>Tahun Terbit</td>
								<td><?= $buku->thn_buku; ?></td>
							</tr>
							<tr>
								<td>Jumlah Buku</td>
								<td><?= $buku->jml; ?></td>
							</tr>
							<tr>
								<td>Jumlah Pinjam</td>
								<td>
									<?php
									$id = $buku->buku_id;
									$dd = $this->db->query("SELECT * FROM tbl_pinjam WHERE buku_id= '$id' AND status = 'Dipinjam'");
									if ($dd->num_rows() > 0) {
										echo $dd->num_rows();
									} else {
										echo '0';
									}
									?>
									<a data-toggle="modal" data-target="#modalAnggota" class="btn btn-primary btn-xs" style="margin-left:1pc;">
										<i class="fa fa-sign-in"></i> Detail Pinjam</a>
								</td>
							</tr>
							<tr>
								<td>Keterangan Lainnya</td>
								<td><?= $buku->isi; ?></td>
							</tr>
							<tr>
								<td>Rak / Lokasi</td>
								<td><?= $rak->nama_rak; ?></td>
							</tr>
							<tr>
								<td>Lampiran</td>
								<td><?php if (!empty($buku->lampiran !== "0")) { ?>
										<a href="<?= base_url('assets_style/image/buku/' . $buku->lampiran); ?>" class="btn btn-primary btn-md" target="_blank">
											<i class="fa fa-download"></i> Sample Buku
										</a>
									<?php  } else {
										echo '<br/><p style="color:red">* Tidak ada Lampiran</p>';
									} ?>
								</td>
							</tr>
							<tr>
								<td>Tanggal Masuk</td>
								<td><?= $buku->tgl_masuk; ?></td>
							</tr>
						</table>
					</div>
				</div>
			</section>
		</div>
	</div>
</div>
<div class="modal fade" id="modalAnggota" tabindex="-1" role="dialog" aria-labelledby="modalAnggota" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Anggota yang meminjam buku ini</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table id="datable_1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Jenkel</th>
							<?php if ($this->session->userdata('level') == 'Petugas') { ?>
								<th>Telepon</th>
							<?php } else {
							} ?>
							<th>Tgl Pinjam</th>
							<th>Lama Pinjam</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						$bukuid = $buku->buku_id;
						$pin = $this->db->query("SELECT * FROM tbl_pinjam WHERE buku_id ='$bukuid' AND status = 'Dipinjam'")->result_array();
						foreach ($pin as $si) {
							$isi = $this->M_Admin->get_tableid_edit('tbl_login', 'anggota_id', $si['anggota_id']);
							if ($isi->level == 'Anggota') {
						?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $isi->anggota_id; ?></td>
									<td><?= $isi->nama; ?></td>
									<td><?= $isi->jenkel; ?></td>
									<?php if ($this->session->userdata('level') == 'Petugas') { ?>
										<td><?= $isi->telepon; ?></td>
									<?php } else {
									} ?>
									<td><?= $si['tgl_pinjam']; ?></td>
									<td><?= $si['lama_pinjam']; ?> Hari</td>
								</tr>
						<?php $no++;
							}
						} ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">tutup</button>
			</div>
		</div>
	</div>
</div>