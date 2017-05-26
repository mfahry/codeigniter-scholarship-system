<?php
session_start();
include "koneksi.php";

//jika ada deleting
$del=$_GET['del'];
$query=mysql_query("delete from ambil where kode_ambil='$del'");
$nis = $_POST['nis'];
$kode_beasiswa = $_POST['kode_beasiswa'];
if(isset($_POST['ambil'])){
	$queryCek = mysql_query ("select count(nis) has from ambil where nis = '$nis' AND kode_beasiswa = '$kode_beasiswa'");
	$hasil1 = mysql_fetch_array($queryCek);
	if ($hasil1['has']==0) {
	
			$sql="insert into ambil(kode_ambil,nis,kode_beasiswa,status) values('','$nis','$kode_beasiswa','Tidak Lulus')";
			$query = mysql_query($sql);
		}
		else{
			echo "<script language='javascript'>alert('Sudah Terdaftar!'); location.href='http://localhost/coba/admin/homeadmin.php?p=ambil'</script>";
		}
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



<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);">
<table id="tableData" border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
	<td>Nama Mahasiswa
    </td>
    <td>:
    </td>
    <td>
     	<?php
		$sqlsis= "SELECT * FROM siswa order by nis";
		$querysis=mysql_query($sqlsis);
		echo "<select name='nis'>";
		while($hasilsis = mysql_fetch_array($querysis)){
			$selected="";
			if($hasilmhs['nis']==$nis){
				$selected=" selected='selected' ";	
			}
			echo "<option value='".$hasilsis['nis']."' $selected >".$hasilsis['nis']." - ".$hasilsis['nama']."</option>";
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

<table class="table table-bordered table-hover" style="width:800px" align="center" >
<tr align="center">
	<th colspan="4">
    	<p align="center"><font color="#000000">Pendaftaran Beasiswa</font></p>
    </th>
</tr>

<tr>
	<th align="center">No
    </th>
	<th align="center">Nama Beasiswa
    </th>
	<th align="center">Nama Siswa
    </th>
    <th align="center">Aksi
    </th>    
</tr>

<?php
$batas = 20;
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
		<td> <a href='?p=ambil&del=".$row['kode_ambil']."' ";
		?>
        class="hintanchor" onMouseover="showhint('Hapus Data.', this, event, '150px')"
        <?php	
		echo " onClick='return confirmDelete();' ><img style='border:none'  src='delete.gif'/></a>
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
echo "<homeadmin.php?p=ambil&halaman=$i>$i</a> | ";
}
else{
echo " <b>$i</b> | ";
}
echo "</p>
<p align='center'>Jumlah Data : <b>$jml_data</b> Data </p>";

?>