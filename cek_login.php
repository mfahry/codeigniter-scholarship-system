<?php
include "koneksi.php";
session_start();

function antiinjection($data){
  $filter_sql = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter_sql;
}

$username = antiinjection($_POST[username]);
$password     = (antiinjection($_POST[password]));


//$username = $_POST[username];
//$password = $_POST[password];

$login=mysql_query("SELECT * FROM admins WHERE username='$username' AND password= md5('$password')");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
if ($ketemu > 0){

    session_register("username");
    session_register("password");
    session_register("status");
	$_SESSION[username]   = $r[username];
	
	header('location:admin/homeadmin.php');

}
else{
  echo "<link href=../config/adminstyle.css rel=stylesheet type=text/css>";
  echo "<center>LOGIN GAGAL! <br> 
        Username atau Password Anda tidak benar.<br>
        Atau account Anda sedang diblokir.<br>";
  echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
}
?>
