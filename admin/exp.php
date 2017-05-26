<?
session_start();
include "koneksi.php";
?>
	
	<tr>
	<table class="table-bordered table-hover" style='width:100px'>
	<th> No </th>
	<th> Nama </th>
	<th> Status </th>
	</tr>
	
	</table>

<?
SELECT siswa.nis, siswa.nama, ambil.status
FROM siswa, ambil
WHERE siswa.nis = ambil.nis
AND ambil.status =  'Diterima'
?>
