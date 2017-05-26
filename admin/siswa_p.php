<?php
 
session_start();
include "koneksi.php";

$nis = $_POST['Nis'];
$nama = $_POST['nama'];
$rataraport = $_POST['rataraport'];
$penghasilan = $_POST['penghasilan'];
$tanggungan = $_POST['tanggungan'];
$prestasi = $_POST['prestasi'];
$aktif = $_POST['aktif'];


$queryCek = "select nis from siswa where nis = '$nis' ";
$hasil1 = mysql_query($queryCek);
$cek = mysql_num_rows($hasil1);

if ($cek == 0){
	$query = "insert into siswa(nis,nama, rataraport, penghasilan, tanggungan, prestasi, aktif) values ('$nis','$nama', '$rataraport', '$penghasilan', '$tanggungan', '$prestasi', '$aktif')";
	$hasil = mysql_query($query);
	if($hasil){
		?>
		  <script language="javascript">
		    alert("Berhasil");
		    document.location="homeadmin.php?p=siswa";
		  </script>
	  <?php 
	    }else{
			echo "<script language=\"javascript\">
			alert(\"Error!\");
			document.location=\"homeadmin.php?p=adds\";
		  </script>";
		}
} else {
    ?>
      <script language="javascript">
        alert("Beasiswa Exist!");
        document.location="homeadmin.php?p=siswa";
      </script>
    <?php
  }














 ?>