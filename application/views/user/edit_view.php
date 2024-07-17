<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="<?php echo base_url('user'); ?>">Data Pengguna</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data Pengguna</li>
    </ol>
</nav>
<div class="container">
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="edit-2"></i></span></span>Edit Data <?= $user->nama; ?></h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                    <a href="<?= base_url('user'); ?>" class="btn btn-danger btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="icon-label"><span class="feather-icon"><i data-feather="arrow-left-circle"></i></span></span><span class="btn-text">Kembali</span></a>
                <?php } elseif ($this->session->userdata('level') == 'Anggota') { ?>
                    <a href="<?= base_url('transaksi'); ?>" class="btn btn-danger btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="icon-label"><span class="feather-icon"><i data-feather="arrow-left-circle"></i></span></span><span class="btn-text">Kembali</span></a>
                <?php } ?>
                <div class="row">
                    <div class="col-sm">
                        <form action="<?php echo base_url('user/upd'); ?>" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" value="<?= $user->nama; ?>" name="nama" required="required" placeholder="Nama Lengkap">
                                    </div>
                                    <div class="form-group">
                                        <label>Tempat Lahir</label>
                                        <input type="text" class="form-control" name="lahir" value="<?= $user->tempat_lahir; ?>" required="required" placeholder="Contoh : Bekasi">
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tgl_lahir" value="<?= $user->tgl_lahir; ?>" required="required" placeholder="Contoh : 1999-05-18">
                                    </div>
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" readonly value="<?= $user->user; ?>" name="user" required="required" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <label>Password (opsional)</label>
                                        <input type="password" class="form-control" name="pass" placeholder="Isi Password Jika di Perlukan Ganti">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <select name="level" class="form-control" required="required">
                                            <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                                                <option <?php if ($user->level == 'Petugas') {
                                                            echo 'selected';
                                                        } ?>>Petugas</option>
                                                <option <?php if ($user->level == 'Anggota') {
                                                            echo 'selected';
                                                        } ?>>Anggota</option>
                                            <?php } elseif ($this->session->userdata('level') == 'Anggota') { ?>
                                                <option <?php if ($user->level == 'Anggota') {
                                                            echo 'selected';
                                                        } ?>>Anggota</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <br />
                                        <input type="radio" name="jenkel" <?php if ($user->jenkel == 'Laki-Laki') {
                                                                                echo 'checked';
                                                                            } ?> value="Laki-Laki" required="required"> Laki-Laki
                                        <br />
                                        <input type="radio" name="jenkel" <?php if ($user->jenkel == 'Perempuan') {
                                                                                echo 'checked';
                                                                            } ?> value="Perempuan" required="required"> Perempuan
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Telepon</label>
                                        <input id="uintTextBox" class="form-control" value="<?= $user->telepon; ?>" name="telepon" required="required" placeholder="Contoh : 089618173609">
                                    </div>
                                    <div class="form-group">
                                        <label>E-mail</label>
                                        <input type="email" value="<?= $user->email; ?>"  class="form-control" name="email" required="required" placeholder="Contoh : sahfira@gmail.com">
                                    </div>
                                    <div class="form-group">
                                        <label>Pas Foto</label>
                                        <input type="file" accept="image/*" name="gambar">

                                        <br />
                                        <div class="media-img-wrap">
                                            <div class="avatar avatar-xl">
                                                <img src="<?= base_url('assets_style/image/' . $user->foto); ?>" class="avatar-img rounded" alt="#">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Alamat</label>
                                        <textarea class="form-control" name="alamat" required="required"><?= $user->alamat; ?></textarea>
                                        <input type="hidden" class="form-control" value="<?= $user->id_login; ?>" name="id_login">
                                        <input type="hidden" class="form-control" value="<?= $user->foto; ?>" name="foto">
                                    </div>
                                </div>
                            </div>
                            <div class="pull-right">
                                <button type="submit" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="btn-text">Edit Data</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>