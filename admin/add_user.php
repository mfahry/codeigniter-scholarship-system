<?php
session_start();
include ".private/koneksi.php";
$keyword=$_GET['keyword'];	
$kolom=$_GET['kolom'];	
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
$username=$_POST['username'];
$password=$_POST['password'];
$nama=$_POST['nama'];
if(isset($_POST['insert_user'])){
	$sql="insert into user(username,password,nama) values('$username','$password','$nama')";

		$query=mysql_query($sql);
		if($query){
		echo "
		<table bgcolor='#00FFFF' cellspacing='2' cellpadding='2' align='center'>
			<tr id='row-style1'>
				<td>Username</td>
				<td>:</td>
				<td>".$username."</td>
			</tr>
			<tr id='row-style1'>
				<td>Nama</td>
				<td>:</td>
				<td>".$nama."</td>
			</tr>
			</table>

			";

			}					
}else{
	
?>
<p align="center">
<img style='border:none'  src='images/add.gif' /> Tambah User Aplikasi <hr /></p>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);" name="tambahuser" enctype="multipart/form-data">
<table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
  <tr>
    <td>Username</td>
    <td>:</td>
    <td>
		<input type="text" name="username" maxlength="50" >
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
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="insert_user" value="Tambah"></td>
  </tr>
</table>
</form>

<?php
}
?>
<p align="center">
<a href='?page=view_user&kolom=<?=$kolom?>&keyword=<?=$keyword?>'  class="hintanchor" onMouseover="showhint('Kembali ke Halaman User', this, event, '150px')"><img style='border:none'  src='images/back.png' width="35" height="35"></a>