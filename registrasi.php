<?php
error_reporting (E_ALL^E_NOTICE);
session_start();
include "koneksi.php";
include "slices/header.php";


?>
<img src="images/title.jpg" width="1366">
 <li><a href="/coba/"><i class="icon-home"></i> Home</a></li>

	

<?php
$nis = $_POST['nis'];
$password = $_POST['password'];
$nama = $_POST['nama'];
$rataraport = $_POST['rataraport'];
$penghasilan = $_POST['penghasilan'];
$tanggungan = $_POST['tanggungan'];
$prestasi = $_POST['prestasi'];
$aktif = $_POST['aktif'];

$uploadfoto='images/foto/foto';
$url_foto=$uploadfoto.$nis.'.jpg'; 

$uploadraport='images/raport/raport';
$url_raport=$uploadraport.$nis.'.jpg'; 

$uploadslip='images/slip/slip';
$url_slip=$uploadslip.$nis.'.jpg'; 

$uploadkk='images/kk/kk';
$url_kk=$uploadkk.$nis.'.jpg'; 

$uploadktm='images/ktm/ktm';
$url_ktm=$uploadktm.$nis.'.jpg'; 

$uploadsertifikat='images/sertifikat/sertifikat';
$url_sertifikat=$uploadsertifikat.$nis.'.jpg'; 

$uploadakademik='images/akademik/akademik';
$url_akademik=$uploadakademik.$nis.'.jpg'; 

$uploadakademik1='images/akademik1/akademik1';
$url_akademik1=$uploadakademik1.$nis.'.jpg'; 

$uploadaktif='images/aktif/aktif';
$url_aktif=$uploadaktif.$nis.'.jpg'; 

$uploadaktif1='images/aktif1/aktif1';
$url_aktif1=$uploadaktif1.$nis.'.jpg';

$uploadaktif2='images/aktif2/aktif2';
$url_aktif2=$uploadaktif2.$nis.'.jpg';  


if(isset($_POST['insert'])){
	$sql="insert into siswa(nis,password,nama,rataraport,penghasilan,tanggungan,prestasi,aktif,url_foto,url_raport,url_slip,url_kk,url_ktm,url_sertifikat,url_akademik1,url_akademik2, url_aktif, url_aktif1, url_aktif2) values('$nis','$password','$nama','$rataraport','$penghasilan','$tanggungan', '$prestasi','$aktif','$url_foto','$url_raport','$url_slip','$url_kk','$url_ktm','$url_sertifikat','$url_akademik1','$url_akademik2', '$url_aktif', '$url_aktif1','$url_aktif2')";
		$query=mysql_query($sql);
		if($query){

		move_uploaded_file($_FILES["url_foto"]["tmp_name"],$url_foto);
		move_uploaded_file($_FILES["url_raport"]["tmp_name"],$url_raport);
		move_uploaded_file($_FILES["url_slip"]["tmp_name"],$url_slip);
		move_uploaded_file($_FILES["url_kk"]["tmp_name"],$url_kk);
		move_uploaded_file($_FILES["url_ktm"]["tmp_name"],$url_ktm);
		move_uploaded_file($_FILES["url_sertifikat"]["tmp_name"],$url_sertifikat);
		move_uploaded_file($_FILES["url_akademik"]["tmp_name"],$url_akademik);
		move_uploaded_file($_FILES["url_akademik1"]["tmp_name"],$url_akademik1);
		move_uploaded_file($_FILES["url_aktif"]["tmp_name"],$url_aktif);
		move_uploaded_file($_FILES["url_aktif1"]["tmp_name"],$url_aktif1);
		move_uploaded_file($_FILES["url_aktif2"]["tmp_name"],$url_aktif2);
		echo "
		
		<h1 align='center'> Pendaftaran Berhasil </h1>
		<table bgcolor='#00FFFF' cellspacing='2' cellpadding='2' align='center'>
			<tr id='row-style1'>
				<td>NIS</td>
				<td>:</td>
				<td>".$nis."</td>
			</tr>
			<tr id='row-style1'>
				<td>Nama Siswa</td>
				<td>:</td>
				<td>".$nama."</td>
			</tr>
			<tr id='row-style1'>
				<td>Rata Raport</td>
				<td>:</td>
				<td>".$rataraport."</td>
			</tr>
			<tr id='row-style1'>
				<td>Penghasilan Orang Tua</td>
				<td>:</td>
				<td>Rp ".$penghasilan."</td>
			</tr>
			<tr id='row-style1'>
				<td>Tanggungan Orang Tua</td>
				<td>:</td>
				<td>".$tanggungan."</td>
			</tr>
			<tr id='row-style1'>
				<td>Prestasi Akademik</td>
				<td>:</td>
				<td>".$prestasi."</td>
			</tr>
			<tr id='row-style1'>
				<td>Prestasi Non Akademik</td>
				<td>:</td>
				<td>".$aktif."</td>
			</tr>
			
			<tr id='row-style1'>
				<td colspan='3'>Silakan Login dengan nis dan password Anda</td>
			</tr>
			
			</table>

			";

			}else{
				echo "<p align='center'><font color='#FF0000'>Data Pernah Dimasukkan. 
				<br>Silakan hubungi Bagian Kemahasiswaan apabila anda merasa belum pernah mendaftar.</font></p>";
			}
}else{
	
?>


	<h1 align="center"> Pendaftaran Beasiswa <hr /></h1>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);" name="tambahuser" enctype="multipart/form-data">
<table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
  <tr>
    <td>NIS</td>
    <td>:</td>
    <td>
		<input type="number" name="nis" style="height:30px" maxlength="9" >
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
		<input type="password" name="password" maxlength="50" >
    </td>
  </tr>
  <tr>
    <td>Nama Lengkap</td>
    <td>:</td>
    <td>
		<input type="text" name="nama" maxlength="50" >
    </td>
  </tr>
  <tr>
    <td>Rata Raport (Semester 1-4)</td>
    <td>:</td>
    <td>
		<input type="number" name="rataraport" style="height:30px" maxlength="2" > <a href='#' </a>
    </td>
  </tr>
  <tr>
    <td>Penghasilan Orang Tua</td>
    <td>:</td>
    <td>
		Rp <input type="number" name="penghasilan" maxlength="50" style="height:30px" size="17" ><a href='#' </a>
    </td>
  </tr>
  <tr>
    <td>Tanggungan Orang Tua</td>
    <td>:</td>
    <td>
		<input type="number" name="tanggungan" style="height:30px" maxlength="50" ><a href='#' </a>
    </td>
  </tr>
  <tr>
    <td>Nilai Akademik</td>
    <td>:</td>
    <td>
    	<input type="number" max="3" style="height:30px" name="prestasi">
    </td>
  </tr>
  <tr>
    <td>Nilai Non Akademik</td>
    <td>:</td>
    <td>
		<input type="number" name="aktif" max="3" style="height:30px" ><a href='#' c</a>
    </td>
  </tr>
  <tr>
    <td>Upload Foto</td>
    <td>:</td>
    <td>
    <input name="url_foto" type="file" /><a href='#' </a>
    </td>
  </tr>
  <tr>
    <td>Upload Raport</td>
    <td>:</td>
    <td>
    <input name="url_raport" type="file" /><a href='#' </a>
    </td>
  </tr>
  <tr>
    <td>Upload Slip Gaji Orang Tua</td>
    <td>:</td>
    <td>
    <input name="url_slip" type="file" /><a href='#' </a>
    </td>
  </tr>
  <tr>
    <td>Upload Kartu Keluarga</td>
    <td>:</td>
    <td>
    <input name="url_kk" type="file" /><a href='#' </a>
    </td>
  </tr>
  <tr>
    <td>Upload Scan SKTM</td>
    <td>:</td>
    <td>
    <input name="url_ktm" type="file" /><a href='#' </a>
    </td>
  </tr>
  <tr>
  <td> Upload Sertifikat Akademik 1 </td>
  <td> : </td>
  <td><input type="file" name="url_sertifikat" type="file"></td>
  </tr>
   <tr>
  <td> Upload Sertifikat Akademik 2 </td>
  <td> : </td>
  <td><input type="file" name="url_akademik" type="file"></td>
  </tr>
   <tr>
  <td> Upload Sertifikat Akademik 3 </td>
  <td> : </td>
  <td><input type="file" name="url_akademik1" type="file"></td>
  </tr>

  <tr>   
<td> Upload Sertifikat Non Akademik 1 </td>
  <td> : </td>
  <td><input type="file" name="url_aktif" type="file"></td>
  </tr>
  <tr>   
<td> Upload Sertifikat Non Akademik 2 </td>
  <td> : </td>
  <td><input type="file" name="url_aktif1" type="file"></td>
  </tr>
  
  <tr>   
<td> Upload Sertifikat Non Akademik 3 </td>
  <td> : </td>
  <td><input type="file" name="url_aktif2" type="file"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="insert" value="Daftar"></td>
  </tr>
</table>
</form>

<?php
}
?>
