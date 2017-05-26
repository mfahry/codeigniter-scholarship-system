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
		<form name="user_reg" method="post" action="kriteria_p.php" id="in_reg" class="form-horizontal">
			<fieldset>
			<div align="center"><legend>Penambahan Kriteria</legend></div>
			<div class="control-group">
				<label class="control-label">Kode Kriteria</label>
				<div class="controls">
					<input type="text" id="kode" name="kode" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nama Kriteria</label>
				<div class="controls">
					<input type="text" id="nama" name="nmk" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Keterangan</label>
				<div class="controls">
					<input type="text" id="keterangan" name="kt" size="60" required=""/>
				</div>
			</div>
				
				<div class="control-group">
				<label class="control-label">Maksimal</label>
				<div class="controls">
					<input type="text" id="maksimal" name="max" size="60" required=""/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Perbandingan</label>
				<div class="controls">
					<input type="text" id="" name="per" size="60" required=""/>
				</div>
			</div>
			
			
				
				
			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Save</button>
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
