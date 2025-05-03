<?php
include_once 'top.php';

$koneksi = new mysqli("localhost", "root", "", "db_pukesmas");

require_once 'dbkoneksi.php';

$_id = $_GET['id'] ?? ''; // Ambil id dari URL
$row = []; // Default kosong
$tombol = 'Simpan'; // Default tombol

if ($_id) {
    $sql = "SELECT * FROM paramedik WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    $tombol = 'Ubah';
}

// Ambil row unit kerja
$query_unit_kerja = "SELECT id, nama FROM unit_kerja";
$result_unit_kerja = $koneksi->query($query_unit_kerja);
?>


<?php
                include_once 'top.php';

        ?>

    <!--begin::App Wrapper-->
    <div class="app-wrapper">
      <!--begin::Header-->
      <nav class="app-header navbar navbar-expand bg-body">
        <!--begin::Container-->
       <?php include_once 'menu.php'; ?>
        <!--end::Container-->
      </nav>
      <!--end::Header-->
      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="./dist/assets/img/AdminLTELogo.png"
              alt="AdminLTE Logo"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">Ramaaditia</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <?php include_once 'sidebar.php'; ?>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->
      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->

<div id="page-content-wrapper">
  <?php include_once 'menu.php'; ?>
  <form class="container form-horizontal" action="proses_paramedik.php" method="POST">
    <fieldset>
      <legend>Form Paramedik</legend>
      <input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">

      <!-- Nama -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="nama">Nama Lengkap</label>
        <div class="col-md-4">
          <input type="text" name="nama" class="form-control" placeholder="Masukan Nama Lengkap..." value="<?= $row['nama'] ?? '' ?>">
        </div>
      </div>

          <!-- Gender -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="gender">Jenis Kelamin</label>
            <div class="col-md-4"> 
                <label class="radio-inline" for="gender_l">
                <input type="radio" name="gender" id="gender_l" value="L" <?= ($row['gender'] ?? '') === 'L' ? 'checked' : '' ?>>
                Laki - Laki
                </label> 
                <label class="radio-inline" for="gender_p">
                <input type="radio" name="gender" id="gender_p" value="P" <?= ($row['gender'] ?? '') === 'P' ? 'checked' : '' ?>>
                Perempuan
                </label> 
            </div>
            </div>

      <!-- Tempat Lahir -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="tmp_lahir">Tempat Lahir</label>
        <div class="col-md-4">
          <input type="text" name="tmp_lahir" class="form-control" placeholder="Masukan Tempat Lahir..." value="<?= $row['tmp_lahir'] ?? '' ?>">
        </div>
      </div>

      <!-- Tanggal Lahir -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="tgl_lahir">Tanggal Lahir</label>
        <div class="col-md-4">
          <input type="date" name="tgl_lahir" class="form-control" value="<?= $row['tgl_lahir'] ?? '' ?>">
        </div>
      </div>

            <!-- Kategori -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="kategori">Kategori</label>
            <div class="col-md-4">
                <select name="kategori" class="form-control">
                    <option value="dokter" <?= ($row['kategori'] ?? '') === 'Dokter' ? 'selected' : '' ?>>Dokter</option>
                    <option value="bidan" <?= ($row['kategori'] ?? '') === 'Bidan' ? 'selected' : '' ?>>Bidan</option>
                    <option value="perawat" <?= ($row['kategori'] ?? '') === 'Perawat' ? 'selected' : '' ?>>Perawat</option>
                </select>
            </div>
        </div>


      <!-- Telpon -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="telpon">Telpon</label>
        <div class="col-md-4">
          <input type="text" name="telpon" class="form-control" placeholder="Masukan No Telpon..." value="<?= $row['telpon'] ?? '' ?>">
        </div>
      </div>

      <!-- Unit Kerja -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="unit_kerja_id">Unit Kerja</label>
        <div class="col-md-4">
          <select name="unit_kerja_id" class="form-control">
            <option value="">-- Pilih Unit Kerja --</option>
            <?php while ($uk = $result_unit_kerja->fetch_assoc()) : ?>
              <option value="<?= $uk['id'] ?>" <?= ($uk['id'] == ($row['unit_kerja_id'] ?? '')) ? 'selected' : '' ?>>
                <?= htmlspecialchars($uk['nama']) ?>
              </option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>

      <!-- Alamat -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="alamat">Alamat</label>
        <div class="col-md-4">
          <textarea name="alamat" class="form-control" placeholder="Masukan Alamat..."><?= $row['alamat'] ?? '' ?></textarea>
        </div>
      </div>

      <!-- Tombol -->
      <div class="form-group">
        <label class="col-md-4 control-label" for="singlebutton">Kirim Form</label>
        <div class="col-md-4">
          <button type="submit" name="proses" value="<?= $tombol ?>" class="btn btn-primary">Kirim</button>
          <button type="reset" name="reset" value="batal" class="btn btn-secondary">Batal</button>
        </div>
      </div>
    </fieldset>
    <!--end::App Content-->
    </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      <footer class="app-footer">
        <!--begin::To the end-->
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <!--end::To the end-->
        <!--begin::Copyright-->
        <strong>
          Copyright &copy; 2014-2024&nbsp;
          <a href="https://github.com/Ramaaditia123" class="text-decoration-none">Ramaaditia</a>.
        </strong>
        All rights reserved.
        <!--end::Copyright-->
      </footer>
      <!--end::Footer-->
  </form>
  <?php include_once 'bottom.php'; ?>
</div>
