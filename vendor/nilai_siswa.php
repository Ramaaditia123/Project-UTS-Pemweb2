
<?php
include_once 'top.php';

?>

<div id="page-content-wrapper">      
    <?php 
        include_once 'menu.php';
    ?>
     <div class="container-fluid">
        <h5 class="mt-4">Selamat Datang Di Nilai  Mahasiswa</h5>
    </div>
    <!-- Page content-->
        <div class="container-fluid">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $nama_siswa = $_POST['nama'];
                        $mata_kuliah = $_POST['matkul'];
                        $nilai_uts = $_POST['nilai_uts'];
                        $nilai_uas = $_POST['nilai_uas'];
                        $nilai_tugas = $_POST['nilai_tugas'];

                        // Menghitung nilai total dengan presentase
                        $nilai_total = ($nilai_uts * 0.30) + ($nilai_uas * 0.35) + ($nilai_tugas * 0.35);

                        // Menentukan kelulusan
                        $kelulusan = ($nilai_total > 55) ? "Lulus" : "Tidak Lulus";

                        // Menentukan grade
                        if ($nilai_total >= 85 && $nilai_total <= 100) {
                            $grade = "A";
                        } elseif ($nilai_total >= 70) {
                            $grade = "B";
                        } elseif ($nilai_total >= 56) {
                            $grade = "C";
                        } elseif ($nilai_total >= 36) {
                            $grade = "D";
                        } elseif ($nilai_total >= 0) {
                            $grade = "E";
                        } else {
                            $grade = "I"; // Invalid nilai
                        }

                        // Menentukan predikat berdasarkan grade
                        switch ($grade) {
                            case "A":
                                $predikat = "Sangat Memuaskan";
                                break;
                            case "B":
                                $predikat = "Memuaskan";
                                break;
                            case "C":
                                $predikat = "Cukup";
                                break;
                            case "D":
                                $predikat = "Kurang";
                                break;
                            case "E":
                                $predikat = "Sangat Kurang";
                                break;
                            default:
                                $predikat = "Tidak Ada";
                        }

                        // Menampilkan hasil
                        echo "<style>
                                table { width: 50%; margin: auto; border-collapse: collapse; text-align: center; }
                                th, td { border: 1px solid black; padding: 10px; text-align: center; }
                                h3 { text-align: center; }
                                .link-container { text-align: center; margin-top: 20px; }
                            </style>";
                        
                        echo "<h3>Hasil Penilaian:</h3>";
                        echo "<table>";
                        echo "<tr><th>Nama</th><td>$nama_siswa</td></tr>";
                        echo "<tr><th>Mata Kuliah</th><td>$mata_kuliah</td></tr>";
                        echo "<tr><th>Nilai UTS</th><td>$nilai_uts</td></tr>";
                        echo "<tr><th>Nilai UAS</th><td>$nilai_uas</td></tr>";
                        echo "<tr><th>Nilai Tugas</th><td>$nilai_tugas</td></tr>";
                        echo "<tr><th>Nilai Total</th><td>$nilai_total</td></tr>";
                        echo "<tr><th>Status</th><td><b>$kelulusan</b></td></tr>";
                        echo "<tr><th>Grade</th><td>$grade</td></tr>";
                        echo "<tr><th>Predikat</th><td>$predikat</td></tr>";
                        echo "</table>";
                        
                        echo "<div class='link-container'>";
                        // echo "<a href='form_nilai.php'>Kembali ke Form</a>";
                        echo "</div>";
                    }
                    ?>
                                    </div>
                                </div>
                    <?php
                    include_once 'bottom.php'
                    ;
                    ?>