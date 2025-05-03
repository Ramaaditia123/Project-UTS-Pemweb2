
<?php
                include_once 'top.php';
                $koneksi = new mysqli("localhost", "root", "", "db_pukesmas");

                require_once 'dbkoneksi.php';
                
                $_id = $_GET['id'] ?? ''; // Ambil id dari URL
                $row = []; // Default kosong
                $tombol = 'Simpan'; // Default tombol
                
                if ($_id) {
                    $sql = "SELECT * FROM pasien WHERE id=?";
                    $st = $dbh->prepare($sql);
                    $st->execute([$_id]);
                    $row = $st->fetch();
                    $tombol = 'Ubah';
                }
                
                // Ambil row kelurahan
                $query_kelurahan = "SELECT id, nama FROM kelurahan";
                $result_kelurahan = $koneksi->query($query_kelurahan);
                
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
        <div class="app-content">
          <!--begin::Container-->
          <div class="card-header"><div class="card-title">Tambah Pasien</div></div>
                  <!--end::Header-->
                  <!--begin::Form-->
                  <form action="proses_pasien.php" method="POST">
                    <!--begin::Body-->
                    <input type="hidden" name="id" value="<?= $row['id'] ?? '' ?>">

                    <div class="card-body">
                      <div class="row mb-3">
                        <label for="text" class="col-sm-2 col-form-label">Kode</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="kode" name="kode"  value="<?= $row['kode']?? '' ?>" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text " class="form-control" id="nama" name="nama"  value="<?= $row['nama']?? '' ?>"/>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tempat Lahir</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir"  value="<?= $row['tmp_lahir']?? '' ?>" />
                        </div>
                      </div>
                      
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir"  value="<?= $row['tgl_lahir']?? '' ?>"/>
                        </div>
                      </div>  
                      <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Radios</legend>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="gender" id="gender_l" value="L" <?= ($row['gender'] ?? '') === 'L' ? 'checked' : '' ?>>

                            <label class="form-check-label" for="gender_l"> laki- Laki </label>
                          </div>
                          <div class="form-check">
                            <input
                              class="form-check-input"
                              type="radio"
                              name="gender" id="gender_p" value="P" <?= ($row['gender'] ?? '') === 'P' ? 'checked' : '' ?>>
                            <label class="form-check-label" for="gender_p"> Perempuan </label>
                          </div>
                          
                        </div>
                      </fieldset>
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email"  value="<?= $row['email']?? '' ?>" />
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputPassword3" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="alamat" name="alamat"  value="<?= $row['alamat']?? '' ?>"/>
                        </div>
                      </div>
                    </div>
                   <!-- Select Basic -->
                   <div class="row mb-3">
  <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
  <div class="col-sm-10">
    <select id="kelurahan" name="kelurahan_id" class="form-control">
      <option value="">-- Pilih Kelurahan --</option>
      <?php
        while ($kel = $result_kelurahan->fetch_assoc()) {
          $selected = ($kel['id'] == ($row['kelurahan_id'] ?? '')) ? 'selected' : '';
          echo "<option value='" . $kel['id'] . "' $selected>" . $kel['nama'] . "</option>";
        }
      ?>
    </select>
  </div>
</div>

                    <!--end::Body-->
                    <!--begin::Footer-->
                    <div class="card-footer ">
                      <button type="submit"  name="proses" value="<?= $tombol ?>" class="btn btn-warning">Sumbit</button>
                      <button type="submit" class="btn float-end">Cancel</button>
                    </div>
                  </form>
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
<?php include 'bottom.php'; ?>

          
   