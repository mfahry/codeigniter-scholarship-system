<?php
session_start();
include "koneksi.php";
$upd=$_SESSION['nis'];
?>
<link rel="stylesheet" type="text/css" href="css/table.css" />

<script type="text/javascript" src="javascripts/require.js"></script>
<script type="text/javascript" src="javascripts/hint.js"></script>
<link rel="stylesheet" type="text/css" href="css/hint.css" />

<link type="text/css" href="css/jquery-ui-1.8.9.custom.css" rel="Stylesheet" />	
<script type="text/javascript" src="javascripts/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="javascripts/jquery-ui-1.8.9.custom.min.js"></script>
<link type="text/css" href="css/user.css" rel="Stylesheet" />	

	<script>
	$(function() {

	$('.upload').hide();
	
	$("#hakakses").change(function () {
		if($(this).val()=="on") {
			$('.upload').show();
		} else {
			$('.upload').hide();
		}
	});
			
			$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat:'yy-mm-dd',
			yearRange:"-70:+0"
		});
		
	}
	)
	</script>
    
<?php
$nis = $_POST['nis'];
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
$url_kk=$uploadkk.$nim.'.jpg'; 

$uploadktm='images/ktm/ktm';
$url_ktm=$uploadktm.$nis.'.jpg'; 

$uploadsertifikat='images/sertifikat/sertifikat';
$url_sertifikat=$uploadsertifikat.$nis.'.jpg'; 

$uploadakademik1='images/akademik/akademik';
$url_akademik1=$uploadakademik1.$nis.'.jpg'; 

$uploadakademik2='images/akademik1/akademik1';
$url_akademik2=$uploadakademik2.$nis.'.jpg'; 

$uploadaktif='images/aktif/aktif';
$url_aktif=$uploadaktif.$nis.'.jpg'; 

$uploadaktif1='images/aktif1/aktif1';
$url_aktif1=$uploadaktif1.$nis.'.jpg';

$uploadaktif2='images/aktif2/aktif2';
$url_aktif2=$uploadaktif2.$nis.'.jpg';    




if(isset($_POST['update'])){
	$sql="update siswa set nis = '$nis', nama = '$nama', rataraport = '$rataraport', penghasilan = '$penghasilan', tanggungan = '$tanggungan', prestasi = '$prestasi', aktif = '$aktif' where nis='$upd'";
	$query=mysql_query($sql);
	if($query){
		move_uploaded_file($_FILES["url_foto"]["tmp_name"],$url_foto);
		move_uploaded_file($_FILES["url_raport"]["tmp_name"],$url_raport);
		move_uploaded_file($_FILES["url_slip"]["tmp_name"],$url_slip);
		move_uploaded_file($_FILES["url_kk"]["tmp_name"],$url_kk);
		move_uploaded_file($_FILES["url_ktm"]["tmp_name"],$url_ktm);
		move_uploaded_file($_FILES["url_sertifikat"]["tmp_name"],$url_sertifikat);
		move_uploaded_file($_FILES["url_akademik1"]["tmp_name"],$url_akademik1);
		move_uploaded_file($_FILES["url_akademik2"]["tmp_name"],$url_akademik2);
		move_uploaded_file($_FILES["url_aktif"]["tmp_name"],$url_aktif);
		move_uploaded_file($_FILES["url_aktif1"]["tmp_name"],$url_aktif1);
		move_uploaded_file($_FILES["url_aktif2"]["tmp_name"],$url_aktif2);
		echo("<h1 align='center'>Edit Data Berhasil <br> <br></h1>");
	}
}else{
$query=mysql_query("select * from siswa where nis='$upd'");
$hasil=mysql_fetch_array($query);
if($hasil){

?>
<h1 align="center">
<img style='border:none'  src='' /> Update Profil<hr /></h1>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);" enctype="multipart/form-data">
<table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
<input type="hidden" name="nis" maxlength="50" value="<?php echo $hasil['nis']?>" readonly="readonly" >
  <tr>
    <td>Nama Siswa</td>
    <td>:</td>
    <td>
		<input type="text" name="nama" maxlength="50" value="<?php echo $hasil['nama']?>"  >
    </td>
  </tr>
  <tr>
    <td>Rata Raport</td>
    <td>:</td>
    <td>
		<input type="number"  style="height:30px" name="rataraport" maxlength="50"  value="<?php echo $hasil['rataraport']?>" >
    </td>
  </tr>
  <tr>
    <td>Penghasilan Orang Tua</td>
    <td>:</td>
    <td>
		Rp <input type="number" style="height:30px" name="penghasilan" maxlength="50" size="17"   value="<?php echo $hasil['penghasilan']?>"  >
    </td>
  </tr>
  <tr>
    <td>Tanggungan Orang Tua</td>
    <td>:</td>
    <td>
		<input type="number" style="height:30px" name="tanggungan" maxlength="50" value="<?php echo $hasil['tanggungan']?>"  >
    </td>
  </tr>
  <tr>
    <td>Prestasi Akademik</td>
    <td>:</td>
    <td>
    	<input type="number" style="height:30px" max="3" name="prestasi" value="<?php echo $hasil['prestasi']?>" >
    </td>
  </tr>
  <tr>
    <td>Prestasi Non Akademik</td>
    <td>:</td>
    <td>
		<input type="number" style="height:30px" max="3" name="aktif" maxlength="50"  value="<?php echo $hasil['aktif']?>"  >
    </td>
  </tr>
  <tr>
    <td>Upload Foto</td>
    <td>:</td>
    <td>
    <input name="url_foto" type="file" />
    </td>
  </tr>
  <tr>
    <td>Upload Raport</td>
    <td>:</td>
    <td>
    <input name="url_raport" type="file" />
    </td>
  </tr>
  <tr>
    <td>Upload Slip Gaji Orang Tua</td>
    <td>:</td>
    <td>
    <input name="url_slip" type="file" />
    </td>
  </tr>
  <tr>
    <td>Upload Kartu Keluarga</td>
    <td>:</td>
    <td>
    <input name="url_kk" type="file" />
    </td>
  </tr>
  <tr>
    <td>Upload Scan SKTM</td>
    <td>:</td>
    <td>
    <input name="url_ktm" type="file" />
    </td>
  </tr>
  <tr>
    <td>Upload Scan Sertifikat Akademik1</td>
    <td>:</td>
    <td>
    <input type="file" name="url_sertifikat" />
    </td>
  </tr>
  
  <tr>
    <td>Upload Scan Sertifikat Akademik 2</td>
    <td>:</td>
    <td>
    <input type="file" name="url_akademik1" />
    </td>
  </tr>
  
  <tr>
    <td>Upload Scan Sertifikat Akademik 3</td>
    <td>:</td>
    <td>
    <input type="file" name="url_akademik2" />
    </td>
  </tr>
  
  <tr>
    <td>Upload Scan Sertifikat Non Akademik 1</td>
    <td>:</td>
    <td>
    <input type="file" name="url_aktif" />
    </td>
  </tr>

   <tr>
    <td>Upload Scan Sertifikat Non Akademik 2</td>
    <td>:</td>
    <td>
    <input type="file" name="url_aktif1" />
    </td>
  </tr>
  
   <tr>
    <td>Upload Scan Sertifikat Non Akademik 2</td>
    <td>:</td>
    <td>
    <input type="file" name="url_aktif2" />
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="update" value="Edit"></td>
  </tr>
</table>
</form>

<?php
	}
}
?>
