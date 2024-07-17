<?php if (!defined('BASEPATH')) exit('No direct script acess allowed'); ?>
<nav class="hk-breadcrumb" aria-label="breadcrumb">
    <ol class="breadcrumb breadcrumb-light bg-transparent">
        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Data Pengguna</li>
    </ol>
</nav>
<div class="container">
    <div class="hk-pg-header">
        <h4 class="hk-pg-title"><span class="pg-title-icon"><span class="feather-icon"><i data-feather="users"></i></span></span>Data Pengguna</h4>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <section class="hk-sec-wrapper">
                <a href="user/tambah" class="btn btn-success btn-wth-icon btn-rounded text-white icon-left mb-30"><span class="btn-text">Tambah Pengguna</span> <span class="icon-label"><span class="feather-icon"><i data-feather="user-plus"></i></span></span></a>
                <div class="row">
                    <div class="col-lg">
                        <div class="table-wrap">
                            <table id="datable_1" class="table pb-30 ">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th>Gender</th>
                                        <th>Level</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($user as $isi) { ?>
                                        <tr>
                                            <td><?= $no; ?></td>
                                            <td><?= $isi['anggota_id']; ?></td>
                                            <td>
                                                <div class="media-img-wrap">
                                                    <div class="avatar avatar-xl">
                                                        <?php if (!empty($isi['foto'] !== "-")) { ?>
                                                            <img src="<?php echo base_url(); ?>assets_style/image/<?php echo $isi['foto']; ?>" alt="#" class="avatar-img rounded-circle" />
                                                        <?php } else { ?>
                                                            <i class="fa fa-user fa-3x" style="color:#333;"></i>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </td>
                                            <td><?= $isi['nama']; ?></td>
                                            <td><?= $isi['user']; ?></td>
                                            <td><?= $isi['jenkel']; ?></td>
                                            <td><?= $isi['level']; ?></td>
                                            <td>
                                                <a href="<?= base_url('user/edit/' . $isi['id_login']); ?>"><button class="btn btn-icon btn-icon-circle btn-success btn-icon-style-2"><span class="btn-icon-wrap"><i class="fa fa-pencil"></i></span></button></a>
                                                <a href="<?= base_url('user/del/' . $isi['id_login']); ?>" onclick="return confirm('Hapus pengguna dengan username <?= $isi['user']; ?>?');">
                                                    <button class="btn btn-icon btn-icon-circle btn-danger btn-icon-style-2"><span class="btn-icon-wrap"><i class="icon-trash"></i></span></button></a>
                                                <a href="<?= base_url('user/detail/' . $isi['id_login']); ?>" target="_blank"><button class="btn btn-warning btn-wth-icon btn-md btn-rounded"> <span class="icon-label"><span class="feather-icon"><i data-feather="printer"></i></span> </span><span class="btn-text">Cetak Kartu</span></button></a>
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