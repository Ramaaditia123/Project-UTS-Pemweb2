<?php
                include_once 'top.php';
                //koneksi databes nya
                require_once 'dbkoneksi.php';
                
                
                $rows = $dbh->query("SELECT * FROM pasien")->fetchAll(PDO::FETCH_ASSOC);
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

<?php
include_once 'top.php';

//koneksi databes nya
require_once 'dbkoneksi.php';


$rows = $dbh->query("SELECT * FROM paramedik")->fetchAll(PDO::FETCH_ASSOC);

?>

<div id="page-content-wrapper">      
    <?php 
        include_once 'menu.php';
    ?>
    <!-- Page content-->
    <div class="container-fluid">
        <form method="post" action="nilai_siswa.php" class="  form-horizontal   ">
<fieldset>


<!-- Form Name -->
<legend>Data Paramedik</legend>
<br><br><br>
<table class="table">
                    <caption>Data Paramedik</caption>
                    <a href="form_paramedik.php " class="btn btn-success">Tambah Paramedik</a>
                        <thead>
                            <tr>
                                <th>NO</th>
                                <th>Nama Paramedik</th>
                                <th>Alamat</th>
                                <th >Aksi</th>
                            </tr>
                        </thead>
                     <tbody>
                     <?php 
                        $no = 1;
                        foreach ($rows as $row): 
                        ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['nama']; ?></td>
                            <td><?= $row['alamat']; ?></td>
                            <td>
                            <a href="form_paramedik.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                                <a href="proses_paramedik.php?proses=Hapus&idx=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        
                        </tbody>
                    </table>
                </div>
                
            </div>
            
            </fieldset>
          
        </form>
        
    </div>
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
</div>


<?php
include_once 'bottom.php'
;
?>