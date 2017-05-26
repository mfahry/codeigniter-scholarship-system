<?php
error_reporting (E_ALL ^E_NOTICE);
session_start();
include "koneksi.php";
$nis=$_SESSION['nis'];
?>

<H1 align="center"> Informasi Beasiswa</H1>
<hr>
<table class="table table-bordered table-hover" bordercolor="" align='center'>

<?php
$batas = 10;
$halaman = $_GET['halaman'];
if (!($halaman)) {
$posisi = 0;
$halaman = 1;
}
else{
$posisi=($halaman-1)*$batas;
}

$no=0;
	$sql = "select * from beasiswa where kode_beasiswa not in (select ambil.kode_beasiswa from ambil where nis='$nis') ";
$sql .= " LIMIT $posisi, $batas ";
$no = $posisi+1;
$retval = mysql_query($sql);

$array_bulan[00] = '00';
$array_bulan[1] = 'Jan';
$array_bulan[2] = 'Feb';
$array_bulan[3] = 'Mar';
$array_bulan[4] = 'Apr';
$array_bulan[5] = 'Mei';
$array_bulan[6] = 'Jun';
$array_bulan[7] = 'Jul';
$array_bulan[8] = 'Agu';
$array_bulan[9] = 'Sep';
$array_bulan[10] = 'Okt';
$array_bulan[11] = 'Nov';
$array_bulan[12] = 'Des';


while($row = mysql_fetch_array($retval))
{
	$namatgl = substr($row['deadline'], 8, 2);
	$namabln = substr($row['deadline'], 5, 2);
	$namatahun = substr($row['deadline'], 0, 4);
	if($tempbulan=substr($namabln, 0, 1)=='0'){
		$namabln=substr($namabln, 1, 1);
	}
	$namabulan = $array_bulan[$namabln];
	$row['deadline']= $namatgl ." ". $namabulan ." ". $namatahun;

	echo "
	<tr>
		<td>
			<table border='0' align='center'>
				<tr>
					<td colspan='2' align='center'><h3>".$row['nama_beasiswa']."</h3><hr></td>
				</tr>
				<tr>
					<td align='right' valign='top'><b>Keterangan</b>
					</td>
					<td>".$row['keterangan']."
					</td>
				</tr>
				<tr>
					<td>&nbsp;
					</td>
				</tr>
				<tr>
					<td align='right'>
					</td>
					<td><a href='?p=daftar&bea=".$row['kode_beasiswa']."'><h3><font color='green'><img src='images/add.gif'>Daftar Beasiswa</font></h3></a>
					</td>
				</tr>
			</table>
		</td>";
		if($row = mysql_fetch_array($retval)){
			$namatgl = substr($row['deadline'], 8, 2);
			$namabln = substr($row['deadline'], 5, 2);
			$namatahun = substr($row['deadline'], 0, 4);
			if($tempbulan=substr($namabln, 0, 1)=='0'){
				$namabln=substr($namabln, 1, 1);
			}
			$namabulan = $array_bulan[$namabln];
			$row['deadline']= $namatgl ." ". $namabulan ." ". $namatahun;

		echo
		"<td>
			<table border='0' align='center'>
				<tr>
					<td colspan='2' align='center'><h3>".$row['nama_beasiswa']."</h3><hr></td>
				</tr>
				<tr>
					<td align='right' valign='top'><b>Keterangan</b>
					</td>
					<td>".$row['keterangan']."
					</td>
				</tr>
				<tr>
					<td>&nbsp;
					</td>
				</tr>
				<tr>
					<td align='right'>
					</td>
					<td><a href='?p=daftar&bea=".$row['kode_beasiswa']."'><h3><font color='green'><img src='images/add.gif'>Daftar Beasiswa</font></h3></a>
					</td>
				</tr>
			</table>		
		</td>";
		}
		echo "
	</tr>
	<tr>
		<td colspan='2'>&nbsp;
		</td>
	</tr>
	";
	
	$no++;
}

?>
</table>
<?
if($keyword==""){
	$keyword=$_GET['keyword'];	
}
if($kolom==""){
	$kolom=$_GET['kolom'];	
}
$wherekey="";
if ($keyword!=""){
	$wherekey=" and $kolom like '%$keyword%' ";
}

$sql = "select * from beasiswa where kode_beasiswa not in (select ambil.kode_beasiswa from ambil where nis='$nis') ";

$tampil2 = mysql_query($sql);
$jml_data = mysql_num_rows($tampil2);
$jml_halaman = ceil($jml_data/$batas);
echo "<p align='center'><br>Halaman : ";
for ($i=1; $i<=$jml_halaman; $i++)
if ($i != $halaman){
echo "<a href=?p=in&halaman=$i>$i</a> | ";
}
else{
echo " <b>$i</b> | ";
}
echo "</p>
<p align='center'>Jumlah Data : <b>$jml_data</b> Data </p>";
?>