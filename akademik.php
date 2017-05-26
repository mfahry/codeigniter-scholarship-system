<?php
error_reporting (E_ALL^E_NOTICE);

include "koneksi.php";


?>
<form>
<tr> <p align="center"> </p>
    <td>Upload Scan Sertifikat Akademik</td>
    <td>:</td>
    <td>
    <input name="url_akademik" type="file" /><br>
	<input name="url_akademik" type="file" /> <br>
	<input name="url_akademik" type="file" /> <br>
	<input name="url_akademik" type="file" /> <br>
	<input name="url_akademik" type="file" /> <br>
	<input name="url_akademik" type="file" /> <br>
    </td>
  </tr>
  <tr>
<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white" value="akademik"></i>Upload</button>
  </tr>
  </form>
  <?php
  session_start();
  $nis = $_SESSION['nis'];
  $url_akademik = $_POST ['url_akademik'];
  $uploadakademik='images/akademik/akademik';
  $url_akademik=$uploadakademik.$nis.'.jpg'; 

  if(isset($_POST['insert'])){
		$sql="insert into lampiran (nis, url) values ('$nis','$url')";
  $query=mysql_query($sql);
		if($query){
		move_uploaded_file($_FILES["url_akademik"]["tmp_name"],$url);
echo
"Berhasil";
}else{
echo "gagal";
}
}
?>
  
  