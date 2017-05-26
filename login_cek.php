<?php
 
// memulai session
session_start();
 
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
 
// query untuk mendapatkan record dari username
$query = "SELECT * FROM admins WHERE username = '$username' and password = md5('$password') ";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);
 
// cek kesesuaian password
if (md5($password) == $data['password'] && $username == $data['username']) 
{ ?>
	<script language script="JavaScript">alert('Anda login sebagai <?php echo $data['nama']?>');</script>
	<?php 
    // menyimpan username dan level ke dalam session
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
} ?>
<script language script="JavaScript">document.location='admin/homeadmin.php';</script>
<script language script="JavaScript">alert("Username/Password yang anda masukkan salah!");document.location='index.php';</script>
