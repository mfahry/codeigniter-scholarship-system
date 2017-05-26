<?php
session_start();
include "koneksi.php";
$keyword=$_GET['keyword'];	
$kolom=$_GET['kolom'];	
$upd=$_GET['upd'];
?>


	
    
<?php
$username=$_POST['username'];
$password=$_POST['password'];
$nama=$_POST['nama'];
if(isset($_POST['update_admins'])){
	$sql="update admins set username='$username',password='$password',nama='$nama' where username='$upd'";
	$query=mysql_query($sql);
	if($query){
		echo("<p align='center'>Edit Data Berhasil <br> <br>");
	}
}else{
$query=mysql_query("select * from admins where username='$upd'");
$hasil=mysql_fetch_array($query);
if($hasil){

?>
<p align="center">
<img style='border:none'  src='images/edit.gif' /> Edit User Aplikasi<hr /></p>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);" enctype="multipart/form-data">
<table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
  <tr>
    <td>Username</td>
    <td>:</td>
    <td>
		<input type="text" name="username" maxlength="50" value="<?php echo $hasil['username']?>" >
    </td>
  </tr>
  <tr>
    <td>Password</td>
    <td>:</td>
    <td>
		<input type="password" name="password" maxlength="50" value="<?php echo $hasil['password']?>" >
    </td>
  </tr>
  <tr>
    <td>Nama Lengkap</td>
    <td>:</td>
    <td>
		<input type="text" name="nama" maxlength="50" value="<?php echo $hasil['nama']?>" >
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="update_user" value="Edit"></td>
  </tr>
</table>
</form>

<?php
	}
}
?>
<p align="center">
<a href='?page=view_user&kolom=<?=$kolom?>&keyword=<?=$keyword?>'  class="hintanchor" onMouseover="showhint('Kembali ke Halaman User', this, event, '150px')"><img style='border:none'  src='images/back.png' width="35" height="35"></a>