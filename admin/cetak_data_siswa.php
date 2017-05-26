<?php
include ("koneksi.php");
?>
<?php
header("application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=cetak_data_siswa.xls");
?>

	<body>

	<font size="4" face="Verdana" align="center"><b>Hasil Seleksi Beasiswa</font><br><br>
	<table border="1" align="center" width="90%">
	<caption>DATA SISWA</caption>
	<tr>
	<th>NO</th><th>NIS</th><th>NAMA </th><th>Status</th><th>Nilai</th>
	</tr>

	<?php
	$query ="SELECT siswa.nis, siswa.nama, ambil.status, ranking.nilai FROM siswa, ambil, ranking WHERE siswa.nis = ambil.nis AND ranking.nis = ambil.nis
					AND siswa.nis = ranking.nis
					AND ambil.status =  'Diterima' order by ranking.nilai desc" ;
	$result = mysql_query($query);
	$no=1;

	
	while ($baris = mysql_fetch_array ($result))  {
		echo "<tr><td align='center'>$no</td>";
		echo "
			<td align='center'>$baris[nis]</td>
				  <td>$baris[nama]</td>
				  <td>$baris[status]</td>
				  <td>$baris[nilai]</td>
				</tr>";
				  $no++;
	}
	echo "</table>";
	?>

	</body>
	</html>
