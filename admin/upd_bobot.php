<?php
session_start();
include "koneksi.php";
$kode_beasiswa=$_GET['keyword'];
$upd=$_GET['upd'];
?>


	<script>
	$(function() {

	$('.upload').hide();
	
	$("#hakakses").change(function () {
		if($(this).val()=="on") {
			$('.upload').show();
		} else {
			$('.upload').hide();
		}
	});
			
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
if(isset($_POST['update'])){
	$sql="update bobot set kode_kriteria = '$kode_kriteria', persentase = '$persentase' where kode_bobot='$upd'";
	$query=mysql_query($sql);
	if($query){
		echo("<p align='center'>Edit Data Berhasil <br> <br>");
	}
}else{
$query=mysql_query("select * from bobot where kode_bobot='$upd'");
$hasil=mysql_fetch_array($query);
if($hasil){

?>
<p align="center">
<img style='border:none'  src='edit.gif' /> Edit Data <hr /></p>
<form action="<?php $_SERVER['PHP_SELF'];?>" method="post" onKeyUp="highlight(event)" onClick="highlight(event)" onsubmit="return formCheck(this);" enctype="multipart/form-data">
<table width="500" border="0" cellspacing="2" cellpadding="0" align="center">
  <tr>
    <td>Kriteria</td>
    <td>:</td>
    <td>
         	<?php
		$sqlkri= "SELECT * FROM kriteria where kode_kriteria = '$hasil[kode_kriteria]'";
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
    	<input type="number" min='0' max='100' style="height:30px;" name="persentase" value="<?php echo $hasil['persentase']?>"> % [Dalam Persen]
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td><input type="submit" name="update" value="Edit"></td>
  </tr>
</table>
</form>

<?php
	}
}
?>
<p align="center">
<a href='?p=viewb&keyword=<?=$kode_beasiswa?>&aktif=aktif'  class="hintanchor" onMouseover="showhint('Kembali ke Halaman Input Bobot', this, event, '150px')"><img style='border:none'  src='back.png' width="35" height="35"></a>
<a href='?p=viewb&keyword=<?=$kode_beasiswa?>&aktif=aktif'  class="hintanchor" onMouseover="showhint('Kembali ke Halaman Input Bobot', this, event, '150px')"><img style='border:none'  src='back.png' width="35" height="35"></a>