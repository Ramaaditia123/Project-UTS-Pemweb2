<?php
$menus = [
    [
        "icon" => "warehouse",
        "label" => "Kab/Kota",
        "id" => "menuKabkota",
        "items" => [
            ["link" => "list-kabkota.php", "label" => "List Kab/Kota"],
            ["link" => "form-kabkota.php", "label" => "Tambah"],
        ]
    ],
    [
        "icon" => "user",
        "label" => "Kategori UMKM",
        "id" => "menuKategori",
        "items" => [
            ["link" => "list-kategori_umkm.php", "label" => "List UMKM"],
            ["link" => "form-kategori_umkm.php", "label" => "Tambah"],
        ]
    ],
    [
        "icon" => "cog",
        "label" => "Pembina",
        "id" => "menuPembina",
        "items" => [
            ["link" => "pembina.php", "label" => "List Pembina"],
            ["link" => "form-pembina.php", "label" => "Tambah"],
        ]
    ],
    [
        "icon" => "wrench",
        "label" => "Provinsi",
        "id" => "menuProvinsi",
        "items" => [
            ["link" => "provinsi.php", "label" => "List Provinsi"],
            ["link" => "form-provinsi.php", "label" => "Tambah"],
        ]
    ],
    [
        "icon" => "user-circle",
        "label" => "UMKM",
        "id" => "menuUmkm",
        "items" => [
            ["link" => "umkm.php", "label" => "List UMKM"],
            ["link" => "form-umkm.php", "label" => "Tambah"],
        ]
    ],
];
?>

<nav class="mt-2">
            <!--begin::Sidebar Menu-->

            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
            
              <li class="nav-item">
                <a href="index.php" class="nav-link active">
                <i class="nav-icon bi bi-speedometer"></i>
                <p>Dashboard</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon bi bi-box-seam-fill"></i>
                  <p>
                    Pasien
                    <i class="nav-arrow bi bi-chevron-right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="data_pasien.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Pasien</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_periksa.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Pemeriksaan Pasien</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="data_paramedik.php" class="nav-link">
                      <i class="nav-icon bi bi-circle"></i>
                      <p>Data Paramedik</p>
                    </a>
                  </li>
                </ul>
              </li>

              
              
                
            </ul>
            <!--end::Sidebar Menu-->
          </nav>