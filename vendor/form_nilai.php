<?php
include_once 'top.php';

?>

<div id="page-content-wrapper">      
    <?php 
        include_once 'menu.php';
    ?>
    <!-- Page content-->
    <div class="container-fluid">
                <form method="post" action="nilai_siswa.php" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Form Nilai Mahasiswa</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nama Lengkap</label>  
  <div class="col-md-4">
  <input name="nama" type="text" placeholder="Masukan Nama ..." class="form-control input-md">
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="selectbasic">Mata Kuliah</label>
  <div class="col-md-4">
    <select id="selectbasic" name="matkul" class="form-control">
      <option value="">-- Pilih Mata Kuliah --</option>
      <option value="DDP">Dasar Dasar Pemrograman</option>
      <option value="BDI">Basis Data I</option>
      <option value="WEBI">Pemrograman Web I</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nilai UTS</label>  
  <div class="col-md-2">
  <input id="text" name="nilai_uts" type="text" placeholder="Masukan Nilai UTS...." size="6" class="form-control input-md">
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nilai UAS</label>  
  <div class="col-md-2">
  <input id="text" name="nilai_uas" type="text" placeholder="Masukan Nilai UAS...." size="10" class="form-control input-md-10" >
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="textinput">Nilai Tugas/Praktikum</label>  
  <div class="col-md-2">
  <input id="text" name="nilai_tugas" type="text" placeholder="Masukan Nilai Tugas...." size="6" class="form-control input-md">
  </div>
</div>
    <!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="singlebutton">Kirim Nilai Siswa</label>
  <div class="col-md-4">
    <button type="submit" class="btn btn-primary">Kirim</button>
  </div>
</div>
</div>



</fieldset>
</form>>
                   
                </div>
            </div>
<?php
include_once 'bottom.php'
;
?>