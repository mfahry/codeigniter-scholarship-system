<?php
 
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['pass'];
$nama = $_POST['nama'];


$queryCek = "select username from admins where username = '$username' ";
$hasil1 = mysql_query($queryCek);
$cek = mysql_num_rows($hasil1);

if ($cek == 0){
	$query = "insert into admins(username, password, nama) values ('$username','$password', '$nama')";
	$hasil = mysql_query($query);
	if($hasil){
		?>
		  <script language="javascript">
		    alert("Berhasil");
		    document.location="homeadmin.php?p=awal";
		  </script>
	  <?php 
	    }
} else {
    ?>
      <script language="javascript">
        alert("Username Exist!");
        document.location="daftar.php";
      </script>
    <?php
  }














 ?>