<html>
	<head>
	<?php
	session_start();
	include "koneksi.php";
	include "slices/header.php";
	?>
	
	</head>
 <body>
 <img src="images/title.jpg" width="1366">
 <li><a href="/coba/"><i class="icon-home"></i> Home</a></li>
	<h1 align="center"> Pendaftaran Beasiswa <hr /></h1>
	

	
	
<form name="siswa_reg" method="post" action="daftar_proses.php" enctype="multipart/form-data" id="in_reg">
	
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
							
							
						<tr>
							<td>Upload Foto</td><td><input name="url_foto" type="file" /><a href='#'</a></td>
						</tr>
						<tr>
							<td>Upload Raport</td><td><input name="url_raport" type="file" /><a href='#'</a></td>
						</tr>
						<tr>
							<td>Upload Slip Gaji Orang Tua</td><td><input name="url_slip" type="file" /><a href='#'</a></td>
						</tr>
						<tr>
							<td>Upload Kartu Keluarga</td><td><input name="url_kk" type="file" /><a href='#'</a></td>
						</tr>
						<tr>
							<td>Upload Surat Keterangan Tidak Mampu</td><td><input name="url_ktm" type="file" /><a href='#'</a></td>
						</tr>
						<tr>
							<td>Upload Sertifikat</td><td><input name="url_sertifikat" type="file" /><a href='#'</a></td>
						</tr>
						
						
						
						
						
						<tr>
								</td>
								<td> 
								<td> 

								<input type="submit"  value="Register"> </input> </td>
							</tr>
	</table>
</form> 
	
	
	
	
	
	
	
</body>
</html>

<?php
$Post
?>
