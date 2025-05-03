<?php
include_once 'top.php';

$koneksi = new mysqli("localhost", "root", "", "db_pukesmas");

require_once 'dbkoneksi.php';

$_id = $_GET['id'] ?? ''; // Ambil id dari URL
$row = []; // Default kosong
$tombol = 'Simpan'; // Default tombol

if ($_id) {
    $sql = "SELECT * FROM periksa WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute([$_id]);
    $row = $st->fetch();
    $tombol = 'Ubah';
}

// Ambil row pasien
$query_pasien = "SELECT id, nama FROM pasien";
$result_pasien = $koneksi->query($query_pasien);
// Ambil row dokter
$query_dokter = "SELECT id, nama FROM paramedik";
$result_dokter = $koneksi->query($query_dokter);

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
      

<div id="page-content-wrapper">      
    <?php include_once 'menu.php';?>
    <form class="container mt-1 mb-5 form-horizontal" action="proses_periksa.php" method="POST">
<fieldset>

<!-- Form Name -->
<legend>Form Periksa Pasien</legend>
<input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">


 <!-- Nama pasien -->
 <div class="form-group">
        <label class="col-md-4 control-label" for="pasien_id">Nama Pasien</label>
        <div class="col-md-4">
          <select name="pasien_id" class="form-control">
            <option value="">-- Pilih Pasien --</option>
            <?php while ($uk = $result_pasien->fetch_assoc()) : ?>
              <option value="<?= $uk['id'] ?>" <?= ($uk['id'] == ($row['pasien_id'] ?? '')) ? 'selected' : '' ?>>
                <?= htmlspecialchars($uk['nama']) ?>
              </option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>

 <!-- Dokter -->
 <div class="form-group">
        <label class="col-md-4 control-label" for="dokter_id">Dokter</label>
        <div class="col-md-4">
          <select name="dokter_id" class="form-control">
            <option value="">-- Pilih Dokter --</option>
            <?php while ($uk = $result_dokter->fetch_assoc()) : ?>
              <option value="<?= $uk['id'] ?>" <?= ($uk['id'] == ($row['dokter_id'] ?? '')) ? 'selected' : '' ?>>
                <?= htmlspecialchars($uk['nama']) ?>
              </option>
            <?php endwhile; ?>
          </select>
        </div>
      </div>
        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tanggal">Tanggal </label>  
            <div class="col-md-4">
            <input id="tanggal" name="tanggal" type="date" value="<?= $row['tanggal']?? '' ?>"  class="form-control input-md">
            </div>
        </div>
        <div class="form-group">
    <label class="col-md-4 control-label" for="berat">Berat </label>  
    <div class="col-md-4">
        <input id="berat" name="berat" type="text" step="any" value="<?= $row['berat']?? '' ?>" placeholder="Masukkan Berat Badan (kg)..." class="form-control input-md">
    </div> 
</div>

<div class="form-group">
    <label class="col-md-4 control-label" for="tinggi">Tinggi </label>  
    <div class="col-md-4">
        <input id="tinggi" name="tinggi" type="text" step="any" value="<?= $row['tinggi']?? '' ?>" placeholder="Masukkan Tinggi Badan (cm)..." class="form-control input-md">
    </div>
</div>

        <!-- Text input-->
        <div class="form-group">
            <label class="col-md-4 control-label" for="tensi">Tensi </label>  
            <div class="col-md-4">
            <input id="tensi" name="tensi" type="number" value="<?= $row['tensi']?? '' ?>" placeholder="Masukan Tensi Badan..." class="form-control input-md">
            </div>
        </div>

        
<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="keterangan">Keterangan</label>
  <div class="col-md-4">                     
  <textarea class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan Pasien..."><?= $row['keterangan'] ?? '' ?></textarea>
  </div>
</div>



<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Kirim Form</label>
  <div class="col-md-4">
    <button type="submit" name="proses" value="<?= $tombol ?>" class="btn btn-primary">Kirim</button>
    <button type="reset" name="reset" value="batal" class="btn btn-primary">Batal</button>
    
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
    
    <?php include_once 'bottom.php';?>


    
