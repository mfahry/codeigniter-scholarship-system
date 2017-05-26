<?php
 
session_start();
include "koneksi.php";

$nis = $_POST['nis'];
$password = $_POST['pass'];
$nama = $_POST['nama'];
$rata = $_POST['rata'];
$penghasilan = $_POST['hasil'];
$tang = $_POST['tang'];
$aka = $_POST['aka'];
$nonaka = $_POST['non'];

$queryCek = "select nis from siswa where nis = '$nis' ";
$hasil1 = mysql_query($queryCek);
$cek = mysql_num_rows($hasil1);

if ($cek == 0){
	$foto = $nis."_".$_FILES['url_foto'] ['name'];
	$url_raport = $nis."_".$_FILES['url_raport']['name'];
	$url_slip = $nis."_".$_FILES['url_slip']['name'];
	$url_kk = $nis."_".$_FILES['url_kk']['name'];
	$url_ktm = $nis."_".$_FILES['url_ktm']['name'];
	$url_sertifikat = $nis."_".$_FILES['url_sertifikat']['name'];
	$query = "insert into siswa(nis, password, nama, rataraport, penghasilan, tanggungan, prestasi, aktif, url_foto, url_raport, url_slip, url_kk, url_ktm, url_sertifikat) values ('$nis','$password', '$nama', '$rata', '$penghasilan', '$tang', '$aka', '$nonaka', '$foto', '$url_raport', '$url_slip', '$url_kk', '$url_ktm', '$url_sertifikat')";
	$hasil = mysql_query($query);
	if($hasil){
		if(substr($foto, strlen($foto)-4) == ".jpg"){
			move_uploaded_file($_FILES["url_foto"]["tmp_name"], "upload/foto/".$foto);
		}
		if(substr($url_raport, strlen($url_raport)-4) == ".jpg"){
			move_uploaded_file($_FILES["url_raport"]["tmp_name"], "upload/raport/".$url_raport);
		}
		if(substr($url_slip, strlen($url_slip)-4) == ".jpg"){
			move_uploaded_file($_FILES["url_slip"]["tmp_name"], "upload/slipgaji/".$url_slip);
		}
		if(substr($url_kk, strlen($url_kk)-4) == ".jpg"){
			move_uploaded_file($_FILES["url_kk"]["tmp_name"], "upload/kk/".$url_kk);
		}
		if(substr($url_ktm, strlen($url_ktm)-4) == ".jpg"){
			move_uploaded_file($_FILES["url_ktm"]["tmp_name"], "upload/ktm/".$url_ktm);
		}
		if(substr($url_sertifikat, strlen($url_sertifikat)-4) == ".jpg"){
			move_uploaded_file($_FILES["url_sertifikat"]["tmp_name"], "upload/sertifikat/".$url_sertifikat);
		}
		?>
		  <script language="javascript">
		    alert("Registered!");
		    document.location="daftar.php";
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