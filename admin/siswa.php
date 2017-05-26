<?php
include "koneksi.php";

if(isset($_POST['jumlah_2'])){
	//mysql_query("update ambil set status=status+1, keterangan='Diterima' where nis = '".$row['nis']."' and kode_beasiswa='$beasiswa' ");
	$baaaa = mysql_query("SELECT * FROM ranking ORDER BY nilai DESC limit 0,".$_POST['jumlah_2']."");
	if($baaaa === FALSE) {
		die(mysql_error()); // TODO: better error handling
	}
	while($bu = mysql_fetch_array($baaaa)){
		mysql_query("update ambil set status=status+1, keterangan='Diterima' where nis = '".$bu['nis']."' and kode_beasiswa='11' ");
	}
}
?>

<script type="text/javascript">
function printDiv(divName) {
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}

</script>

<html>
<div id="printtableArea">
<head><title></title>
<!--<h1> <p align="center" > SEKOLAH MENENGAH ATAS NEGERI 1 DAYEUHKOLOT </p> </h1> 
<h4> <p align="center" > Jalan Sukapura No.99, Kabupaten Bandung, 022 8752138 </h4> <br>
<h4> <p align="center"> Hasil Penyeleksian Beasiswa </h4>-->

<center><img src="../images/kopsurat.jpg" /></center>
<h4> <p align="center"> Hasil Penyeleksian Beasiswa Berprestasi </h4>
	<body>
	
<table class="table table-bordered table-hover" style="width:600px" align="center">


	<?php


		$dataPerPage = 20;

		if(isset($_GET['page']))
		{
			$noPage = $_GET['page'];
		}
		else $noPage =1;

		$offset = ($noPage -1) * $dataPerPage;
		$query = "SELECT siswa.nis, siswa.nama, ambil.keterangan
					FROM siswa, ambil
					WHERE siswa.nis = ambil.nis
					AND ambil.keterangan ='Diterima'  LIMIT $offset, $dataPerPage";
		$result = mysql_query($query) or die ('Error');
		$no=1;	
		echo "<tr><th>No</th><th>Nis</th><th>Nama Siswa</th><th>Status</th></tr>";

		while($data = mysql_fetch_array($result))
		{

			echo "
				<tr>
				<td>$no</td>
				<td>$data[nis]</td>
				<td>$data[nama]</td>
				<td>$data[keterangan]</td>
				";
			

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

		/*for($page=1; $page<=$jumPage;$page++)
		{
			if((($page>=$noPage-3) && ($page <=$noPage+3)) || ($page==1) ||($page==$jumPage))
			{
				if(($showPage ==1)&&($page!=2)) echo "...";
				if(($showPage!=($jumPage-1))&& ($page==$jumPage)) echo "...";
				if($page==$noPage) echo "<b>".$page."</b> "; else echo "<a href='".$_SERVER['PHP_SELF']."?page=".$page."'>".$page."</a>";
				$showPage=$page;
			}
		}

		if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?page=".($noPage+1)."'>Next&gt;&gt;</a>";*/
?>

</div>
	<p align="center"><input type="button" onclick="printDiv('printtableArea')" value="Print Hasil Seleksi"/> </p>

<body>
</html>

