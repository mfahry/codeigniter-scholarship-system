<?php
 
session_start();
include "koneksi.php";

$kode = $_POST['kode'];
$nama = $_POST['nmb'];
$keterangan = $_POST['kt'];
$terima = $_POST['trm'];
$standar = $_POST['stan'];


$queryCek = "select kode_beasiswa from beasiswa where kode_beasiswa = '$kode' ";
$hasil1 = mysql_query($queryCek);
$cek = mysql_num_rows($hasil1);

if ($cek == 0){
	$query = "insert into beasiswa(kode_beasiswa,nama_beasiswa, keterangan, terima, standar) values ('$kode','$nama', '$keterangan', '$terima', '$standar')";
	$hasil = mysql_query($query);
	if($hasil){
		?>
		  <script language="javascript">
		    alert("Berhasil");
		    document.location="homeadmin.php?p=beasiswa";
		  </script>
	  <?php 
	    }
} else {
    ?>
      <script language="javascript">
        alert("Beasiswa Exist!");
        document.location="homeadmin.php?p=beasiswa";
      </script>
    <?php
  }














 ?>