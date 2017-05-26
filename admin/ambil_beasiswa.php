<?php
session_start();
include ".private/koneksi.php";

//jika ada deleting
$del=$_GET['del'];
$query=mysql_query("delete from ambil where kode_ambil='$del'");
$nis = $_POST['nis'];
$kode_beasiswa = $_POST['kode_beasiswa'];
if(isset($_POST['ambil'])){
	$sql="insert into ambil(kode_ambil,nis,kode_beasiswa,status) values('','$nis','$kode_beasiswa','Tidak Lulus')";
	$query = mysql_query($sql);
}

?>
<script language="JavaScript" type="text/javascript">
function confirmDelete() {
	if (confirm("Hapus Data?")) {
		return true;
		alert('data dihapus');
	}else {
		return false;
	}
}
</script> 

<script language="JavaScript" type="text/JavaScript">
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
  return false;
}
</script>
<link rel="stylesheet" type="text/css" href="css/table.css" />
<script type="text/javascript" src="javascripts/hint.js"></script>
<link rel="stylesheet" type="text/css" href="css/hint.css" />
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);">
<table id="tableData" border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
	<td>Nama siswa
    </td>
    <td>:
    </td>
    <td>
     	<?php
		$sqlmhs= "SELECT * FROM siswa order by nis";
		$querymhs=mysql_query($sqlmhs);
		echo "<select name='nis'>";
		while($hasilmhs = mysql_fetch_array($querymhs)){
			$selected="";
			if($hasilmhs['nis']==$nis){
				$selected=" selected='selected' ";	
			}
			echo "<option value='".$hasilmhs['nis']."' $selected >".$hasilmhs['nis']." - ".$hasilmhs['nama']."</option>";
			}
		echo "</select>"
		?>
    </td>
</tr>
<tr>
	<td>Nama Beasiswa
    </td>
    <td>:
    </td>
    <td>
     	<?php
		$sqlbea= "SELECT * FROM beasiswa order by nama_beasiswa";
		$querybea=mysql_query($sqlbea);
		echo "<select name='kode_beasiswa'>";
		while($hasilbea = mysql_fetch_array($querybea)){
			$selected="";
			if($hasilbea['kode_beasiswa']==$kode_beasiswa){
				$selected=" selected='selected' ";	
			}
			echo "<option value='".$hasilbea['kode_beasiswa']."' $selected >".$hasilbea['nama_beasiswa']."</option>";
			}
		echo "</select>"
		?>
    </td>
</tr>
  <tr>
    <td colspan="3" align="center"><input type="submit" name="ambil" value="Input Pendaftaran"></td>
  </tr>
</table>
</form>
<p>

<table id="tableData" border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
	<th colspan="8" align="center">
    	<font color="#00FF00">Pendaftaran Beasiswa</font>
    </td>
</tr>

<tr>
	<th align="center">No
    </td>
	<th align="center">Nama Beasiswa
    </td>
	<th align="center">Nama siswa
    </td>
    <th align="center">Aksi
    </td>    
</tr>
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
$total=0;
	$sql = "select * from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa order by beasiswa.kode_beasiswa";

$sql .= " LIMIT $posisi, $batas ";
$no = $posisi+1;
$retval = mysql_query($sql);
while($row = mysql_fetch_array($retval))
{
	$total = $total + $row['persentase'];
	echo " <tr ";
	if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
	echo ">
		<td align='center'>".$no."</td>
		<td>".$row['nama_beasiswa']."</td>
		<td>".$row['nama']."</td>
		<td> <a href='?page=ambil_beasiswa&del=".$row['kode_ambil']."' ";
		?>
        class="hintanchor" onMouseover="showhint('Hapus Data.', this, event, '150px')"
        <?php	
		echo " onClick='return confirmDelete();' ><img style='border:none'  src='images/delete.gif'/></a>
		</td>
	</tr>";
	$no++;
	}	
?>
</table>
<?

$sql = "select * from siswa,ambil,beasiswa where siswa.nis = ambil.nis and ambil.kode_beasiswa = beasiswa.kode_beasiswa order by beasiswa.kode_beasiswa";

$tampil2 = mysql_query($sql);
$jml_data = mysql_num_rows($tampil2);
$jml_halaman = ceil($jml_data/$batas);
echo "<p align='center'><br>Halaman : ";
for ($i=1; $i<=$jml_halaman; $i++)
if ($i != $halaman){
echo "<a href=?page=ambil_beasiswa&halaman=$i>$i</a> | ";
}
else{
echo " <b>$i</b> | ";
}
echo "</p>
<p align='center'>Jumlah Data : <b>$jml_data</b> Data </p>";

?>