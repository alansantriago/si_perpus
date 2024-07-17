<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<nav class="hk-nav hk-nav-light">
    <a href="javascript:void(0);" id="hk_nav_close" class="hk-nav-close"><span class="feather-icon"><i data-feather="x"></i></span></a>
    <div class="nicescroll-bar">
        <div class="navbar-nav-wrap">
            <ul class="navbar-nav flex-column">
                <?php if ($this->session->userdata('level') == 'Petugas') { ?>
                    <li class="nav-item <?php if ($this->uri->uri_string() == 'dashboard') {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url('dashboard'); ?>">
                            <span class="feather-icon"><i data-feather="activity"></i></span>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->uri_string() == 'user') {
                                            echo 'active';
                                        } ?>
                <?php if ($this->uri->uri_string() == 'user/tambah') {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'user/edit/' . $this->uri->segment('3')) {
                        echo 'active';
                    } ?>">
                        <a class="nav-link" href="<?php echo base_url('user'); ?>">
                            <span class="feather-icon"><i data-feather="users"></i></span>
                            <span class="nav-link-text">Data Pengguna</span></a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->uri_string() == 'data/kategori') {
                                            echo 'active';
                                        } ?>
				<?php if ($this->uri->uri_string() == 'data/rak') {
                        echo 'active';
                    } ?>
				<?php if ($this->uri->uri_string() == 'data') {
                        echo 'active';
                    } ?>
				<?php if ($this->uri->uri_string() == 'data/bukutambah') {
                        echo 'active';
                    } ?>
				<?php if ($this->uri->uri_string() == 'data/bukudetail/' . $this->uri->segment('3')) {
                        echo 'active';
                    } ?>
				<?php if ($this->uri->uri_string() == 'data/bukuedit/' . $this->uri->segment('3')) {
                        echo 'active';
                    } ?>">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#data">
                            <span class="feather-icon"><i data-feather="database"></i></span>
                            <span class="nav-link-text">Data</span>
                        </a>
                        <ul id="data" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item <?php if ($this->uri->uri_string() == 'data') {
                                                            echo 'active';
                                                        } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukutambah') {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukudetail/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>
                        <?php if ($this->uri->uri_string() == 'data/bukuedit/' . $this->uri->segment('3')) {
                            echo 'active';
                        } ?>">
                                        <a class="nav-link" href="<?php echo base_url("data"); ?>" class="cursor">
                                            <span class="fa fa-book"></span>
                                            <span class="nav-link-text">&nbsp;Data Buku</span>

                                        </a>
                                    </li>
                                    <li class="nav-item <?php if ($this->uri->uri_string() == 'data/kategori') {
                                                            echo 'active';
                                                        } ?>">
                                        <a class="nav-link" href="<?php echo base_url("data/kategori"); ?>" class="cursor">
                                            <span class="fa fa-tags"></span>&nbsp;Kategori

                                        </a>
                                    </li>
                                    <li class="nav-item <?php if ($this->uri->uri_string() == 'data/rak') {
                                                            echo 'active';
                                                        } ?>">
                                        <a class="nav-link" href="<?php echo base_url("data/rak"); ?>" class="cursor">
                                            <span class="fa fa-list"></span>&nbsp;Rak

                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item 
                <?php if ($this->uri->uri_string() == 'transaksi') {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'transaksi/kembali') {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'transaksi/pinjam') {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'transaksi/detailpinjam/' . $this->uri->segment('3')) {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'transaksi/kembalipinjam/' . $this->uri->segment('3')) {
                        echo 'active';
                    } ?>">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#transaksi">
                            <span class="feather-icon"><i data-feather="server"></i></span>
                            <span class="nav-link-text">Transaksi</span>
                        </a>
                        <ul id="transaksi" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item <?php if ($this->uri->uri_string() == 'transaksi') {
                                                            echo 'active';
                                                        } ?> <?php if ($this->uri->uri_string() == 'transaksi/pinjam') {
                                                                    echo 'active';
                                                                } ?> <?php if ($this->uri->uri_string() == 'transaksi/kembalipinjam/' . $this->uri->segment('3')) {
                                                                                echo 'active';
                                                                            } ?>">
                                        <a class="nav-link" href="<?php echo base_url("transaksi"); ?>" class="cursor">
                                            <span class="fa fa-upload"></span>&nbsp;Peminjaman

                                        </a>
                                    </li>
                                    <li class="nav-item <?php if ($this->uri->uri_string() == 'transaksi/kembali') {
                                                            echo 'active';
                                                        } ?>">
                                        <a class="nav-link" href="<?php echo base_url("transaksi/kembali"); ?>" class="cursor">
                                            <span class="fa fa-download"></span>&nbsp;Pengembalian
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    
                    <li class="nav-item 
                <?php if ($this->uri->uri_string() == 'laporan') {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'laporan/kembali') {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'laporan/pinjam') {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'laporan/detailpinjam/' . $this->uri->segment('3')) {
                        echo 'active';
                    } ?>
                <?php if ($this->uri->uri_string() == 'laporan/kembalipinjam/' . $this->uri->segment('3')) {
                        echo 'active';
                    } ?>">
                    <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#laporan">
                            <span class="feather-icon"><i data-feather="server"></i></span>
                            <span class="nav-link-text">Laporan</span>
                        </a>
                        <ul id="laporan" class="nav flex-column collapse collapse-level-1">
                            <li class="nav-item">
                                <ul class="nav flex-column">
                                    <li class="nav-item <?php if ($this->uri->uri_string() == 'laporan') {
                                                            echo 'active';
                                                        } ?> <?php if ($this->uri->uri_string() == 'laporan/pinjam') {
                                                                    echo 'active';
                                                                } ?> <?php if ($this->uri->uri_string() == 'laporan/kembalipinjam' . $this->uri->segment('3')) {
                                                                                echo 'active';
                                                                            } ?>">
                                        <a class="nav-link" href="<?php echo base_url("laporan"); ?>" class="cursor">
                                            <span class="fa fa-upload"></span>&nbsp;Laporan Buku Dipinjam
                                        </a>
                                    </li>
                                    <li class="nav-item <?php if ($this->uri->uri_string() == 'laporan/kembali') {
                                                            echo 'active';
                                                        } ?>">
                                        <a class="nav-link" href="<?php echo base_url("laporan/kembali"); ?>" class="cursor">
                                            <span class="fa fa-download"></span>&nbsp;Laporan Buku Dibalikan
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item <?php if ($this->uri->uri_string() == 'transaksi/denda') {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url('transaksi/denda'); ?>">
                            <span class="feather-icon"><i data-feather="dollar-sign"></i></span>
                            <span class="nav-link-text">Denda</span>
                        </a>
                    </li>
                <?php } ?>
                <?php if ($this->session->userdata('level') == 'Anggota') { ?>
                    <li class="nav-item <?php if ($this->uri->uri_string() == 'transaksi') {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url("transaksi"); ?>">
                            <span class="feather-icon"><i data-feather="download"></i></span>
                            <span class="nav-link-text">Data Peminjaman</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->uri_string() == 'transaksi/kembali') {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url("transaksi/kembali"); ?>">
                            <span class="feather-icon"><i data-feather="upload"></i></span>
                            <span class="nav-link-text">Data Pengembalian</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->uri_string() == 'data') {
                                            echo 'active';
                                        } ?> <?php if ($this->uri->uri_string() == 'data/bukudetail/' . $this->uri->segment('3')) {
                                                    echo 'active';
                                                } ?>">
                        <a class="nav-link" href="<?php echo base_url("data"); ?>">
                            <span class="feather-icon"><i data-feather="search"></i></span>
                            <span class="nav-link-text">Cari Buku</span>
                        </a>
                    </li>
                    <li class="nav-item <?php if ($this->uri->uri_string() == 'user/edit/' . $this->uri->segment('3')) {
                                            echo 'active';
                                        } ?>">
                        <a class="nav-link" href="<?php echo base_url('user/edit/' . $this->session->userdata('ses_id')); ?>" class="cursor">
                            <span class="feather-icon"><i data-feather="user"></i></span>
                            <span class="nav-link-text">Data Anggota</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url('user/detail/' . $this->session->userdata('ses_id')); ?>" target="_blank" class="cursor">
                            <span class="feather-icon"><i data-feather="printer"></i></span>
                            <span class="nav-link-text">Cetak Kartu Anggota</span>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>