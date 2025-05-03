<?php


require_once 'dbkoneksi.php';

$_nama = $_POST['nama'];
$_gender = $_POST['gender'];
$_tmp_lahir = $_POST['tmp_lahir'];
$_tgl_lahir = $_POST['tgl_lahir'];
$_kategori = $_POST['kategori'];
$_telpon = $_POST['telpon'];
$_alamat = $_POST['alamat'];
$_unit_kerja = $_POST['unit_kerja_id']; // dari select option
$data = [$_nama, $_gender, $_tmp_lahir, $_tgl_lahir, $_kategori, $_telpon, $_alamat, $_unit_kerja];

// Tambah/Ubah
$_proses = $_POST['proses'];
if ($_proses == "Simpan") {
    $sql = "INSERT INTO paramedik (nama, gender, tmp_lahir, tgl_lahir, kategori, telpon, alamat, unit_kerja_id)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $st = $dbh->prepare($sql);
    $st->execute($data);
} else if ($_proses == "Ubah") {
    $_id = $_POST['id'];
    $data_update = [$_nama, $_tmp_lahir, $_tgl_lahir, $_gender, $_kategori, $_telpon, $_alamat, $_unit_kerja, $_id];

    $sql = "UPDATE paramedik 
            SET nama=?, tmp_lahir=?, tgl_lahir=?, gender=?, kategori=?, telpon=?, alamat=?, unit_kerja_id=?
            WHERE id=?";
    $st = $dbh->prepare($sql);
    $st->execute($data_update);
}


// Hapus
if (isset($_GET['proses']) && $_GET['proses'] == 'Hapus') {
$idx = $_GET['idx'];
$sql = "DELETE FROM paramedik WHERE id=?";
$st = $dbh->prepare($sql);
$st->execute([$idx]);
}

header('Location: data_paramedik.php');
?>
