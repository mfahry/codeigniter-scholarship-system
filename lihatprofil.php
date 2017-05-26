<?php
session_start();
include "koneksi.php";
$det=$_SESSION['nis'];
?>

<?    
$query=mysql_query("select * from siswa where nis='$det'");
$hasil=mysql_fetch_array($query);
if($hasil){

?>
<table class="table table-bordered table-hover" >
<th colspan="3">
<p align='center'> Informasi Siswa </p>
</th>
  <tr>
    <td width="175">NIS</td>
    <td width="15">:</td>
    <td width="200"><?php echo $hasil['nis']; ?>
    </td>
  </tr>
  <tr>
    <td>Nama Lengkap</td>
    <td>:</td>
    <td><?php echo $hasil['nama']; ?>
    </td>
  </tr>
  <tr>
    <td>Rata Raport</td>
    <td>:</td>
    <td><?php echo $hasil['rataraport']; ?>
    </td>
  </tr>
  <tr>
    <td>Penghasilan Orang Tua</td>
    <td>:</td>
    <td><?php echo $hasil['penghasilan'];?>
    </td>
  </tr>
  <tr>
    <td>Tanggungan Orang Tua</td>
    <td>:</td>
    <td><?php echo $hasil['tanggungan'];?>
    </td>
  </tr>
   <tr>
    <td>Prestasi Akademik</td>
    <td>:</td>
    <td><?php echo $hasil['prestasi']?>
    </td>
  </tr>
  <tr>
    <td>Prestasi Non Akademik</td>
    <td>:</td>
    <td><?php echo $hasil['aktif']?>
    </td>
  </tr>
 
    <td>Foto</td>
    <td>:</td>
    <td>
    <?php
    echo "<img style='border:none'  src='".$hasil['url_foto']."' width='100' height='100' />";
	?>
    </td>
  </tr>
</table>
<p></p>
<table align="center">
	<tr>
    	<td>Scan Raport :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_raport']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_raport']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>
	<tr>
    	<td>Scan Penghasilan Orang Tua :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_slip']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_slip']."'  width='750' height='750'  />";
	}?>        
        </td>
    </tr>
	<tr>
    	<td>Scan KK :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_kk']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_kk']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>
	<tr>
    	<td>Scan Surat Keterangan Tidak Mampu : </td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_ktm']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_ktm']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>
	<tr>
    	<td>Scan Sertifikat Akademik 1 :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_sertifikat']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_sertifikat']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>
	
	<tr>
    	<td>Scan Sertifikat Akademik 2 :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_akademik1']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_akademik1']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>

	<tr>
    	<td>Scan Sertifikat Akademik 3 :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_akademik2']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_akademik2']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>
	
	<tr>
    	<td>Scan Sertifikat Non Akademik 1 :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_aktif']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_aktif']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>
	
	<tr>
    	<td>Scan Sertifikat Non Akademik 2 :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_aktif1']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_aktif1']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>

<tr>
    	<td>Scan Sertifikat Non Akademik 3 :</td>
    </tr>
	<tr>
    	<td align="center">
    <?php
	if($hasil['url_aktif2']==""){
		echo "<font color='#FF0000'>Belum Upload</font>";	
	}else{
    echo "<img style='border:none'  src='".$hasil['url_aktif2']."' width='750' height='750'  />";
	}?>        
        </td>
    </tr>


</table>
<?php
}
?>