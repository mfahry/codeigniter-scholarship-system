<?php
error_reporting (E_ALL^E_NOTICE);

$p = $_GET['p'];
switch($p){
	case "lhp" : include "lihatprofil.php"; break;
	case "in"	: include "informasi.php"; break;
	case "bea"	: include "beasiswaku.php"; break;
	case "daftar" : include "daftarbeasiswa.php"; break;
	case "ubah" : include "ubahdata.php"; break;
	case "reg" : include "registrasi.php"; break;
	case "aka"	: include"tes.php"; break;
}
?>