<?php
session_start();
include "koneksi.php";
$keyword=$_GET['keyword'];	
$kolom=$_GET['kolom'];	
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
$nis=$_POST['nis'];
$password=$_POST['password'];
$nama=$_POST['nama'];
$rataraport=$_POST['rataraport'];
$tanggungan=$_POST['tanggungan'];
$prestasi=$_POST['prestasi'];
$aktif=$_POST['aktif'];
if(isset($_POST['update_siswa'])){
	$sql="update siswa set nis='$nis',password='$password',nama='$nama', rataraport='$rataraport', tanggungan='$tanggungan', prestasi= '$prestasi', aktif='$aktif' where username='$upd'";
	$query=mysql_query($sql);
	if($query){
		echo("<p align='center'>Edit Data Berhasil <br> <br>");
	}
}else{
$query=mysql_query("select * from siswa where username='$upd'");
$hasil=mysql_fetch_array($query);
if($hasil){

?>

<p align="center">
<img style='border:none'  src='images/edit.gif' /> Edit Siswa <hr /></p>
<form name="siswa_reg" method="post" action="" enctype="multipart/form-data" id="in_reg">
	
	<table align="left">
							<tr>
								<th width="100"></th>
								<th width="400"></th>
							</tr>

							<tr>
								<td > NIS </td>
								<td> <input type="text" id="nis" name="nis" size="60" required > </input> </td>
							</tr>
							<tr>
								<td > Password </td>
								<td> <input type="password" id="pass" name="pass" size="60" required> </input> </td>
							</tr>
							
							
							<tr>
								<td> Nama</td>
								<td> <input type="text" name="nama" id="nama" size="60" required> </input></td>
							</tr>
							<tr>
								<td > rata rata </td>
								<td> <input type="text" id="rata" name="rata" size="60" required > </input> </td>
							</tr>
							<tr>
								<td > Penghasilan </td>
								<td> <input type="text" id="hasil" name="hasil" size="60" required > </input> </td>
							</tr>
							
							<tr>
								<td > Tanggungan </td>
								<td> <input type="text" id="tang" name="tang" size="60" required > </input> </td>
							</tr>
							
							<tr>
								<td > Nilai akademik </td>
								<td> <input type="text" id="aka" name="aka" size="60" required > </input> </td>
							</tr>
							
							<tr>
								<td > nilai non akademik </td>
								<td> <input type="text" id="non" name="non" size="60" required > </input> </td>
							</tr>
		</form>
		</table>