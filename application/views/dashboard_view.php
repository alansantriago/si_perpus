<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php if ($this->session->userdata('level') == 'Anggota') {
  redirect(base_url('transaksi'));
} ?>
<div class="container mt-xl-50 mt-sm-30 mt-15">
  <div class="hk-pg-header align-items-top">
    <div>
      <h2 class="hk-pg-title font-weight-600 mb-10"><span class="feather-icon"><i data-feather="activity"></i></span>&nbsp;Dashboard</h2>
      <?php
      function sambutan($jam)
      {
        if ($jam >= 5 && $jam <= 10) {
          return "🍃 Selamat pagi, ";
        } else {
          if ($jam > 11 && $jam <= 14) {
            return "🌞 Selamat siang, ";
          } else {
            if ($jam > 14 && $jam <= 18) {
              return "🌥️ Selamat sore, ";
            } else {
              return "🌗 Selamat malam, ";
            }
          }
        }
      }
      $jam = date('H');
      $d = $this->db->query("SELECT * FROM tbl_login WHERE id_login = '$idbo'")->row();
      ?>
      <p><?php echo sambutan($jam) . $d->nama;  ?></p>
    </div>
  </div>
  <section class="hk-sec-wrapper">
    <h5 class="hk-sec-title mb-30">Data hari ini</h5>
    <div class="row">
      <div class="col-sm">
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card mb-20">
              <div class="card-body">
                <h5 class="card-title">👨‍🎓👩‍🎓 Anggota </h5>
                <p class="card-text display-1 text-center text-lime counter-anim"><?= $count_pengguna; ?></p>
                <div class="card-footer">
                  <a href="user" class="btn btn-lime btn-wth-icon btn-rounded text-white icon-right"><span class="btn-text">Lihat data</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">📚 Buku</h5>
                <p class="card-text display-1 text-center text-violet counter-anim"><?= $count_buku; ?></p>
                <div class="card-footer">
                  <a href="data" class="btn btn-violet btn-wth-icon btn-rounded text-white icon-right"><span class="btn-text">Lihat data</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">💰 Buku dipinjam</h5>
                <p class="card-text display-1 text-center text-success counter-anim"><?= $count_pinjam; ?></p>
                <div class="card-footer">
                  <a href="transaksi" class="btn btn-success btn-wth-icon btn-rounded text-white icon-right"><span class="btn-text">Lihat data</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">💲 Buku kembali</h5>
                <p class="card-text display-1 text-center text-pumpkin counter-anim"><?= $count_kembali; ?></p>
                <div class="card-footer">
                  <a href="transaksi/kembali" class="btn btn-pumpkin btn-wth-icon btn-rounded text-white icon-right"><span class="btn-text">Lihat data</span> <span class="icon-label"><span class="feather-icon"><i data-feather="arrow-right-circle"></i></span></span></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>