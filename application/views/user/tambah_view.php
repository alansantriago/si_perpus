<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('user'); ?>">Data Pengguna</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tambah Data Pengguna</li>
    </ol>
</nav>
<div class="container">
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="users"></i></span></span>Tambah Data Pengguna</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <a href="<?= base_url('user'); ?>" class="btn btn-danger btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="icon-label"><span class="feather-icon"><i data-feather="arrow-left-circle"></i></span></span><span class="btn-text">Kembali</span></a>
                <div class="row">
                    <div class="col-sm">
                        <form action="<?php echo base_url('user/add'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" name="nama" required="required" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="lahir" required="required" placeholder="Contoh : Bengkulu">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" required="required" placeholder="Contoh : 1999-07-31">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="user" required="required" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="pass" required="required" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control" required="required">
                                            <option>Petugas</option>
                                            <option>Anggota</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <input type="radio" name="jenkel" value="Laki-Laki" required="required"> Laki-Laki
                                        <br />
                                        <input type="radio" name="jenkel" value="Perempuan" required="required"> Perempuan
                                    </div>
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input id="uintTextBox" class="form-control" name="telepon" >
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" class="form-control" name="email" >
                                    </div>
                                    <div class="form-group">
                                        <label>Pas Foto</label></br>
                                        <input type="file" accept="image/*" name="gambar" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" required="required"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="btn-text">Kirim</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>