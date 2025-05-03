<?php
require_once 'dbkoneksi.php';

$_kode = $_POST['kode'];
$_nama = $_POST['nama'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_gender = $_POST['gender'];
$_email = $_POST['email'];
$_alamat = $_POST['alamat'];
$_kelurahan = $_POST['kelurahan_id']; // sesuaikan dengan form
$data = [$_kode, $_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_email, $_alamat, $_kelurahan];

// Tambah/Ubah
$_proses = $_POST['proses'];
if ($_proses == "Simpan") {
    $sql = "INSERT INTO pasien (kode,nama,tmp_lahir,tgl_lahir,gender,email,alamat,kelurahan_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $st = $dbh->prepare($sql);
    $st->execute($data);
} else if ($_proses == "Ubah") {
    $_id = $_POST['id']; 
$data[] = $_id;
$sql = "UPDATE pasien SET kode=?, nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, email=?, alamat=?, kelurahan_id=?
            WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute($data);
}

// Hapus
if (isset($_GET['proses']) && $_GET['proses'] == 'Hapus') {
$idx = $_GET['idx'];
$sql = "DELETE FROM pasien WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$idx]);
}

header('Location: data_pasien.php');
?>
