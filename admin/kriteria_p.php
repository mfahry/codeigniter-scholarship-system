<?php
 
session_start();
include "koneksi.php";

$kode = $_POST['kode'];
$nama = $_POST['nmk'];
$keterangan = $_POST['kt'];
$maksimal = $_POST['max'];
$perbandingan = $_POST['per'];


$queryCek = "select kode_kriteria from kriteria where kode_kriteria = '$kode' ";
$hasil1 = mysql_query($queryCek);
$cek = mysql_num_rows($hasil1);

if ($cek == 0){
	$query = "insert into kriteria(kode_kriteria,nama_kriteria, keterangan, maksimal, perbandingan) values ('$kode','$nama', '$keterangan', '$maksimal', '$perbandingan')";
	$hasil = mysql_query($query);
	if($hasil){
		?>
		  <script language="javascript">
		    alert("Berhasil");
		    document.location="homeadmin.php?p=akhir";
		  </script>
	  <?php 
	    }
} else {
    ?>
      <script language="javascript">
        alert("Kriteria Exist!");
        document.location="homeadmin.php?p=akhir";
      </script>
    <?php
  }














 ?>