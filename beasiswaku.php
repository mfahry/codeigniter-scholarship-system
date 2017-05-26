<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

include "koneksi.php";

//jika ada deleting
$del=$_GET['del'];
$query=mysql_query("delete from ambil where kode_ambil='$del'");
?>
<script language="JavaScript" type="text/JavaScript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  return false;
}
</script>


<th colspan="5"> <h3>
<p align="center">Informasi Pendaftaran Beasiswa</h3></p>
</th>
<table class="table table-bordered table-hover">
<tr>
	<th colspan="5" align="center"><p align="center">Beasiswa yang Terdaftar </p>
    </th>
</tr>
<tr>
	<th align="center">No
    </td>
	<th align="center">Nama Beasiswa
    </td>
	<th align="center">Keterangan
    </td>
    <th align="center">Aksi
    </td>    
</tr>
<?php
$nis=$_SESSION['nis'];
$no=1;
	$sql = "select * from siswa,ambil,beasiswa where siswa.nis=ambil.nis and ambil.kode_beasiswa=beasiswa.kode_beasiswa and siswa.nis ='$nis' order by kode_ambil";

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

$retval = mysql_query($sql);
while($row = mysql_fetch_array($retval))
{
	$namatgl = substr($row['waktu'], 8, 2);
	$namabln = substr($row['waktu'], 5, 2);
	$namatahun = substr($row['waktu'], 0, 4);
	if($tempbulan=substr($namabln, 0, 1)=='0'){
		$namabln=substr($namabln, 1, 1);
	}
	$namabulan = $array_bulan[$namabln];
	$row['waktu']= $namatgl ." ". $namabulan ." ". $namatahun;

	echo " <tr ";
	if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
	echo ">
		<td align='center'>".$no."</td>
		<td>".$row['nama_beasiswa']."</td>
		<td>".$row['keterangan']."</td>
		<td>
			<a href='?p=bea&del=".$row['kode_ambil']."' ";
		?>
        class="hintanchor" onMouseover="showhint('Mengundurkan diri dari beasiswa.', this, event, '150px')"
        <?php	
		echo "><img style='border:none'  src='images/delete.gif'/></a>
		</td>
	</tr>";
	$no++;
	}	
?>

</table>