<?php
session_start();
include "koneksi.php";
$kode_beasiswa=$_GET['keyword'];
?>

	<script>
	$(function() {
		
			$( "#datepicker" ).datepicker({
			changeMonth: true,
			changeYear: true,
			dateFormat:'yy-mm-dd',
			yearRange:"-70:+0"
		});
		
	}
	)
	</script>


<?php
$kode_kriteria = $_POST['kode_kriteria'];
$persentase = $_POST['persentase'];
if(isset($_POST['insert'])){
	$sql="insert into bobot(kode_bobot,kode_beasiswa,kode_kriteria,persentase) values('','$kode_beasiswa','$kode_kriteria','$persentase')";

		$query=mysql_query($sql);
		$id=mysql_insert_id();
		if($query){
			$s = "select * from beasiswa,bobot,kriteria where beasiswa.kode_beasiswa = bobot.kode_beasiswa and bobot.kode_kriteria = kriteria.kode_kriteria and kode_bobot = '$id'";
			$q=mysql_query($s);
			$h=mysql_fetch_array($q);
		echo "
		<table bgcolor='#00FFFF' cellspacing='2' cellpadding='2' align='center'>
			<tr id='row-style1'>
				<td>Nama Beasiswa</td>
				<td>:</td>
				<td>".$h['nama_beasiswa']."</td>
			</tr>
			<tr id='row-style1'>
				<td>Kriteria</td>
				<td>:</td>
				<td>".$h['nama_kriteria']."</td>
			</tr>
			<tr id='row-style1'>
				<td>Persentase</td>
				<td>:</td>
				<td>".$h['persentase']."</td>
			</tr>
			</table>

			";

			}					
}else{
	
?>
<p align="center">
<img style='border:none'  src='add.gif' /> Input Bobot <hr /></p>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);" name="tambah bobot" enctype="multipart/form-data">
<table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
  <tr>
    <td>Kriteria</td>
    <td>:</td>
    <td>
         	<?php
		$sqlkri= "SELECT * FROM kriteria where kode_kriteria not in (select kode_kriteria from bobot where kode_beasiswa = '$kode_beasiswa') order by nama_kriteria";
		$querykri=mysql_query($sqlkri);
		echo "<select name='kode_kriteria'>";
		while($hasilkri = mysql_fetch_array($querykri)){
			echo "<option value='".$hasilkri['kode_kriteria']."' >".$hasilkri['nama_kriteria']."</option>";
		}
		echo "</select>"
		?>
    </td>
  </tr>
  <tr>
    <td>Persentase</td>
    <td>:</td>
    <td>
    	<input type="number" min="0" max="100" name="persentase" style="height:30px;"> % [Dalam Persen]
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="insert" value="Tambah"></td>
  </tr>
</table>
</form>

<?php
}
?>
<p align="center">
<a href='?p=viewb&keyword=<?=$kode_beasiswa?>&aktif=aktif'  class="hintanchor" onMouseover="showhint('Kembali ke Input Bobot', this, event, '150px')"><img style='border:none'  src='back.png' width="35" height="35"></a>