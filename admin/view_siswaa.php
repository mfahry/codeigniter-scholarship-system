<?php
include koneksi.php;
?>

<html>
<head><title></title>

	<body>
	
	<table border="1" align="center" width="90%">


	<tr>

	<?php


		$dataPerPage = 10;

		if(isset($_GET['page']))
		{
			$noPage = $_GET['page'];
		}
		else $noPage =1;

		$offset = ($noPage -1) * $dataPerPage;
		$query = "SELECT siswa.nis, siswa.nama, ambil.status, ranking.nilai FROM siswa, ambil, ranking WHERE siswa.nis = ambil.nis AND ranking.nis = ambil.nis
					AND siswa.nis = ranking.nis
					AND ambil.status =  'Diterima' LIMIT $offset, $dataPerPage";
		$result = mysql_query($query) or die ('Error');
		$no=1;	
		echo "<tr bgcolor=#0099CC><th>NO</th><th>NIS</th><th>NAMA SISWA</th><th>Status</th><th>Nilai</th><th>ACTION</th></tr>";

		while($data = mysql_fetch_array($result))
		{

			echo "
				<tr>
				<td>$no</td>
				<td>$data[nis]</td>
				<td>$data[nama]</td>
				<td>$data[status]</td>
				<td>$data[nilai]</td>";
			

			$no++;
		}

		echo "</table>";
		echo"<center>";
		$query = "select count(*) as nis from siswa";

		$hasil=mysql_query($query);
		$data=mysql_fetch_array($hasil);
		$jumData=$data['nis'];

		$jumPage = ceil($jumData/$dataPerPage);

		if($noPage >1) 
		echo "<center><a href='".$SERVER['PHP_SELF']."?page=".($noPage-1)."'>&lt;&lt; Prev</a>";

		for($page=1; $page<=$jumPage;$page++)
		{
			if((($page>=$noPage-3) && ($page <=$noPage+3)) || ($page==1) ||($page==$jumPage))
			{
				if(($showPage ==1)&&($page!=2)) echo "...";
				if(($showPage!=($jumPage-1))&& ($page==$jumPage)) echo "...";
				if($page==$noPage) echo "<b>".$page."</b> "; else echo "<a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a>";
				$showPage=$page;
			}
		}

		if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Next&gt;&gt;</a>";
?>


	<br><font size=2><center>[ <a href='cetak_data_siswa.php'>Cetak Data siswa</a> ] <br><br>


<body>
</html>

