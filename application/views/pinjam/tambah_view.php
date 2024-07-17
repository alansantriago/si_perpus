<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
	<ol class="breadcrumb breadcrumb-light bg-transparent">
		<li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
		<li class="breadcrumb-item"><a href="<?php echo base_url('transaksi'); ?>">Peminjaman</a></li>
		<li class="breadcrumb-item active" aria-current="page">Tambah Peminjaman</li>
	</ol>
</nav>
<div class="container">
	<div class="hk-pg-header">
		<h4 class="hk-pg-title"><span class="pg-title-icon"><i class="fa fa-plus"></i></span>Tambah Peminjaman</h4>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<section class="hk-sec-wrapper">
				<form action="<?php echo base_url('transaksi/prosespinjam'); ?>" method="POST" enctype="multipart/form-data">
					<a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="icon-label"><span class="feather-icon"><i data-feather="arrow-left-circle"></i></span></span><span class="btn-text">Kembali</span></a>
					<div class="row">
						<div class="col-lg-6 col-md-4 col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Data Peminjaman</h5>
									<div class="form-group">
										<label for="nopinjam">No. Peminjaman</label>
										<input class="form-control form-control-sm" name="nopinjam" type="text" value="<?= $nop; ?>" readonly>
									</div>
									<div class="form-group">
										<label for="tglpinjam">Tanggal Peminjaman</label>
										<input class="form-control form-control-sm" name="tgl" type="date" value="<?= date('Y-m-d'); ?>">
									</div>
									<div class="form-group">
										<label for="idanggota">ID Anggota</label>
										<div class="input-group">
											<input class="form-control form-control-sm" name="anggota_id" id="search-box" type="text" autocomplete="off" value="" required>
											<div class="input-group-append">
												<button data-toggle="modal" data-target="#TableAnggota" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
											</div>
										</div>
										<small class="form-text text-muted">Masukkan ID Anggota, Contoh: AG002.</small>
									</div>
									<div class="form-group">
										<label for="lamapinjam">Lama pinjam</label>
										<input type="number" class="form-control form-control-sm" name="lama" placeholder="2" required>
										<small class="form-text text-muted">Contoh: <mark>2</mark> untuk 2 hari</small>
									</div>
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<h6 class="card-title text-center">Biodata</h6>
												<div id="result_tunggu">
													<p style="color:red">* Belum Ada Hasil</p>
												</div>
												<div id="result"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-4 col-sm-12">
							<div class="card">
								<div class="card-body">
									<h5 class="card-title">Data Peminjaman</h5>
									<div class="form-group">
										<label for="kodebuku">Kode Buku</label>
										<div class="input-group">
											<input class="form-control form-control-sm" name="buku_id" id="buku-search" type="text" autocomplete="off" value="" required>
											<div class="input-group-append">
												<button data-toggle="modal" data-target="#TableBuku" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
											</div>
										</div>
										<small class="form-text text-muted">Masukkan Kode Buku, Contoh: BK008.</small>
									</div>
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<h6 class="card-title text-center">Data Buku</h6>
												<div id="result_tunggu_buku">
													<p style="color:red">* Belum Ada Hasil</p>
												</div>
												<div id="result_buku"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<input type="hidden" name="tambah" value="tambah">
							<button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right pull-right"><span class="btn-text">Kirim</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></button>
						</div>
					</div>
				</form>
			</section>
		</div>
	</div>
</div>

<div class="modal fade" id="TableBuku" role="dialog" aria-labelledby="TableBuku" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambahkan buku</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body fileSelection1">
				<table id="datable_1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ISBN</th>
							<th>Title</th>
							<th>Penerbit</th>
							<th>Tahun Buku</th>
							<th>Stok Buku</th>
							<th>Tanggal Masuk</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($buku->result_array() as $isi) { ?>
							<tr>
								<td><?= $no; ?></td>
								<td><?= $isi['isbn']; ?></td>
								<td><?= $isi['title']; ?></td>
								<td><?= $isi['penerbit']; ?></td>
								<td><?= $isi['thn_buku']; ?></td>
								<td><?= $isi['jml']; ?></td>
								<td><?= $isi['tgl_masuk']; ?></td>
								<td style="width:17%">
									<button class="btn btn-primary" id="Select_File2" data_id="<?= $isi['buku_id']; ?>">
										<i class="fa fa-check"> </i> Pilih
									</button>
									<a href="<?= base_url('data/bukudetail/' . $isi['id_buku']); ?>" target="_blank">
										<button class="btn btn-success"><i class="fa fa-sign-in"></i> Detail</button></a>
								</td>
							</tr>
						<?php $no++;
						} ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	$(".fileSelection1 #Select_File2").click(function(e) {
		document.getElementsByName('buku_id')[0].value = $(this).attr("data_id");
		$('#TableBuku').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/buku'); ?>",
			data: 'kode_buku=' + $(this).attr("data_id"),
			beforeSend: function() {
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html) {
				$("#result_buku").load("<?= base_url('transaksi/buku_list'); ?>");
				$("#result_tunggu_buku").html('');
			}
		});
	});
</script>

<script>
	// AJAX call for autocomplete 
	$(document).ready(function() {
		$("#buku-search").keyup(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/buku'); ?>",
				data: 'kode_buku=' + $(this).val(),
				beforeSend: function() {
					$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html) {
					$("#result_buku").load("<?= base_url('transaksi/buku_list'); ?>");
					$("#result_tunggu_buku").html('');
				}
			});
		});
	});
</script>
<!--modal import -->
<div class="modal fade" id="TableAnggota">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Add Anggota</h4>
			</div>
			<div id="modal_body" class="modal-body fileSelection1">
				<table id="datable_1" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>ID</th>
							<th>Nama</th>
							<th>Jenkel</th>
							<th>Telepon</th>
							<th>Level</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1;
						foreach ($user as $isi) {
							if ($isi['level'] == 'Anggota') {
						?>
								<tr>
									<td><?= $no; ?></td>
									<td><?= $isi['anggota_id']; ?></td>
									<td><?= $isi['nama']; ?></td>
									<td><?= $isi['jenkel']; ?></td>
									<td><?= $isi['telepon']; ?></td>
									<td><?= $isi['level']; ?></td>
									<td style="width:20%;">
										<button class="btn btn-primary" id="Select_File1" data_id="<?= $isi['anggota_id']; ?>">
											<i class="fa fa-check"> </i> Pilih
										</button>
									</td>
								</tr>
						<?php $no++;
							}
						} ?>
					</tbody>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
	$(".fileSelection1 #Select_File1").click(function(e) {
		document.getElementsByName('anggota_id')[0].value = $(this).attr("data_id");
		$('#TableAnggota').modal('hide');
		$.ajax({
			type: "POST",
			url: "<?php echo base_url('transaksi/result'); ?>",
			data: 'kode_anggota=' + $(this).attr("data_id"),
			beforeSend: function() {
				$("#result").html("");
				$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html) {
				$("#result").html(html);
				$("#result_tunggu").html('');
			}
		});
	});
</script>

<script>
	// AJAX call for autocomplete 
	$(document).ready(function() {
		$("#search-box").keyup(function() {
			$.ajax({
				type: "POST",
				url: "<?php echo base_url('transaksi/result'); ?>",
				data: 'kode_anggota=' + $(this).val(),
				beforeSend: function() {
					$("#result").html("");
					$("#result_tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
				},
				success: function(html) {
					$("#result").html(html);
					$("#result_tunggu").html('');
				}
			});
		});
	});
</script>