<?php
session_start();
error_reporting (E_ALL ^E_NOTICE);
include "koneksi.php";

?>
<link rel="stylesheet" type="text/css" href="css/table.css" />
<script type="text/javascript" src="javascripts/hint.js"></script>
<link rel="stylesheet" type="text/css" href="css/hint.css" />

<?php
$nis=$_SESSION['nis'];
$bea=$_GET['bea'];
$sql="insert into ambil(kode_ambil,nis,kode_beasiswa,status) values('','$nis','$bea','1')";
$query = mysql_query($sql);
if($query){
	echo "<h1 align='center'>Pendaftaran Beasiswa Berhasil <br> <br><hr>
	<a href='?p=in'><img src='images/back.png' width='35' height='35'></a></h1>
	";
}

?>