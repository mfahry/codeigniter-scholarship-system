<html>
	<head>
	<?php
	session_start();
	include "koneksi.php";

	?>
	</head>
 <body>
 
<div class="container">
	<div class="row">
		<div class="span4"></div>
		<div class="span4">
		<form name="add_s" method="post" action="siswa_p.php" id="in_reg" class="form-horizontal">
			<fieldset>
			<div align="center"><legend>Penambahan Siswa</legend></div>
			<div class="control-group">
				<label class="control-label">Nis </label>
				<div class="controls">
					<input type="text" id="Nis" name="Nis" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nama</label>
				<div class="controls">
					<input type="text" id="nama" name="nama" size="60" required=""/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Rata-Rata Raport</label>
				<div class="controls">
					<input type="text" id="rataraport" name="rataraport" size="60" required=""/>
				</div>
			</div>
				
				<div class="control-group">
				<label class="control-label">Penghasilan</label>
				<div class="controls">
					<input type="text" id="penghasilan" name="penghasilan" size="60" required=""/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Tanggungan</label>
				<div class="controls">
					<input type="text" id="" name="tanggungan" size="60" required=""/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Prestasi</label>
				<div class="controls">
					<input type="text" id="" name="prestasi" size="60" required=""/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Sertifikat</label>
				<div class="controls">
					<input type="text" id="" name="aktif" size="60" required=""/>
				</div>
			</div>
			
				
				
			<div class="control-group">
				<div class="controls">
					<input type="submit" class="btn btn-primary" value="Save" />
				</div>
			</div>
			</fieldset>
		</form> 
		</div>
		<div class="span4"></div>
	</div>
</div>
</body>
</html>
<?php
$Post
?>
