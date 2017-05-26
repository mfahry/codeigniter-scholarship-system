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
<script language="JavaScript" type="text/javascript">
function confirmDelete() {
	if (confirm("Hapus Data?")) {
		return true;
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
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="cari_keyword" value="Cari"></td>
  </tr>
</table>
</form>
<p>

<?
if((isset($_POST['cari_keyword'])) or (isset($_POST['penerimaan'])) or ($aktif!="")){
?>
<table id="tableData" border="0" cellspacing="2" cellpadding="2" align="center">
<tr>
	<th colspan="8" align="center">
    	<?
			$s="select * from beasiswa where kode_beasiswa = '$keyword'";
			$q=mysql_query($s);
			$h=mysql_fetch_array($q);
			echo $h['nama_beasiswa'];
		?>
    </td>
</tr>

<tr>
	<th colspan="8" align="left"><a href='?p=addb&keyword=<?=$keyword?>' class="hintanchor" onMouseover="showhint('Input Bobot.', this, event, '150px')"><img style='border:none'  src='images/add.gif'/><font color="#00FF00">Input Bobot</font></a>
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
	$sql = "select * from kriteria,bobot where kriteria.kode_kriteria = bobot.kode_kriteria and kode_beasiswa = '$keyword' order by nama_kriteria";

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
        class="hintanchor" onMouseover="showhint('Edit Data.', this, event, '150px')"
        <?php
		echo "><img style='border:none'  src='images/edit.gif'/></a>

			<a href='?p=viewb&del=".$row['kode_bobot']."&keyword=$keyword' ";
		?>
        class="hintanchor" onMouseover="showhint('Hapus Data.', this, event, '150px')"
        <?php	
		echo " onClick='return confirmDelete();' ><img style='border:none'  src='images/delete.gif'/></a>
		</td>
	</tr>";
	$no++;
	}	
?>
<tr>
	<th colspan="3" align="right"><font color="#FF0000">Total Persentase</font>
    </td>
	<th align="center"><font color="#FF0000"> <? echo $total; ?> </font>
    </td>
</tr>
</table>
<p></p>
<form action="?p=v_bobot&aktif=aktif" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);">
<table id="tableData" border="0" cellspacing="2" cellpadding="2" align="center">
<th colspan="3">Seleksi
</th>
<tr>
	<td>Jumlah Lulus Seleksi
    </td>
    <td>:
    </td>
    <td>
     <input type="text" name="jumlah" maxlength="50" > <a href='' class="hintanchor" onMouseover="showhint('Isi Jika Jumlah yang lulus seleksi berbeda dengan data Beasiswa.', this, event, '150px')">[?]</a>
     <input type="hidden" name="beasiswa" value="<? echo $keyword; ?>" maxlength="50" >
     <input type="hidden" name="keyword" value="<? echo $keyword; ?>" maxlength="50" >
     
    </td>
</tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="penerimaan" value="Seleksi"></td>
  </tr>
</table>
</form>
<p>
<?

if(isset($_POST['penerimaan'])){
	$beasiswa = $_POST['beasiswa'];
	$jumlah = $_POST['jumlah'];
	include "saw.php";
	inputranking($beasiswa);
	
	$sql = "select * from beasiswa where kode_beasiswa = '$beasiswa'";
	$retval = mysql_query($sql);
	$row = mysql_fetch_array($retval);
	$jumlahasli = $row['terima'];
	
	if($jumlah==""){
		ranking($beasiswa,$jumlahasli);		
	}else{
		ranking($beasiswa,$jumlah);
	}
}

}
?>