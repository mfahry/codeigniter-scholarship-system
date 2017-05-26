 <?php
 error_reporting (E_ALL^E_NOTICE);

include "koneksi.php";

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