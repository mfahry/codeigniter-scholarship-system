<?php
session_start();
include "koneksi.php";

//jika ada deleting
$del=$_GET['del'];
$query=mysql_query("delete from bobot where kode_bobot='$del'");

$keyword=$_POST['keyword'];
if($keyword==""){
	$keyword=$_GET['keyword'];	
}

$wherekey="";
if ($keyword!=""){
	$wherekey=" and kode_beasiswa = '%$keyword%' ";
}

$aktif = $_GET['aktif'];

?>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);">
<table  align="center">
<tr>
	<td>Nama Beasiswa
    </td>
    <td>:
    </td>
    <td>
     	<?php
		$sqlbea= "SELECT * FROM beasiswa order by nama_beasiswa";
		$querybea=mysql_query($sqlbea);
		echo "<select name='keyword'>";
		while($hasilbea = mysql_fetch_array($querybea)){
			$selected="";
			if($hasilbea['kode_beasiswa']==$keyword){
				$selected=" selected='selected' ";	
			}
			echo "<option value='".$hasilbea['kode_beasiswa']."' $selected >".$hasilbea['nama_beasiswa']."</option>";
			}
		echo "</select>"
		?>
    </td>
	<td><input type="submit" name="cari_keyword" value="Cari"></td>
</table>
</form>
<p>

<?
if((isset($_POST['cari_keyword'])) or (isset($_POST['penerimaan'])) or ($aktif!="")){
?>
<table class = "table table-bordered table-hover" align="center" style="width:800px";>
<tr>
	<th colspan="8" align="center">
    	<?
			$s="select * from beasiswa where kode_beasiswa = '$keyword'";
			$q=mysql_query($s);
			$h=mysql_fetch_array($q);
			echo "<p align='center'>";
			echo $h['nama_beasiswa'];
			echo "</p>";
		?>
    </td>
</tr>

<tr>
	<th colspan="8" align="left"><a href='?p=addb&keyword=<?=$keyword?>' class="hintanchor" onMouseover="showhint('Input Bobot.', this, event, '150px')"><img style='border:none'  src='add.gif'/><font color="#000000">Input Bobot</font></a>
    </td>
</tr>
<tr>
	<th align="center">No
    </td>
	<th align="center">Nama Kriteria
    </td>
	<th align="center">Persentase
    </td>
    <th align="center">Aksi
    </td>    
</tr>
<?php
$no=1;
$total=0;
	$sql = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and kode_beasiswa = '$keyword'";

$retval = mysql_query($sql);
while($row = mysql_fetch_array($retval))
{
	$total = $total + $row['persentase'];
	echo " <tr ";
	if(($no%2) >0) { echo "id='row-style1'"; } else{ echo "id='row-style2'";}
	echo ">
		<td align='center'>".$no."</td>
		<td>".$row['nama_kriteria']."</td>
		<td>".$row['persentase']."</td>
		<td>";
		echo "<a href='?p=updb&upd=".$row['kode_bobot']."&keyword=$keyword' ";
		?>
  
        <?php
		echo "><img style='border:none'  src='edit.gif'/></a>

			<a href='?p=viewb&del=".$row['kode_bobot']."&keyword=$keyword' ";
		?>
        
        <?php	
		echo " onClick='return confirmDelete();' ><img style='border:none'  src='delete.gif'/></a>
		</td>
	</tr>";
	$no++;
	}	
?>
<tr>
	<th colspan="3" align="right"><font color="#000000">Total Persentase Harus 100%</font>
    </td>
	<th align="center"><font color="#000000"> <? echo $total; ?> </font>
    </td>
</tr>
</table>
<p></p>
<form action="?p=viewb&aktif=aktif" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);">
<table id="tableData" border="0" cellspacing="2" cellpadding="2" align="center">
<th colspan="3">Seleksi
</th>
<tr>
	<td>Nilai Minimum Kelulusan seleksi<br>
    </td>
    <td>:
    </td>
    <td>
	<!--
     <input type="number" min="0" max="<? echo $keyword; ?>" style="height:30px"; name="jumlah" maxlength="50" > <a href='' class="hintanchor" onMouseover="showhint('Isi Jika Jumlah yang lulus seleksi berbeda dengan data Beasiswa.', this, event, '150px')"></a> -->
	<input type="text" class="form-control" placeholder="batas-minimum-nilai" name="min-bound-value"/>
     <input type="hidden" name="beasiswa" value="<? echo $keyword; ?>" maxlength="50" >
     <input type="hidden" name="keyword" value="<? echo $keyword; ?>" maxlength="50" >
     
    </td>
<td><input type="submit" name="penerimaan" value="Seleksi"></td>

</table>
</form>
<p>
<?

if(isset($_POST['penerimaan'])){
	$beasiswa = $_POST['beasiswa'];
	$jumlah = $_POST['jumlah'];
	$min_bound_value = $_POST['min-bound-value'];
	include "saw.php";
	inputranking($beasiswa);
	
	$sql = "select * from beasiswa where kode_beasiswa = '$beasiswa'";
	$retval = mysql_query($sql);
	$row = mysql_fetch_array($retval);
	$jumlahasli = $row['terima'];
	if($jumlah==""){
		ranking($beasiswa,$jumlahasli, $min_bound_value);		
	}else{
		ranking($beasiswa,$jumlah, $min_bound_value);
	}
}

}
?>
