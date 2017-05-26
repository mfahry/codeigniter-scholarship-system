<?php
$p = $_GET['p'];
switch($p){
	case "awal" : include "view_admin.php"; break;
	case "akhir" : include "akhir.php"; break;
	case "beasiswa" : include "view_beasiswa.php"; break;
	case "siswa" : include "view_siswa.php"; break;
	case"tambah_admin" : include "add_admin.php"; break;
	case"edit" : include "edit_admin.php"; break;
	case"ambil" : include "ambil_beas.php"; break;
	case"viewb" : include "view_bobot.php"; break;
	case"editk" : include "edit_kriteria.php"; break;
	case"editb" : include "edit_beasiswa.php"; break;
	case"adds" : include "add_siswa.php"; break;
	case"addk" : include "add_kriteria.php"; break;
	case"addb" : include "add_bobot.php"; break;
	case"updb" : include "upd_bobot.php"; break;
	case"detail" : include "detail.php"; break;
	case"addbe" : include "add_beasiswa.php"; break;
	case"viewad" : include "view_admin.php"; break;
	case"editsis" : include "edit_siswa.php"; break;
	case"view" : include "siswa.php"; break;
}
?>