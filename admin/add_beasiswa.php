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
		<form name="user_reg" method="post" action="beasiswa_p.php" id="in_reg" class="form-horizontal">
			<fieldset>
			<div align="center"><legend>Penambahan Beasiswa</legend></div>
			<div class="control-group">
				<label class="control-label">Kode Beasiswa</label>
				<div class="controls">
					<input type="text" id="kode" name="kode" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Nama Beasiswa</label>
				<div class="controls">
					<input type="text" id="nama" name="nmb" size="60" required=""/>
				</div>
			</div>
			<div class="control-group">
				<label class="control-label">Keterangan</label>
				<div class="controls">
					<input type="text" id="keterangan" name="kt" size="60" required=""/>
				</div>
			</div>
				
				<div class="control-group">
				<label class="control-label">Terima</label>
				<div class="controls">
					<input type="text" id="maksimal" name="trm" size="60" required=""/>
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label">Standar</label>
				<div class="controls">
					<input type="text" id="" name="stan" size="60" required=""/>
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
