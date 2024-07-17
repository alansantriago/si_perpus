<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('data'); ?>">Data Buku</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Buku</li>
    </ol>
</nav>
<div class="container">
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="plus"></i></span></span>Tambah Data Buku</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <a href="<?= base_url('data'); ?>" class="btn btn-danger btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="icon-label"><span class="feather-icon"><i data-feather="arrow-left-circle"></i></span></span><span class="btn-text">Kembali</span></a>
                <div class="row">
                    <div class="col-sm">
                        <form action="<?php echo base_url('data/prosesbuku'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Kategori</label>
                                        <select class="form-control select2" required="required" name="kategori">
                                            <option disabled selected value> -- Pilih Kategori -- </option>
                                            <?php foreach ($kats as $isi) { ?>
                                                <option value="<?= $isi['id_kategori']; ?>"><?= $isi['nama_kategori']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Rak / Lokasi</label>
                                        <select name="rak" class="form-control select2" required="required">
                                            <option disabled selected value> -- Pilih Rak / Lokasi -- </option>
                                            <?php foreach ($rakbuku as $isi) { ?>
                                                <option value="<?= $isi['id_rak']; ?>"><?= $isi['nama_rak']; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>ISBN</label>
                                        <input type="text" class="form-control" name="isbn" placeholder="Contoh ISBN : 978-602-8123-35-8">
                                    </div>
                                    <div class="form-group">
                                        <label>Judul Buku</label>
                                        <input type="text" class="form-control" name="title" placeholder="Contoh : Pendidikan Agama Islam">
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Pengarang</label>
                                        <input type="text" class="form-control" name="pengarang" placeholder="Nama Pengarang">
                                    </div>
                                    <div class="form-group">
                                        <label>Penerbit</label>
                                        <input type="text" class="form-control" name="penerbit" placeholder="Nama Penerbit">
                                    </div>
                                    <div class="form-group">
                                        <label>Tahun Buku</label>
                                        <input type="number" class="form-control" name="thn" placeholder="Tahun Buku : 2019">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Tanggal Masuk</label>
                                        <input type="date" class="form-control" name="tgl_masuk" placeholder="Tanggal Masuk">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Buku</label>
                                        <input type="number" class="form-control" name="jml" placeholder="Jumlah buku : 12">
                                    </div>
                                    <div class="form-group">
                                        <label>Sampul <small style="color:green">(gambar) * opsional</small></label>
                                        <input type="file" accept="image/*" name="gambar">
                                    </div>
                                    <div class="form-group">
                                        <label>Lampiran Buku <small style="color:green">(pdf) * opsional</small></label>
                                        <input type="file" accept="application/pdf" name="lampiran">
                                    </div>
                                    <div class="form-group">
                                        <label>Keterangan Lainnya</label>
                                        <div class="tinymce-wrap">
                                            <textarea class="form-control tinymce" name="ket" style="height:120px"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <input type="hidden" name="tambah" value="tambah">
                                <button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="btn-text">Tambah</span> <span class="icon-label"><span class="feather-icon"><i data-feather="plus"></i></span></span></button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>