<div class="row">
	<div class="col m12">
		<h5>Daftar Data Buku Perpustakaan</h5>
		<hr>
	</div>

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

	<div class="form-group"></div>
	<div class="navbar-form navbar-right">
		<?php echo form_open('home/search')?>
		<input type="text" name="keyword" class="form-control" placeholder="search">
		<button type="search" class="btn btn-success">Cari</button>
		<?php echo form_close() ?>
	</div>
	<table id="table-buku" class="table  table-bordered" cellspacing="0" width="100%">
		<thead class="teal white-text">
			<tr>
				<th>No</th>
				<th>ID Buku</th>
				<th>ISBN</th>
				<th>Judul Buku</th>
				<th>Penerbit</th>
				<th>Tahun Buku</th>
				<th>Stok Buku</th>
				<th>No. Rak</th>
				<th>Tanggal Masuk</th>
				<th>Keterangan</th>
			</tr>
		</thead>
		<tbody>
                                    <?php $no = 1;
                                    foreach ($data_buku->result_array() as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?>.</small></td>
                                            <td><?= $isi['buku_id']; ?></span></a></td>
                                            <td><?= $isi['isbn']; ?></span></td>
                                            <td><?= $isi['title']; ?></small></td>
                                            <td><?= $isi['penerbit']; ?></small></td>
                                            <td><?= $isi['thn_buku']; ?></small></td>
                                            <td><?= $isi['jml']; ?></span></td>
                                            <td><?= $isi['id_rak']; ?></span></td>
											<td><?= $isi['tgl_masuk']; ?></span></td>
											<td><?= $isi['isi']; ?></span></td>
                                        </tr>
                                    <?php $no++;
                                    } ?>
		</tbody>
	</table>
</div>

