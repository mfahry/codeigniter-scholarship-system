

<script type="text/javascript">
function printDiv(divName) {
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;
	document.body.innerHTML = printContents;
	window.print();
	document.body.innerHTML = originalContents;
}

</script>
<?
session_start();
include "koneksi.php";

function tabelnilai($beasiswa){

?>

<table class="table table-bordered table-hover" style="width:900px" align="center">
<tr>
	<th colspan="8">
    	<p align='center'><font color="#000000">Tabel Nilai Alternatif</font></p>
    </td>
</tr>

<tr>
	<th align="center">No
    </th>
	<th><p align="center">Nis</p>
    </th>
	<th align="center">Nama siswa
    </th>
	<th align="center"> Rata Raport
	</th>
	<th align="center" style="width:150px"> Penghasilan
	</th>
	<th align="center"> Tanggungan </th>
	<th align="center"> Nilai Akademik </th>
	<th align="center"> Nilai Non Akademik </th>
	
   
</tr>
<?
	$no = 1;
	$sql = "select * from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis";

	$retval = mysql_query($sql);
	while($row = mysql_fetch_array($retval)){
		echo " <tr ";
		if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
		echo ">
			<td align='center'>".$no."</td>
			<td>".$row['nis']."</td>
			<td>".$row['nama']."</td>";
			
			$sbobot = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and bobot.kode_beasiswa = '$beasiswa'";
			$qbobot = mysql_query($sbobot);
			while($rbobot=mysql_fetch_array($qbobot)){
				if($rbobot['nama_kriteria']=="rataraport"){
					echo "<td>".$row['rataraport']."</td>";
				}
				if($rbobot['nama_kriteria']=="penghasilan"){
					echo "<td><p align='center'>Rp " . number_format($row[penghasilan],2,',','.');
					echo "</p></td>";
				}
				if($rbobot['nama_kriteria']=="prestasi"){
					echo "<td><p align='center'>".$row['prestasi']."</p></td>";
				}
				if($rbobot['nama_kriteria']=="tanggungan"){
					echo "<td>".$row['tanggungan']."</td>";
				}
				if($rbobot['nama_kriteria']=="aktif"){
					echo "<td>".$row['aktif']."</td>";
				}
			}
			
		echo "</tr>";
		$no++;
	}
	
?>
</table>    
<?
}


function konversi($beasiswa){
/*
?>

<table class="table table-bordered table-hover" style="width:600px" align="center">
<tr>
	<th colspan="8" align="center">
    	<p align="center"><font color="#000000">Tabel Nilai Alternatif - Konversi</font> </p>
    </td>
</tr>

<tr>
	<th align="center">No
    </td>
	<th align="center">Nis
    </td>
	<th align="center">Nama siswa
    </td>
    <?
		$sbobot = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and bobot.kode_beasiswa = '$beasiswa'";
		$qbobot = mysql_query($sbobot);
		while($rbobot=mysql_fetch_array($qbobot)){
			echo	"<th align='center'>$rbobot[nama_kriteria]</td>";
		}
	?>
</tr>

<?
/*
	$no = 1;
	$sql = "select * from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis ";

	$retval = mysql_query($sql);
	while($row = mysql_fetch_array($retval)){
		echo " <tr ";
		if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
		echo ">
			<td align='center'>".$no."</td>
			<td>".$row['nis']."</td>
			<td>".$row['nama']."</td>";
			
			$sbobot = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and bobot.kode_beasiswa = '$beasiswa'";
			$qbobot = mysql_query($sbobot);
			while($rbobot=mysql_fetch_array($qbobot)){
				if($rbobot['nama_kriteria']=="rataraport"){
					if($rbobot['perbandingan']=="Linear"){	
						$rataraport = ($row['rataraport']/$rbobot['maksimal'])*100;	
					}else{
						$rataraport = ($rbobot['maksimal']/$row['rataraport'])*100;
					}
					echo "<td>".$rataraport."</td>";
				}
				if($rbobot['nama_kriteria']=="penghasilan"){
					if($rbobot['perbandingan']=="Terbalik"){	
						$penghasilan = ($row['penghasilan']/$rbobot['maksimal'])*100;
					}else{
						$penghasilan = ($rbobot['maksimal']/$row['penghasilan'])*100;
					}
					echo "<td>".$penghasilan."</td>";
				}
				if($rbobot['nama_kriteria']=="prestasi"){
					if($rbobot['perbandingan']=="Linear"){	
						$prestasi = ($row['prestasi']/$rbobot['maksimal'])*100;
					}else{
						$prestasi = ($rbobot['maksimal']/$row['prestasi'])*100;
					}
					echo "<td>".$prestasi."</td>";
				}
				if($rbobot['nama_kriteria']=="tanggungan"){
					if($rbobot['perbandingan']=="Linear"){	
						$tanggungan = ($row['tanggungan']/$rbobot['maksimal'])*100;
					}else{
						$tanggungan = ($rbobot['maksimal']/$row['tanggungan'])*100;
					}
					echo "<td>".$tanggungan."</td>";
				}
				if($rbobot['nama_kriteria']=="aktif"){
					if($rbobot['perbandingan']=="Linear"){	
						$tanggungan = ($row['aktif']/$rbobot['maksimal'])*100;
					}else{
						$tanggungan = ($rbobot['maksimal']/$row['aktif'])*100;
					}
					echo "<td>".$tanggungan."</td>";;
				}
			}
			
		echo "</tr>";
		$no++;
	}
	*/
?>

</table>    
<?
}

function normalisasi($beasiswa){

$smhs = "select count(siswa.nis) 'jumlah' from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' ";
$qmhs = mysql_query($smhs);
$rmhs = mysql_fetch_array($qmhs);
$total = $rmhs['jumlah']+1;

?>
<table class="table table-bordered table-hover" style="width:400px" align="center">
<tr>
	<th colspan="8" align="center">
    	<p align="center"><font color="#000000">Matriks Nilai - Normalisasi</font> </p>
    </td>
</tr>

<tr>
	<td rowspan="<? echo $total; ?>"><br><br><br><br><br><br><>R =
    </td>
</tr>
<?
	$no = 1;
	$sql = "select * from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis ";

	$retval = mysql_query($sql);
	$smax = "select max(rataraport) 'rataraport',min(penghasilan) 'penghasilan', max(tanggungan) 'tanggungan',max(prestasi) 'prestasi', max(aktif) 'aktif' from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis ";
	
	$qmax = mysql_query($smax);
	$rmax = mysql_fetch_array($qmax);
	$maxrataraport= $rmax['rataraport'];
	$maxpenghasilan = $rmax['penghasilan'];
	$maxtanggungan = $rmax['tanggungan'];
	$maxprestasi = $rmax['prestasi'];
	$maxaktif = $rmax['aktif'];
	
	while($row = mysql_fetch_array($retval)){
		echo " <tr>";
			
			$sbobot = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and bobot.kode_beasiswa = '$beasiswa' ";
			$qbobot = mysql_query($sbobot);
			while($rbobot=mysql_fetch_array($qbobot)){
					
				if($rbobot['nama_kriteria']=="rataraport"){
					$perbandinganrataraport = ($maxrataraport/$rbobot['maksimal']);
					$rataraport = ($row['rataraport']/$rbobot['maksimal']);
					$normrataraport = $rataraport / $perbandinganrataraport;
					$normrataraport = substr($normrataraport,0,4);
					
					echo "<td>".$normrataraport."</td>";
				}
				if($rbobot['nama_kriteria']=="penghasilan"){
					$perbandinganpenghasilan = ($rbobot['maksimal']/$maxpenghasilan); 
					$penghasilan = ($rbobot['maksimal']/$row['penghasilan']);
					$normpenghasilan = $penghasilan / $perbandinganpenghasilan;
					$normpenghasilan = substr($normpenghasilan,0,4);
					echo "<td>".$normpenghasilan."</td>";
				}
				if($rbobot['nama_kriteria']=="tanggungan"){
					$perbandingantanggungan = ($maxtanggungan/$rbobot['maksimal']);
					$tanggungan = ($row['tanggungan']/$rbobot['maksimal']);
					if($perbandingantanggungan==0){
						$normtanggungan = 0;	
					}else{
						$normtanggungan = $tanggungan / $perbandingantanggungan;
						$normtanggungan = substr($normtanggungan,0,4);
					}
					echo "<td>".$normtanggungan."</td>";
				}
				if($rbobot['nama_kriteria']=="prestasi"){
					$perbandinganprestasi = ($maxprestasi/$rbobot['maksimal']);
					$prestasi = ($row['prestasi']/$rbobot['maksimal']);
					if($perbandinganprestasi==0){
						$normprestasi = 0;						
					}else{
						$normprestasi = $prestasi / $perbandinganprestasi;
						$normprestasi = substr($normprestasi,0,4);
					}
					echo "<td>".$normprestasi."</td>";
				
				
					
				}
				if($rbobot['nama_kriteria']=="aktif"){
					$perbandinganaktif = ($maxaktif/$rbobot['maksimal']);
					$aktif = ($row['aktif']/$rbobot['maksimal']);
					if($perbandinganaktif==0){
						$normaktif = 0;	
					}else{
						$normaktif = $aktif / $perbandinganaktif;
						$normaktif = substr($normaktif,0,4);
					}
					echo "<td>".$normaktif."</td>";
				}
			}
			
		echo "</tr>";
		$no++;
	}
	
?>
</table>  
<?
	
}

function bobot($beasiswa){
	
?>
	<table class="table table-bordered table-hover" style="width:200px" align="center">
<tr>
	<th align="center" colspan='2'>
    	<p align="center"><font color="000000">Matrix Bobot</font> </p>
    </th>
</tr>

<tr>
	<td align="justify" rowspan='6'><br><br><br><br>W =
    </td>
</tr>
    <?
		$sbobot = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and bobot.kode_beasiswa = '$beasiswa'";
		$qbobot = mysql_query($sbobot);
		while($rbobot=mysql_fetch_array($qbobot)){
			$persentase = $rbobot['persentase']/100;
			echo	"
				<tr>
					<td align='center'>$persentase</td>
				</tr>
			";
		}
	?>
</table>
<?
}

function saw($beasiswa){

?>
<table class="table table-bordered table-hover" align="justify">
<tr>
	<th colspan="8" align="center">
    <p align="center">	<font color="#000000">Hasil Akhir SAW </p></font>
    </td>
</tr>

<tr>
	<th align="center">No
    </td>
	<th align="center">Nis
    </td>
	<th align="center">Nama siswa
    </td>
    <th align="center">Perhitungan
    </td>
    <th align="center">Total
    </td>    
</tr>
<?
	$no = 1;
	$sql = "select * from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis ";

	$retval = mysql_query($sql);
	
	$smax = "select max(rataraport) 'rataraport',min(penghasilan) 'penghasilan', max(tanggungan) 'tanggungan',max(prestasi) 'prestasi', max(aktif) 'aktif' from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis ";
	$qmax = mysql_query($smax);
	$rmax = mysql_fetch_array($qmax);
	$maxrataraport= $rmax['rataraport'];
	$maxpenghasilan = $rmax['penghasilan'];
	$maxtanggungan = $rmax['tanggungan'];
	$maxprestasi = $rmax['prestasi'];
	$maxaktif = $rmax['aktif'];
	
	while($row = mysql_fetch_array($retval)){
		echo " <tr ";
		if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
		echo ">
			<td align='center'>".$no."</td>
			<td>".$row['nis']."</td>
			<td>".$row['nama']."</td>";
			
			$sbobot = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and bobot.kode_beasiswa = '$beasiswa' ";
			$qbobot = mysql_query($sbobot);
			while($rbobot=mysql_fetch_array($qbobot)){
					
				if($rbobot['nama_kriteria']=="rataraport"){
					$perbandinganrataraport = ($maxrataraport/$rbobot['maksimal'])*100;
					$rataraport = ($row['rataraport']/$rbobot['maksimal'])*100;
					$normrataraport = $rataraport / $perbandinganrataraport;
					$normrataraport = substr($normrataraport,0,4);
					$bobotrataraport = $rbobot['persentase']/100;				
				}
				if($rbobot['nama_kriteria']=="penghasilan"){
					$perbandinganpenghasilan = ($rbobot['maksimal']/$maxpenghasilan)*100; 
					$penghasilan = ($rbobot['maksimal']/$row['penghasilan'])*100;
					$normpenghasilan = $penghasilan / $perbandinganpenghasilan;
					$normpenghasilan = substr($normpenghasilan,0,4);
					$bobotpenghasilan = $rbobot['persentase']/100;
				}
				if($rbobot['nama_kriteria']=="tanggungan"){
					$perbandingantanggungan = ($maxtanggungan/$rbobot['maksimal'])*100;
					$tanggungan = ($row['tanggungan']/$rbobot['maksimal'])*100;
					if($perbandingantanggungan==0){
						$normtanggungan = 0;	
					}else{
						$normtanggungan = $tanggungan / $perbandingantanggungan;
						$normtanggungan = substr($normtanggungan,0,4);
					}
					$bobottanggungan= $rbobot['persentase']/100;
				}
				if($rbobot['nama_kriteria']=="prestasi"){
					$perbandinganprestasi = ($maxprestasi/$rbobot['maksimal'])*100;
					$prestasi = ($row['prestasi']/$rbobot['maksimal'])*100;
					if($perbandinganprestasi==0){
						$normprestasi = 0;						
					}else{
						$normprestasi = $prestasi / $perbandinganprestasi;
						$normprestasi = substr($normprestasi,0,4);
					}
					$bobotprestasi = $rbobot['persentase']/100;
				}
				
				if($rbobot['nama_kriteria']=="aktif"){
					$perbandinganaktif = ($maxaktif/$rbobot['maksimal'])*100;
					$aktif = ($row['aktif']/$rbobot['maksimal'])*100;
					if($perbandinganaktif==0){
						$normaktif = 0;	
					}else{
						$normaktif = $aktif / $perbandinganaktif;
						$normaktif = substr($normaktif,0,4);
					}
					$bobotaktif= $rbobot['persentase']/100;
				}
								
			}
		$total = ($bobotrataraport * $normrataraport) + ($bobotaktif * $normaktif) + ($bobotpenghasilan * $normpenghasilan) + ($bobotprestasi * $normprestasi) + ($bobottanggungan * $normtanggungan)  ;
		
		if($bobotrataraport!=""){
			$tampilrataraport=	"($bobotrataraport x $normrataraport)";
		}
		
		if($bobotaktif!=""){
			if($bobotrataraport!=""){
				$tampilaktif= " + ($bobotaktif x $normaktif)";			
			}else{
				$tampilaktif = "($bobotaktif x $normaktif)";
			}
		}
		
		if($bobotpenghasilan!=""){
			if($bobotrataraport!=""){
				$tampilpenghasilan = " + ($bobotpenghasilan x $normpenghasilan)";			
			}else{
				if($bobotaktif!=""){
					$tampilpenghasilan = " + ($bobotpenghasilan x $normpenghasilan)";								
				}else{
					$tampilpenghasilan = "($bobotpenghasilan x $normpenghasilan)";
				}
			}
		}
		
		if($bobotprestasi!=""){
			if($bobotrataraport!=""){
				$tampilprestasi = " + ($bobotprestasi x $normprestasi)";		
			}else{
				if($bobotaktif!=""){
					$tampilprestasi = " + ($bobotprestasi x $normprestasi)";					
				}else{
					if($bobotpenghasilan!=""){
						$tampilprestasi = " + ($bobotprestasi x $normprestasi)";		
					}else{
						$tampilprestasi = "($bobotprestasi x $normprestasi)";				
					}
				}
			}
		}
		if($bobottanggungan!=""){
			if($bobotrataraport!=""){
				$tampiltanggungan = " + ($bobottanggungan x $normtanggungan)";
			}else{
				if($bobotaktif!=""){
					$tampiltanggungan = " + ($bobottanggungan x $normtanggungan)";					
				}else{					
					if($bobotpenghasilan!=""){
						$tampiltanggungan = " + ($bobottanggungan x $normtanggungan)";
					}else{
						if($bobotprestasi!=""){
							$tampiltanggungan = " + ($bobottanggungan x $normtanggungan)";
						}else{
							$tampiltanggungan = "($bobottanggungan x $normtanggungan)";	
						}
					}	
				}
			}
		}
		
		echo "<td> $tampilrataraport $tampilaktif $tampilpenghasilan $tampilprestasi $tampiltanggungan</td>";
		echo "<td>$total </td>";
		
		echo "</tr>";
		$no++;
	}
	
?>
</table>  
<?
}

function inputranking($beasiswa){
	$delete = "delete from ranking";
	mysql_query($delete);

	$sql = "select * from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis ";

	$retval = mysql_query($sql);
	
	$smax = "select max(rataraport) 'rataraport',min(penghasilan) 'penghasilan', max(tanggungan) 'tanggungan',max(prestasi) 'prestasi', max(aktif) 'aktif' from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa and beasiswa.kode_beasiswa = '$beasiswa' order by siswa.nis ";
	$qmax = mysql_query($smax);
	$rmax = mysql_fetch_array($qmax);
	$maxrataraport= $rmax['rataraport'];
	$maxpenghasilan = $rmax['penghasilan'];
	$maxtanggungan = $rmax['tanggungan'];
	$maxprestasi = $rmax['prestasi'];
	$maxaktif = $rmax['aktif'];
	
	while($row = mysql_fetch_array($retval)){
		$nis = $row['nis'];
			
			$sbobot = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and bobot.kode_beasiswa = '$beasiswa'";
			$qbobot = mysql_query($sbobot);
			while($rbobot=mysql_fetch_array($qbobot)){
					
				if($rbobot['nama_kriteria']=="rataraport"){
					$perbandinganrataraport = ($maxrataraport/$rbobot['maksimal'])*100;
					$rataraport = ($row['rataraport']/$rbobot['maksimal'])*100;
					$normrataraport = $rataraport / $perbandinganrataraport;
					$normrataraport = substr($normrataraport,0,4);
					$bobotrataraport = $rbobot['persentase']/100;				
				}
				if($rbobot['nama_kriteria']=="penghasilan"){
					$perbandinganpenghasilan = ($rbobot['maksimal']/$maxpenghasilan)*100; 
					$penghasilan = ($rbobot['maksimal']/$row['penghasilan'])*100;
					$normpenghasilan = $penghasilan / $perbandinganpenghasilan;
					$normpenghasilan = substr($normpenghasilan,0,4);
					$bobotpenghasilan = $rbobot['persentase']/100;
				}
				if($rbobot['nama_kriteria']=="prestasi"){
					$perbandinganprestasi = ($maxprestasi/$rbobot['maksimal'])*100;
					$prestasi = ($row['prestasi']/$rbobot['maksimal'])*100;
					if($perbandinganprestasi==0){
						$normprestasi = 0;						
					}else{
						$normprestasi = $prestasi / $perbandinganprestasi;
						$normprestasi = substr($normprestasi,0,4);
					}
					$bobotprestasi = $rbobot['persentase']/100;
				}
				if($rbobot['nama_kriteria']=="tanggungan"){
					$perbandingantanggungan = ($maxtanggungan/$rbobot['maksimal'])*100;
					$tanggungan = ($row['tanggungan']/$rbobot['maksimal'])*100;
					if($perbandingantanggungan==0){
						$normtanggungan = 0;	
					}else{
						$normtanggungan = $tanggungan / $perbandingantanggungan;
						$normtanggungan = substr($normtanggungan,0,4);
					}
					$bobottanggungan=$rbobot['persentase']/100;
				}
				if($rbobot['nama_kriteria']=="aktif"){
					$perbandinganaktif = ($maxaktif/$rbobot['maksimal'])*100;
					$aktif = ($row['aktif']/$rbobot['maksimal'])*100;
					if($perbandinganaktif==0){
						$normaktif = 0;	
					}else{
						$normaktif = $aktif / $perbandinganaktif;
						$normaktif = substr($normaktif,0,4);
					}
					$bobotaktif= $rbobot['persentase']/100;
				}
									
			}
		$total = ($bobotrataraport * $normrataraport) + ($bobotpenghasilan * $normpenghasilan) + ($bobotprestasi * $normprestasi) + ($bobottanggungan * $normtanggungan) + ($bobotaktif * $normaktif) ;
		$insert = "insert into ranking(nis,nilai) values('$nis','$total')";
		mysql_query($insert);
		
	}
	/* -iput- ..
	$set = "5";
		$jml = $_POST['jumlah'];
		$nis = $_POST['nis'];
		$status = array("Diterima","Ditolak");
		if ($jml<=$set){
		   $sql2 = "update ambil set status='Diterima' where nis='$nis' ";
		   mysql_query($sql2);   
	    }
		else{
		   $sql2 = "update ambil set status='Ditolak'"; 
		   mysql_query($sql2);
		}
	
	echo "$jml";
	-iput- .*/
}

function ranking($beasiswa,$jumlah, $min_bound_value){

?>
 
<div id="printtableArea">
<table class="table table-bordered table-hover" style="width:400px" align="center">
<tr>
	<th colspan="8" align="center">
    	<p align ="center"><font color="000000">Hasil Penyeleksian Beasiswa</font></p>
    </td>
</tr>

<tr>
	<th align="center">No
    </td>
	<th align="center">Nis
    </td>
	<th align="center">Nama siswa
    </td>
	<th align="center"> Total Nilai 
    </td>
	<th align="center">Status
    </td>
	<th> Rekomendasi </th>
	</td>

	
	
</tr>
<?
	$no = 1;
	$sql = "select * from siswa,ranking where siswa.nis = ranking.nis order by nilai desc ";
	$sum_recomend = 0;
	$retval = mysql_query($sql);
	while($row = mysql_fetch_array($retval)){
		if ($min_bound_value <=$row['nilai']){
			echo " <tr ";
			if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
			echo ">
				<td align='center'>".$no."</td>
				<td>".$row['nis']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['nilai']."</td>
				<td>Diterima</td>
				<td>-</td>";
			echo "</tr>";

			/*-iput- Ini Tambahan-nya 
			$s = "update ambil set status=status+1, keterangan='Diterima' where nis = '".$row['nis']."' and kode_beasiswa='$beasiswa' ";
			$q = mysql_query($s);
			$a = "update siswa set status=status+1 where nis = '".$row['nis']."'  ";
			$b= mysql_query($a);
			/*-iput- Sampai sini*/
			$sum_recomend++;
					
		}

		
		else{
			echo " <tr ";
			if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
			echo ">
				<td align='center'>".$no."</td>
				<td>".$row['nis']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['nilai']."</td>
				<td><font color='#FF0000'>Ditolak</td>
				<td>";
				$nilai = $row['nilai'];
				$sbea = "select * from beasiswa where standar < $nilai and kode_beasiswa!= '$beasiswa'";
				$qbea = mysql_query($sbea);
				while ($rbea = mysql_fetch_array($qbea)){
					echo " ".$rbea['nama_beasiswa']."  ";	
				}
				echo " </td>";
			echo "</tr>";
			/*-iput- Ini Tambahan-nya*/
			$s = "update ambil set status='Ditolak' where nis = '".$row['nis']."' and kode_beasiswa='$beasiswa' ";
			$q = mysql_query($s);
			/*-iput- Sampai sini*/
		}
		
		$no++;
	}
echo "<tr";
	if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}

echo " <tr>
		<td colspan='6' align='center'><a href='?p=detail&beasiswa=$beasiswa&jumlah=$jumlah&min-bound-value=$min_bound_value'>Detail</a></td> 	
	</tr> ";
	echo "
		<!--<td colspan='6' align='center'><a href='?p=view'>Accept</a></td>-->
		<td colspan='6' align='center'>
			<form method='POST' action='?p=view'>
				<input type='hidden' name='jumlah_2' value='$jumlah' />
				<input type=submit value='Accept'/>
			</form>
		</td>
	</tr> ";


?>
</table>

<center><h5>Jumlah rekomendasi penerima beasiswa : <?php echo $sum_recomend; ?></h5></center>

<?
}

function rankingdetail($beasiswa,$jumlah, $min_bound_value){

?>


<table class="table table-bordered table-hover" align="center">
<tr>
	<th colspan="8" align="center">
    	<p align="center"><font color="#000000">Hasil Penilaian Simple Additive Weighting</font></p>
    </td>
</tr>

<tr>
	<th align="center">No
    </th>
	<th align="center">nis
    </th>
	<th align="center">Nama siswa
    </th>
	<th align="center">Nilai Total
    </th>
	<th align="center">Status
    </th>
	<th align="center"> Rekomendasi
	

	
</tr>
<?
	$no = 1;
	$sum_recomend = 0;
	$sql = "select * from siswa,ranking where siswa.nis = ranking.nis order by nilai desc ";
	
	$retval = mysql_query($sql);
	while($row = mysql_fetch_array($retval)){
		if ($min_bound_value <=$row['nilai']){
			echo " <tr ";
			if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
			echo ">
				<td align='center'>".$no."</td>
				<td>".$row['nis']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['nilai']."</td>
				<td>Diterima</td>";
			echo "</tr>";
			$sum_recomend++;
		}else{
			echo " <tr ";
			if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
			echo ">
				<td align='center'>".$no."</td>
				<td>".$row['nis']."</td>
				<td>".$row['nama']."</td>
				<td>".$row['nilai']."</td>
				<td><font color='#FF0000'>Ditolak</td>
				<td>";
				$nilai = $row['nilai'];
				$sbea = "select * from beasiswa where standar < $nilai and kode_beasiswa!= '$beasiswa'";
				$qbea = mysql_query($sbea);
				while ($rbea = mysql_fetch_array($qbea)){
					echo " ".$rbea['nama_beasiswa']."  ";	
				}
				echo " </td>";
			echo "</tr>";
		}
		$no++;
	}
	
?>
</table>   
<center><h5>Jumlah rekomendasi penerima beasiswa : <?php echo $sum_recomend; ?></h5></center>
 <?
}
/*
tabelnilai(2);
echo "<p align='center'></p>";
konversi(2);
echo "<p align='center'></p>";
normalisasi(2);
echo "<p align='center'></p>";
bobot(2);
echo "<p align='center'></p>";
saw(2);
echo "<p align='center'></p>";
inputranking(2);
ranking(2,2);
*/
?>
